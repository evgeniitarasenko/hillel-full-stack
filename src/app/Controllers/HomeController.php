<?php

namespace app\Controllers;

use app\Models\PollType;
use core\View;

class HomeController
{
    public function index()
    {
        $pollType = PollType::find(1)->update(['name' => 'updated1']);

        var_dump($pollType);die;

        $a = 2;

        (new View('home.index', compact(['a'])))->render();
    }

    public function contacts()
    {
        echo 'contacts';
    }
}