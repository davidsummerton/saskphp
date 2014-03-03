<?php
/**
 * Main class of the framework, initializes the application.
 *
 * @author David Summerton
 * @author Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
class Sask
{

    /**
     * The reference to the database class.
     * @var Database
     */
    public static $database;

    /**
     * Constructor of Sask, initialization of the database class.
     */
    public function __construct()
    {

        /*
         * 	Connect to the database
         * 	==================
         * 	Set your database access details here.
         */

        $database_host = "localhost";
        $database_user = "";
        $database_password = "";
        $database_name = "";

        $this->database = new Database(
                $database_host,
                $database_user,
                $database_password,
                $database_name
        );
    }

}
/*
 * 	Global constants
 * 	==================
 * 	You need to set these constants.
 *
 * 	Change SECURITYSALT to a random assortment of letters and numbers
 * 	as this is used in hashing.
 *
 * 	Change BASE_DIR if Sask is not in the root URI directory.
 * 	Ensure to keep the beginning /
 *
 * 	Change NOTFOUND_URI to whatever route/URI you wish to direct your
 * 	404 pages to.
 */

define("SECURITYSALT", "hfhy394niyn404983nuhirh65fv89uvd");
define("BASE_DIR", "");
define("NOTFOUND_URI", "/");

/* * **************************************
 * 		NOTHING TO CONFIGURE BELOW
 * 					HERE
 * ************************************** */

/*
 * 	Including Sask components
 */
session_start();
ob_start();

require_once('components/database.php');
require_once('components/auth.php');
require_once('components/functions.php');
require_once('components/router.php');
require_once('routes.php');

/*
 * 	Initialize the Sask framework
 */

$sask = new Sask();
