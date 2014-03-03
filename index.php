<?php
/**
 * Intitialization of the application.
 *
 * @author David Summerton
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
require_once('Components/AutoLoad.php');
$ignore = array(
    'Cache'
);
AutoLoader::registerDirectory(__DIR__, $ignore);

session_start();
ob_start();

$sask = new Sask();


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
$router->route();
