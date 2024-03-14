<?php

namespace app\Controllers;

use app\Models\PollType;
use app\Models\PollTypeQuestion;
use core\PDO;
use core\Validator;
use core\Viewer;

class PollTypeQuestionController
{
    public function store(): void
    {
        $data = [
            'question' => trim($_POST['question']) ?: null,
            'poll_type_id' => trim($_POST['poll_type_id']) ?: null
        ];

        $rules = [
            'question' => ['required', 'min3', 'max255'],
            'poll_type_id' => ['required'],
        ];
        if (!Validator::make($rules, $data)->validate()) {
            $_SESSION['old'] = $data;
            header('Location: ' . '/poll-types/edit?id=' . $data['poll_type_id']);
            exit();
        }

        PollTypeQuestion::make()->fill($data)->create();

        header('Location: ' . '/poll-types/edit?id=' . $data['poll_type_id']);
        exit();
    }

    public function delete(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ' . '/poll-types/edit?id=' . $_GET['poll_type_id'] ?? null);
            exit();
        }

        PollTypeQuestion::delete($id);

        header('Location: ' . '/poll-types/edit?id=' . $_GET['poll_type_id'] ?? null);
        exit();
    }
}