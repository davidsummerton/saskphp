<?php
/**
 * Intitialization of the application.
 *
 * @author David Summerton
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 * @package Sask
 */

$ignore = array(
    __DIR__ . '/Cache',
    __DIR__ . '/_Tests',
    __DIR__ . '/nbproject',
    __DIR__ .'/.git',
);
require_once(__DIR__ . '/Components/AutoLoader.php');

AutoLoader::registerDirectory(__DIR__, $ignore);

session_start();
ob_start();

$sask = new Sask(__DIR__);

/**
 * Feel free to delete this class and create your own!
 */
class Hello extends Sask
{

    public function world()
    {

        echo "Hello World!";
    }

}

/**
 * Initialize the router
 */
Sask::$router->route();

