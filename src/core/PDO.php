<?php

namespace core;

use \PDO as NativePDO;

class PDO
{
    protected static $pdo;

    public static function init(): NativePDO
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $config = require __DIR__ . '/../config/pdo.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset={$config['charset']}";
        $opt = [
            NativePDO::ATTR_ERRMODE            => NativePDO::ERRMODE_EXCEPTION,
            NativePDO::ATTR_DEFAULT_FETCH_MODE => NativePDO::FETCH_ASSOC,
        ];

        return self::$pdo = new NativePDO($dsn, $config['user'], $config['pass'], $opt);
    }
}