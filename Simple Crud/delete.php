<?php
$bid = $_GET['id'];
include ('dbconnect.php');

$query = "DELETE FROM books WHERE book_id='$bid'";

if(mysqli_query($conn, $query)){

header("Location:index.php");

}
else{
    echo "Error in Query";
}

mysqli_close($conn);

?>