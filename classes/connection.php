<?php
/**
 * Created by PhpStorm.
 * User: ranaali
 * Date: 12/29/16
 * Time: 3:18 AM
 */

function Connection()
{
    $conn = null;
    $host = '127.0.0.1';
    $db = 'web_assign4';
    $user = 'root';
    $pwd = '';
    try {
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pwd);
    } catch (PDOException $e) {
        echo 'Sorry can not make connection ' . $e;
        exit;
    }
    return $conn;
}

