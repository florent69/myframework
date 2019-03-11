<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 08/03/2019
 * Time: 11:47
 */

namespace App\Controller;

use Core\Request;
use Core\AuthComponent;

class UsersController extends AppControllers
{
    private $request;

    /**
     *
     */
    public function index()
    {
//        $_SESSION['isConnected'] = true;     // Création de la session pour vérification d'affichage index.
        AuthComponent::checkAuthenticated();
        if (isset($_SESSION['isConnected'])) { // Si la session existe (= isset)
            return $this->render("index");
        } else {
            return $this->redirect("login");
        }
    }

    public function login()
    {
//        if(isset() {
//            $_SESSION['isConnected'] = true;
//        }
    }

    public function logout()
    {

    }

}