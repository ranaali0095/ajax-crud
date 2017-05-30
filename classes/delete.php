<?php
/**
 * Created by PhpStorm.
 * User: ranaali
 * Date: 12/29/16
 * Time: 3:18 AM
 */
$idP = $_POST['idP'];
require('connection.php');
$con = Connection();
$sql = "DELETE FROM persons WHERE id=:idPersona";
$q = $con->prepare($sql);
$q->execute(array(':idPersona'=>$idP));

