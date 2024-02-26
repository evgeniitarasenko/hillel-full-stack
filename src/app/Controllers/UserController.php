<?php

namespace app\Controllers;

use core\Viewer;

class UserController
{
    public function index(): void
    {
        $a = 123423423;
        $b = 'lksjflks jdljdl';

        (new Viewer('users.index', compact(['a', 'b'])))->render();
    }
}