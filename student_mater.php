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

</style>
</head>
<body >

<?php
    session_start();
    $con=mysqli_connect('localhost','root','','Lms');
     
?>
  
<div class="container">
  <?php
      $courseid=$_SESSION['cid'];
    $sql="select * from documents where cid='$courseid';";

    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    echo'<div class="row">';

    while($row=mysqli_fetch_array($query))
    {
    $x= $row['cid'];
    $y=$row['name'];
    $path=$row['path'];
    $id=$row['id'];
    $msg=$row['message'];
    $by=$row['postedby'];
    $date=$row['date'];

    $sql2="select fname from faculty where fid='$by';";
    $query1=mysqli_query($con,$sql2);
    $row1=mysqli_fetch_array($query1);


        
        echo '<div style="color:green">'.$row1["fname"].'&nbsp&nbsp&nbsp'.$by.'<p style="color:blue">'.$date.'</p></div><div class="well"><span class="glyphicon glyphicon-list-alt"></span>'.$y;
        echo'<a href="download.php?id='.$id.'?>" style="float:right"><i class="glyphicon glyphicon-download-alt"></i></a><div >'.$msg.'</div></div>';
       

    }

    ?>
    <h3 style="font-family: verdana"> post doubts:</h3><br>
       <form action="upload.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
        
      <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
    </div>
      <input type="submit" name="postfile">
      </form>
