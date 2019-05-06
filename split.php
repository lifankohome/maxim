<?php
/**
 * Created by PhpStorm.
 * User: zw
 * Date: 2019/5/6
 * Time: 17:36
 */

function readFileByLine($filename)
{
    $fh = fopen($filename, 'r');

    while (!feof($fh)) {
        $line = fgets($fh);

        if (mb_strlen($line) > 5 && mb_strlen($line) < 80) {
            $res = removeStart('、', $line);
//            $res = removeEnd('—', $res) == '' ? $res:removeEnd('-', $res);
//            $res = removeEnd('-', $res) == '' ? $res:removeEnd('-', $res);

            echo $res;
        }
    }

    fclose($fh);
}

function removeStart($sign, $str)
{
    $pos = mb_strpos($str, $sign);

    if ($pos !== false) {
        return mb_substr($str, $pos + 1);
    } else {
        return '';
    }
}

function removeEnd($sign, $str)
{
    $pos = mb_strpos($str, $sign);

    if ($pos !== false) {
        return mb_substr($str, 0, $pos - 1) . "\n";
    } else {
        return '';
    }
}

$filename = "get.txt";

readFileByLine($filename);
