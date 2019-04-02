<!DOCTYPE html>
<html lang="en">
<head>
  <title>courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
      border:1px;
      }
    .col-sm-4{
      background-color: #4caf50;
    }
</style>
</head>
<body>
<?php
session_start();

     $fid=$_SESSION['id'];
    $con=mysqli_connect('localhost','root','','Lms');
    if($_SESSION['type']=='Faculty')
    $sql="select * from courses c,teach t where t.cid=c.cid and t.fid='$fid' ;";
     else
     $sql="select * from courses c,enrolls e where e.cid=c.cid and e.sid='$fid' ;"; 
   
    if($query=mysqli_query($con,$sql)){
    	/*echo "success"*/
    }
    echo '<div class="container-fluid">';

    echo'<h1>courses:</h1>';

    while($row=mysqli_fetch_array($query))
    {
    $x= $row['cname'];
    $y=$row['cid'];
    echo'
    
     
      <span class="glyphicon glyphicon-list-alt"></span>';
       if($_SESSION['type']=='Faculty')
        echo'<h4><a href="materials.php">'.$x.'</a></h4>';
       else
        echo'<h4><a href="student_mater.php">'.$x.'</a></h4>';


      
      echo'<p>course code:'.$y.'</p>';
    
    }
 
  echo'</div>';
    
?>
      
    
       
 </body>

  
  
 



</html>
