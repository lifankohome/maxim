<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/4
 * Time: 19:57
 */
namespace inc\Db;

class Db
{
    private static $db = "lifanko";

    public static function setDb($db)
    {
        self::$db = $db;
    }

    public static function getDb()
    {
        return self::$db;
    }

    public static function connect()
    {
        try {
            $PDO = new \PDO("mysql:host=127.0.0.1;dbname=" . self::$db, "root", "lifanko521");
        } catch (\PDOException $e) {
            die("<div style='color: red;text-align: center;margin-top: 10%'><h1>Unable to connect to database</h1><h3>Please contact lifankohome@163.com</h3></div>");
        }
        $PDO->query("set names utf8");

        return $PDO;
    }
}
