<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style >
 a{
    text-decoration: none;
 }
  body{
         background-color: #f3f5f8;
      }

  </style>
 

</head>

<body>
	<h1>hello!.....</h1>
	<div class="container">
  <?php
  session_start();
    $con=mysqli_connect('localhost','root','','Lms');
     
    $courseid=$_SESSION['cid'];
     $sql1="select distinct q.cid,c.cname from courses c,quiz_score q where q.cid=c.cid and c.cid='$courseid';";

    
     $query1=mysqli_query($con,$sql1);
    echo'<div class="row">';

   while($row1=mysqli_fetch_array($query1))
    {
      $course=$row1["cname"];
      $cid=$row1["cid"];
      echo"<br><p style='color:blue'><b>$course</b></p>";

     $sql="select distinct q.chapter from quiz_score q where cid='$cid';";
     if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }

    while($row=mysqli_fetch_array($query))
    {
        
        $ch=$row["chapter"];

        echo '<div><span class="glyphicon glyphicon-list-alt"></span><a href="quiz1.php?id='.$ch.'&cid='.$cid.'">chapter'.$ch.' Assignment </a></div><br>';
        
        
    }
  }
    echo'</div>';
    ?>

</body>
</html>