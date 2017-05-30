<?php
// add dbconnect



$title = $_POST['btitle'];
$price = $_POST['bprice'];


include ('dbconnect.php');

//create query
$query = "INSERT INTO books(book_title , book_price) VALUES ('$title','$price')";
if(mysqli_query($conn, $query)){
    header("Location: index.php");
}
else{
    echo "Error in Query";
}
mysqli_connect($conn);
?>