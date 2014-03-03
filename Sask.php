<?php
/**
 * Main class of the framework, initializes the application.<br>
 * Change the global constants of this class to fit your environment
 *
 * @author David Summerton
 * @author Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
class Sask
{
    /**
     * @var string Change SECURITYSALT to a random assortment of letters and
     * numbers as this is used in hashing.
     */
    const SECURITYSALT = 'hfhy394niyn404983nuhirh65fv89uvd';

    /**
     * @var string Change BASE_DIR if Sask is not in the root URI directory.
     * Ensure to keep the beginning /
     */
    const BASE_DIR = '';

    /**
     * @var string Change NOTFOUND_URI to whatever route/URI you wish to direct
     * your 404 pages to.
     */
    const NOTFOUND_URI = '/';

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