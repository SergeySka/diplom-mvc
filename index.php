<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

class Di
{
    static $di = null;

    public static function get()
    {
        if (!self::$di) {
            self::$di = new Di();
        }
        return self::$di;
    }

    public function config()
    {
        $config = include 'config.php';
        return $config;
    }

    public function db()
    {
        $config = $this->config();
        try {
            $db = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8',
                $config['user'],
                $config['pass']
            );
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage() . '<br/>');
        }
        return $db;
    }

}

include 'controller/Controller.php';
