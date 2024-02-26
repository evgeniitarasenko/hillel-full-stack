<?php

namespace app\Controllers;

use core\View;

class HomeController
{
    public function index()
    {
        $a = 2;

        (new View('home.index', compact(['a'])))->render();
    }

    public function contacts()
    {
        echo 'contacts';
    }
}