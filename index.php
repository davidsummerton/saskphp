<?php
/**
 * Intitialization of the application.
 *
 * @author David Summerton
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
require_once('Sask.php');

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
