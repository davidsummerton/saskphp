<?php

/*
 * 	Initialize the router and set routes
 * 	==================
 * 	New routes are added like this:
 * 	$router->add('/uri', 'Class/function');
 *
 * 	To accept parameters in the URI you can use two options:
 * 	:s = string
 * 	:i = integer
 *
 * 	Parameter options are used like so:
 * 	$router->add('/uri/:s/:i', 'Class/function');
 *
 * 	Integers will still be accepted if you use :s and you can
 * 	just convert them to a true integer later if you wish.
 */

$router = new Router();

$router->add('/', 'Hello/world');
