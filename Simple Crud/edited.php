<?php

include ('dbconnect.php');

$id = $_GET['bookid'];

$title = $_GET['btitle'];

$price = $_GET['bprice'];


$query = "UPDATE books SET book_title='$title' , book_price='$price' WHERE book_id='$id'";

if(mysqli_query($conn, $query)){

    header("Location:index.php");

}
else{
    echo "Error in Query";
}

mysqli_close($conn);
?>