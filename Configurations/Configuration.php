<?php
/**
 * The configuration of the application. All settings should be set here.
 *
 * @author Stefanie Janine Stoelting<mail.stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 * @package Sask
 */
class Configuration
{

    /**
     * @var string Change SECURITYSALT to a random assortment of letters and
     * numbers as this is used in hashing.
     */
    const SECURITYSALT = 'hfhy394niyn404983nuhirh65fv89uvd';

    /**
     * @var string The web root
     */
    const WEB_ROOT = '/';

    /**
     * @var string Change NOTFOUND_URI to whatever route/URI you wish to direct
     * your 404 pages to.
     */
    const NOTFOUND_URI = '/404/';

    /**
     * The database connection informations
     * @var array
     */
    public static $dbConnection = array(
        'UseDatabase' => false,
        'Type' => 'MySQL',
        'Host' => 'localhost',
        'User' => '',
        'Password' => '',
        'DatabaseName' => '',
        'Port' => null,
    );

    /**
     * The routes
     * @var array
     */
    public static $routes = array(
        '/' => 'Hello/world',
        '/hello/world/' => 'Hello/world',
        '/test/' => 'Hello/test',
        '/404/' => 'Hello/page404',
    );

}