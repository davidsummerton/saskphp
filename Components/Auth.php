<?php
/**
 * Contains the authentication.
 *
 * @author David Summerton
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 * @package Sask
 */
class Auth
{

    /**
     * Login the user with an ID.
     * 
     * @param  int $id
     * @return void
     */
    public static function login($id)
    {
        $_SESSION['user_id'] = $id;
    }

    /**
     * Logout current user.
     * 
     * @return void
     */
    public static function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
        }
    }

    /**
     * Checks if the current visitor is logged-in.
     * 
     * @return boolean
     */
    public static function loggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Returns the current user ID.
     * 
     * @return int|null
     */
    public static function getUserId()
    {
        // Use static::loggedIn() if use PHP 5.3 >=
        return self::loggedIn() ? $_SESSION['user_id'] : null;
    }

}