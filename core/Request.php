<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 11:51
 */

namespace Core;

class Request
{
    private $post;         /* on initialise toutes les attributs qui vont être utilisées */
    private $get;
    private $files;
    private $cookie;
    private $session;
    private $request;
    private $server;

    public function __construct($post, $get, $files, $cookie, $session, $request, $server)
    {
        $this->post = $post;            /* on injecte les attributs dans les paramêtres de la méthodes __construct */
        $this->get = $get;
        $this->files = $files;
        $this->cookie = $cookie;
        $this->session = $session;
        $this->request = $request;
        $this->server = $server;
    }

    public static function createFromGlobals()  /* Méthode qui force les superGlobales à être rentrer en paramêtre dans une Request */
    {
        session_start(); /*la session commence : Si  cette ligne n'est pas écrite on ne peut pas utiliser la superGlobale $_Session */
        return new Request($_POST, $_GET, $_FILES, $_COOKIE, $_SESSION, $_REQUEST, $_SERVER);

    }

    public function getPost()
    {
        return $this->post;
    }
    public function getGet()
    {
        return $this->get;
    }
    public function getFiles()
    {
        return $this->files;
    }
    public function getCookie()
    {
        return $this->cookie;
    }
    public function getSession()
    {
        return $this->session;
    }
    public function getRequest()
    {
        return $this->request;
    }
    public function getServer()
    {
        return $this->server;
    }

}