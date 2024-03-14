<?php

return [
    '/' => [\app\Controllers\HomeController::class, 'index'],
    '/home' => [\app\Controllers\HomeController::class, 'index'],
    '/users' => [\app\Controllers\UserController::class, 'index'],
    '/users/show' => [\app\Controllers\UserController::class, 'show'],
    '/users/update' => [\app\Controllers\UserController::class, 'update'],


    '/poll-types' => [\app\Controllers\PollTypeController::class, 'index'],
    '/poll-types/show' => [\app\Controllers\PollTypeController::class, 'show'],
    '/poll-types/create' => [\app\Controllers\PollTypeController::class, 'create'],
    '/poll-types/store' => [\app\Controllers\PollTypeController::class, 'store'],
    '/poll-types/edit' => [\app\Controllers\PollTypeController::class, 'edit'],
    '/poll-types/update' => [\app\Controllers\PollTypeController::class, 'update'],

    '/poll-type-questions/store' => [\app\Controllers\PollTypeQuestionController::class, 'store'],
    '/poll-type-questions/delete' => [\app\Controllers\PollTypeQuestionController::class, 'delete'],

];