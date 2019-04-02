<?php include("configure.php")?>
<?php
   session_start();
   if(isset($_SESSION["uname"])&&($_SESSION["pass"])){
   $p=$_SESSION["uname"];
    $q=$_SESSION["pass"];
    $r=$_SESSION["type"];

  
    /*if($con)
    echo "successful<br>";
    else
    echo "failed<br>";*/
     if($r=='Faculty')
     {
    $sql="select * from faculty where fname='$p' and password='$q';";
    
   if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    $row=mysqli_fetch_assoc($query);
    $x= $row['fname'];
    $y=$row['password'];
    

     
    /*echo"PASSWORD:".$y."<br>";
      echo $z;*/
    $ret="select * from fimages i,faculty f where f.fid=i.id and fname='$p' and password='$q';";
    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
     $assign="assignments1.php";
     $material="materials.php";
   }
  
     if($r=='student')
     {
    $sql="select * from student where sname='$p' and password='$q';";
    
   if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    $row=mysqli_fetch_assoc($query);
    $x= $row['sname'];
    $y=$row['password'];
    $_SESSION['userid']=$row["sid"];

     
    /*echo"PASSWORD:".$y."<br>";
      echo $z;*/
    $ret="select * from simages i,student s where s.sid=i.id and sname='$p' and password='$q';";
    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
      $assign="std_assign1.php";
      $material="student_mater.php";
   }


    /* echo"<img src='pictures/$pic' ><br>";
      echo"click here to<a href='logout.php'>logout</a>";*/
  }
     else{
        header('location:edit_login1.html');
     }


     

  


     ?>



     


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>vardhaman.org/LMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px verdana, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
       background-color: #f3f5f8;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #2d5bb7; /* Green */
      color: #ffffff;
      margin-top:5px;
      margin-left: 10px;
      margin-right: 10px;
      margin-bottom: 5px;
      border:1px;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;

  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
      /*margin-left: 10px;
      margin-right: 10px;
      margin-bottom: 10px;*/
  }
  .container-fluid {
     /* padding-top: 30px;
      padding-bottom: 30px;*/
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 5px;
      /*padding:10px;*/
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      margin-left:10 px;
      margin-right:10 px;
      font-size: 12px;
      letter-spacing: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      background-color: #4456b4;
        }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
#frame{
  width:100%;
  border:1px;
  

}
iframe 
{
  overflow: hidden;
  position:relative;
  height:500px;
  /*margin-top:10px;
  margin-left: 10px;
  margin-right: 10px;
  margin-bottom: 10px;*/
  border:1px;
  background-color: #f3f5f8;
  padding:20px;


}
a:active{
  color:orange;

}

  </style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style=" color:white">VARDHAMAN LMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="courses.php" target="frame">MY COURSES</a></li>-->
        
        <!--<li>  </li>-->
       <li></li>
        <li class="dropdown">
         
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;background:#4456b4 !important; "> <?php echo"<img src='pictures/$pic' width='50' height='50'  class='img-circle'>"?><?php echo " ".$x;?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editpage.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            
          </ul>
        </li>
        </ul>
    </div>
  </div>



