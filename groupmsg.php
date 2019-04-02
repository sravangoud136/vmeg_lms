
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Materials</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #abc {
    display:none;
  }
   body{
         background-color: #f3f5f8;
      }
#adjust{
  max-width:500px;
  height:400px;
  background-color:#f3f5f8;
  margin:20px;
  padding:35px;
  overflow:scroll;

}

.navbar{
  max-width:500px;
  margin-left:20px;
  background-color: #474e5d;
  color: #ffffff;
  padding:5px;

}
.me{
  max-width:150px;
  position: relative;
  background: white;
  text-align: right;
  padding: 10px 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-left:300px;
 
 
 
}

.him {
   background-color:lightyellow;
  padding:5px;
  max-width:150px;
  border-radius: 6px;
  border: 1px solid #ccc;
  
 
}


</style>
</head>
<body >

<?php include("configure.php");
 session_start();
?>


  <?php
      $f=$_SESSION['id']; 
      $fc=$_SESSION['fac'];
      $fname=$_SESSION['fname'];
      

    

    
   echo'
   <div id="bottom">
     
     
  
  <form action="group_handle.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
     <div style="float:left"><textarea class="form-control" rows="1" id="comment" name="message" style="width:400px"></textarea></div><div><input type="submit" name="postfile" class="btn btn-primary"></div>
     
  </div>
      
      </form>
    </div>
      </nav>';

 ?>

