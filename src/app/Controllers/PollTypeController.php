<?php

namespace app\Controllers;

use app\Models\PollType;
use app\Models\PollTypeQuestion;
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
        $_SESSION['old'] = $data;

        $rules = [
            'name' => ['required', 'min3', 'max255'],
        ];

        try {
            if (!Validator::make($rules, $data)->validate()) {
                header('Location: ' . '/poll-types/create');
                exit();
            }
        } catch (\Exception $exception) {
            $errorLogPath = __DIR__ . '/../../storage/logs/error.log';
            $message = date('Y-m-d H:i:s') . ': ' . $exception->getMessage() . PHP_EOL;
            file_put_contents($errorLogPath, $message, FILE_APPEND);

            echo '500 Server error';
            exit();
        }


        PollType::make()->fill($data)->create();

        header('Location: ' . '/poll-types');
        exit();
    }

    public function edit(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ' . '/poll-types');
            exit();
        }

        $pollType = PollType::find($id);
        $pollTypeQuestions = PollTypeQuestion::wherePollTypeId($id);

        (new Viewer('poll-types.edit', compact(['pollType', 'pollTypeQuestions'])))->render();
    }

    public function update()
    {
        // формуэмо массив даных на оновлення
        $data = [
            'id' => trim($_POST['id']) ?: null,
            'name' => trim($_POST['name']) ?: null
        ];

        // валідація
        $rules = [
            'id' => ['required'],
            'name' => ['required', 'min3', 'max255'],
        ];
        if (!Validator::make($rules, $data)->validate()) {
            $_SESSION['old'] = $data;
            header('Location: ' . '/poll-types/edit?id=' . $data['id']);
            exit();
        }

        PollType::make()->fill($data)->update();

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