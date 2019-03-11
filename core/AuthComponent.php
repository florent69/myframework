<?php
namespace Core;

class AuthComponent
{
    /**
     *
     */
    static function checkAuthenticated()
    {
        /* Vérifie si une session d'authentification existe */
        if(isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]=== true)
        {
            return true;
        }
        else {
            return false;
        }

    }

    static function create()
    {
        $_SESSION["isConnected"] = true;
        setcookie ( "PHPSESSID", $_COOKIE['PHPSESSID'], time()+60);
    }

    /**
     *
     */
    static function delete()
    {
        session_destroy();
    }
}