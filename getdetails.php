<?php include("configure.php");?>
<?php
   session_start();
   if(isset($_SESSION["uname"])&&($_SESSION["pass"])){
   $p=$_SESSION["uname"];
    $q=$_SESSION["pass"];
    $r=$_SESSION["type"];

    $con=mysqli_connect('localhost','root','','Lms');
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
    $id=$row['fid'];
    $x= $row['fname'];
    $y=$row['password'];
    $fn=$row['firstname'];
    $ln=$row['lastname'];
    $em=$row['email'];
    $mob=$row['mobile'];


     
    /*echo"PASSWORD:".$y."<br>";
      echo $z;*/
    $ret="select * from fimages i,faculty f where f.fid=i.id and fname='$p' and password='$q';";
    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
   }
  
     if($r=='student')
     {
    $sql="select * from student where sname='$p' and password='$q';";
    
   if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    $row=mysqli_fetch_assoc($query);
    $id=$row['sid'];
    $x= $row['sname'];
    $y=$row['password'];
    $fn=$row['firstname'];
    $ln=$row['lastname'];
    $em=$row['email'];
    $mob=$row['mobile'];
    

     
    /*echo"PASSWORD:".$y."<br>";
      echo $z;*/
    $ret="select * from simages i,student s where s.sid=i.id and sname='$p' and password='$q';";
    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
   }


    /* echo"<img src='pictures/$pic' ><br>";
      echo"click here to<a href='logout.php'>logout</a>";*/
  }
     else{
        header('location:edit_login1.html');
     }


     

  


     ?>
