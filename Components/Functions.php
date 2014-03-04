<?php
/**
 * Contains system functions
 *
 * @author David Summerton
 * @author Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
class System
{

    /**
     * 
     * @return boolean
     */
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * 
     * @return boolean
     */
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * 
     * @param string $url
     */
    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    /**
     * Replaces all spaces with hyphens and some special chars.
     * 
     * @param string $string The string, that should be cleaned
     * @return string The cleand string
     */
    public static function cleanseString($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    /**
     * 
     * @param array $data
     * @param integer $page
     * @param integer $per_page
     * @return array
     */
    public static function paginate($data, $page = 1, $per_page = 5)
    {
        $min = (($page * $per_page) - $per_page) + 1;
        $max = $page * $per_page;
        $count = 1;
        $page_data = array();
        foreach ($data as $item) {
            if ($count >= $min && $count <= $max) {
                $page_data[] = $item;
            }
            $count++;
        }
        $pages = ceil(count($data) / $per_page);
        return array(
            'page_data' => $page_data,
            'pages' => $pages,
            'page' => $page
        );
    }

}