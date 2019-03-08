<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 16:27
 */

namespace App\Controller;


class TestsController extends AppControllers
{
    /**
     *
     */
    public function foo()
    {
        return $this->render('foo');
    }
    /**
     * @param $bar
     *
     * @return
     */
    public function bar($bar)
    {
        return $this->render('bar', compact('bar'));
    }
    /**
     * @param $bar
     * @throws \Exception
     */
    public function redirection($bar)
    {
        $this->redirect("testsBar", ["param" => $bar]);
    }
}