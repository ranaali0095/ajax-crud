<?php
/**
 * Created by PhpStorm.
 * User: ranaali
 * Date: 12/29/16
 * Time: 3:14 AM
 */
$name = $_POST['name'];
$occupation= $_POST['occupation'];
$age = $_POST['age'];
$city = $_POST['city'];
$website = $_POST['website'];

require('connection.php');
$con = Connection();
$sql = 'INSERT INTO persons (name, occupation, age, city, website) VALUES (:name, :occupation, :age, :city, :website)';
$q = $con->prepare($sql);
$q->execute(array(':name'=>$name, ':occupation'=>$occupation, ':age'=>$age, ':city'=>$city, ':website'=>$website));

