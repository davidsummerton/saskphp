<?php
/**
 * Automatic class file loading by directory.
 * The class name has to match the filename without suffix.<br>
 * It is important, to remove the current cache file, if a new class is added.
 *
 * @author Stefanie Janine Stoelting<mail.stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
class AutoLoader
{

    /**
     * Array with class names
     * @var array
     */
    static private $_classNames = array();

    /**
     * The name and path to the cache file for class names
     * @var string
     */
    static private $_cacheFile = '';

    /**
     * Store the filename (sans extension) & full path of all ".php" files found.
     *
     * @param string $dirName Directory, where the class names are located
     * @param array $ignore An array with path names, that shoud be ignored.<br>
     *                       Default is an empty array
     * @param boolean $useCache Writes a cache file, if it does not exist and
     *                          loads the $className array from that cache<br>
     *                          Default is false
     */
    public static function registerDirectory($dirName, $ignore = array(), $useCache = false)
    {
        AutoLoader::$_cacheFile = __DIR__ . '/../Cache/className.cache';
        if ($useCache && file_exists(AutoLoader::$_cacheFile)) {
            AutoLoader::$_classNames = unserialize(file_get_contents(AutoLoader::$_cacheFile));
        } else {
            $di = new DirectoryIterator($dirName);
            foreach ($di as $file) {

                if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
                    if (!in_array($file->getPathname(), $ignore)) {
                        // recurse into directories other than a few special ones
                        self::registerDirectory($file->getPathname(), $ignore);
                    }
                } elseif (substr($file->getFilename(), -4) === '.php') {
                    // save the class name / path of a .php file found
                    $className = substr($file->getFilename(), 0, -4);
                    AutoLoader::registerClass($className, $file->getPathname());
                }
            }
            if ($useCache) {
                file_put_contents(AutoLoader::$_cacheFile, serialize(AutoLoader::$_classNames));
            }
        }
    }

    /**
     * Register a class with class name and corresponding file name.
     *
     * @param string $className
     * @param string $fileName
     */
    public static function registerClass($className, $fileName)
    {
        AutoLoader::$_classNames[$className] = $fileName;
    }

    /**
     * Load a class by its name.
     *
     * @param string $className
     */
    public static function loadClass($className)
    {
        if (isset(AutoLoader::$_classNames[$className])) {
            require_once(AutoLoader::$_classNames[$className]);
        }
    }

    /**
     * Returns the current cache file name with path.
     *
     * @return string
     */
    public static function getCacheFileName()
    {
        return AutoLoader::$_cacheFile;
    }

    /**
     *
     * @param string $dirName Directory, where the class names are located
     * @param array $ignore An array with path names, that shoud be ignored.<br>
     *                       Default is an empty array
     */
    public static function updateCacheFile($dirName, $ignore = array())
    {
        unlink(AutoLoader::$_cacheFile);

        AutoLoader::registerDirectory($dirName, $ignore, true);
    }

}
spl_autoload_register(array('AutoLoader', 'loadClass'));
