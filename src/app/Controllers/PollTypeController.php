<?php

namespace app\Controllers;

use app\Models\PollType;
use core\PDO;
use core\Validator;
use core\Viewer;

class PollTypeController
{
    public function index(): void
    {
        $pollTypes = PollType::all();

        (new Viewer('poll-types.index', compact(['pollTypes'])))->render();
    }

    public function show(): void
    {
        $id = $_GET['id'];
        $data = PollType::find($id);

        var_dump($data);
    }

    public function create(): void
    {
        (new Viewer('poll-types.create'))->render();
    }

    public function store(): void
    {
        $data = [
            'name' => trim($_POST['name']) ?: null
        ];

        $rules = [
            'name' => ['required', 'min3', 'max255'],
        ];
        if (!Validator::make($rules, $data)->validate()) {
            header('Location: ' . '/poll-types/create');
            exit();
        }

        PollType::make()->fill($data)->create();

        header('Location: ' . '/poll-types');
        exit();
    }

    public function delete()
    {
        $id = $_GET['id'];
        $poolType = PollType::find($id);

        $poolType->delete();
    }
}