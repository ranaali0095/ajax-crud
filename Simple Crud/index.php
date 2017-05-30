<html>
<head>
    <title>crud</title>

    <link rel="stylesheet" href="bootstrap.min.css">

    <link rel="stylesheet" href="style.css">




</head>
<body>

<?php
// add dbconnection

include ('dbconnect.php');

//create Query
$query = "SELECT * FROM books";
$result = mysqli_query($conn , $query);
?>




<div class="container">
    <h3> BOOKS SHOP</h3>
   <div class="row">


      <div class="col-sm-4">
          <h3>Add New Records</h3>
          <form role="form" name="userData" action="" onsubmit="register(); return false;"">
              <div class="form-group">
                  <label>Book Title</label>
                  <input type="text" name="btitle" class="form-control">

              </div>

              <div class="form-group">
                  <label>Book Price</label>
                  <input type="text" name="bprice" class="form-control">

              </div>
              <button type="submit" class="btn btn-info btn-block">Add Books</button>
          </form>

    </div>
       <div class="col-sm-8">
           <h3>Displaying All Records</h3>

           <table class="table">
               <thead>
               <tr>
                   <th>Book Title</th>
                   <th>Book Price</th>
                   <th>Crud Actions</th>

               </tr>

               </thead>

               <tbody>

               <?php
               while ($row = mysqli_fetch_assoc($result)){


               ?>


               <tr>
                   <td><?php echo $row['book_title']; ?></td>
                   <td><?php echo $row['book_price']; ?></td>
                   <td>
                       <a href="edit.php?id=<?php echo $row['book_id']; ?>" class="btn btn-success" role="button">Edit Book</a>
                     
                       <a onclick="Delete('<?php echo $row['book_id']; ?>')" class="btn btn-danger" role="button">Delete Book</a>
                   </td>
               </tr>

               <?php
               }
               mysqli_close($conn);
               ?>
               </tbody>


           </table>

       </div>
</div>
</div>
<script type="text/javascript">
  function register(event){

   var title = document.userData.btitle.value;
   var price = document.userData.bprice.value;

   console.log(price)

   var xhr = new XMLHttpRequest();

   xhr.open("POST","insert.php",true);

   xhr.onreadystatechange = function(){
    console.log('hel')
    if(xhr.readyState == 4 && xhr.status == 200){
        console.log('hel')
      alert('Data was save successfully')
      window.location.reload(true);
    }
   }

    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("btitle=" + title + "&bprice=" + price);

  
  }

  function Delete(id){
    console.log(id);
  }
</script>

</body>
</html>





<?php

?>