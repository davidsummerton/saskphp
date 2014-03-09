<?php
/**
 * Main class of the framework, initializes the application.<br>
 * Change the global constants of this class to fit your environment
 *
 * @author David Summerton
 * @author Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 * @package Sask
 */
class Sask
{
    /**
     * The reference to the database class.
     * @var Database
     */
    public static $database;

    /**
     * The base directory
     * @var string
     */
    public static $basedir;

    /**
     * The router
     * @var Router
     */
    public static $router;

    /**
     * Constructor of Sask, initialization of the database class.
     *
     * @param string $baseDir The base directory of the application
     */
    public function __construct($baseDir = __DIR__)
    {

        self::$basedir = $baseDir;

        self::$router = new Router();

        /*
         * 	Connect to the database
         * 	==================
         * 	Set your database access details here.
         */

        if (Configuration::$dbConnection ['UseDatabase']) {
            switch (Configuration::$dbConnection ['Type']) {
                case 'MySQL':
                    self::$database = new Database(
                        Configuration::$dbConnection ['Host'], 
                        Configuration::$dbConnection ['User'], 
                        Configuration::$dbConnection ['Password'], 
                        Configuration::$dbConnection ['DatabaseName'],
                        Configuration::$dbConnection ['Port']
                    );

                    break;

                default:
                    break;
            }
        }

        foreach (Configuration::$routes as $key => $value) {
            self::$router->add($key, $value);
        }
    }

}