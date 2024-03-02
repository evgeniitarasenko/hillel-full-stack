<?php

namespace app\Controllers;

use app\Models\PollType;
use core\PDO;
use core\Viewer;

class PollTypeController
{
    public function index(): void
    {
        $data = PollType::all();
        var_dump($data);

        (new Viewer('poll-types.index'))->render();
    }

    public function show(): void
    {
        $id = $_GET['id'];
        $data = PollType::find($id);

        var_dump($data);
    }
}