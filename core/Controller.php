<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 16:28
 */
namespace Core;

use Core\Router\Router;
use duncan3dc\Laravel\BladeInstance;

abstract class Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Router
     */
    private $router;
    /**
     * @var Blade
     */
    private $blade;
    /**
     * Controller constructor.
     *
     * @param Request $request
     * @param Router  $router
     */
    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
        $this->blade = new BladeInstance($_SERVER['DOCUMENT_ROOT'] . '/../src/View/', $_SERVER['DOCUMENT_ROOT'] . '/../tmp/cache/views/');
    }
    /**
     * @param       $routeName
     * @param array $args
     *
     * @throws \Exception
     */
    protected final function redirect($routeName, $args = [])
    {
        $route = $this->router->getRoute($routeName);
        header(sprintf("Location: %s", $route->generateUrl($args)));
    }
    /**
     * @param string $filename
     * @param array $data
     */
    protected function render($filename, $data = [])
    {
        echo $this->blade->render($filename, $data);
    }
}