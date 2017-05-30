<?php
/**
 * Created by PhpStorm.
 * User: ranaali
 * Date: 12/29/16
 * Time: 3:19 AM
 */

$name = $_POST['name'];
$occupation = $_POST['occupation'];
$age = $_POST['age'];
$city = $_POST['city'];
$website = $_POST['website'];
$idP = $_POST['idP'];
require('connection.php');
$con = Connection();
$sql = 'UPDATE persons SET name=:name, occupation=:occupation, age=:age, city=:city, website=:website WHERE id=:idPerson';
$q = $con->prepare($sql);
$q->execute(array(':name'=>$name, ':occupation'=>$occupation, ':age'=>$age, ':city'=>$city, ':website'=>$website, ':idPerson'=>$idP));

