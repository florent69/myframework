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
    public function foo()
    {
        echo 'Hello world !';
    }
    public function bar($bar)
    {
        echo $bar;
    }
}