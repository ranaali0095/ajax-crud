<?php

$host ="localhost";
$user ="root";
$password ="";
$dbname ="bookshop";
 $conn = mysqli_connect("$host", "$user", "$password", "$dbname");
 if (!$conn){
     die("error in connection");
 }

