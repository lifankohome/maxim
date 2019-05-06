<?php
/**
 * Created by PhpStorm.
 * User: zw
 * Date: 2019/5/6
 * Time: 17:47
 */
require_once 'Db.php';

use inc\Db\Db;

$pdo = Db::connect();

$filename = 'buffer.txt';
$fh = fopen($filename, 'r');

$time = time();
while (!feof($fh)) {
    $line = fgets($fh);

    if (strlen($line) > 5) {
        $sql = "INSERT INTO maxim (content,time) VALUES (:content, :time)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['content' => $line, 'time' => $time]);
    }
}

fclose($fh);

