<?php

return [
    '/home' => [\app\Controllers\HomeController::class, 'index'],
    '/users' => [\app\Controllers\UserController::class, 'index'],
    '/users/show' => [\app\Controllers\UserController::class, 'show'],
    '/users/update' => [\app\Controllers\UserController::class, 'update'],
];