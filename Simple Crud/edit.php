<html>
<head>
    <title>crud</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<?php
$id =$_GET['id'];


//dbconnection
include ('dbconnect.php');

//create query

$query = "SELECT * FROM books WHERE book_id='$id'";
$result = mysqli_query($conn , $query);

?>
<div class="container">
    <h3>EDIT FORM</h3>

    <form role="form" action="edited.php" method="get">

        <?php
        while ($row = mysqli_fetch_assoc($result)){



        ?>
        <input type="hidden" name="bookid" value="<?php echo $row['book_id']; ?>">
        <div class="form-group">
            <label>Book Title</label>
            <input type="text" name="btitle" class="form-control" value="<?php echo $row['book_title']; ?>">

        </div>

        <div class="form-group">
            <label>Book Price</label>
            <input type="text" name="bprice" class="form-control" value="<?php echo $row['book_price']; ?>">

        </div>
        <button type="submit" class="btn btn-info btn-block">Edit Books</button>

<?php
}
mysqli_close($conn);
?>
    </form>
</div>

</body>
</html>
