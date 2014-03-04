<?php
/**
 * Initialize the router and set routes<br>
 * ==================<br>
 * New routes are added like this:<br>
 * $router->add('/uri', 'Class/function');<br>
 * To accept parameters in the URI you can use two options:<br>
 * :s = string<br>
 * :i = integer<br>
 * Parameter options are used like so:<br>
 * $router->add('/uri/:s/:i', 'Class/function');<br>
 * Integers will still be accepted if you use :s and you can just convert them
 * to a true integer later if you wish.
 *
 * @author David Summerton
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */

$router = new Router();

$router->add('/', 'Hello/world');
