<?php include("edit_login1.html")?>
<?php include("configure.php")?>

<?php
   session_start();

   /*if(isset($_SESSION['id']) and isset($_SESSION['pwd']) and isset($_SESSION['type']))
   {

      $a=$_SESSION['id'];
      $b=$_SESSION['pwd'];
      $z=$_SESSION['type'];
     if($a==$id and $b==$y and $z=='Admin' )
         header("location:admin.php");

      else if($a==$id and $b==$y and $z=='Faculty' )
         header("location:staff.php");
      
     else if($a==$id and $b==$y and $z=='student' )
         header("location:student.php");
   }*/

    /*if($con)
    echo "successful<br>";
    else
    echo "failed<br>";*/
    if(isset($_POST["login"])){
    $a=$_POST["id"];
    //echo $a;
    
    $b=$_POST["pwd"];
    //echo $b;
    $z=$_POST["type"];
    //echo $z;

    //$_SESSION["uname"]=$a;
    $_SESSION["pass"]=$b;
    $_SESSION["type"]=$z;
    

    if($z=='Faculty'){
    $sql="select * from faculty where fid='$a' and password='$b';";
    $ret="select * from fimages i,faculty f where f.fid=i.id;";

                    if($query=mysqli_query($con,$sql))
                    {
                        //echo "success";
                    }

    $row=mysqli_fetch_assoc($query);
    $x= $row['fname'];
    $y=$row['password'];
    $id=$row['fid'];
      $_SESSION["id"]=$id;
      $_SESSION["uname"]=$x;
    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
     /*echo"<img src='pictures/$pic'>";*/

     }



     if($z=='student'){
    $sql="select * from student where sid='$a' and password='$b';";
    $ret="select * from simages i,student s where s.sid=i.id;";
                    if($query=mysqli_query($con,$sql))
                        {
                        //  echo "success";
                        }
    $row=mysqli_fetch_assoc($query);
    $x= $row['sname'];
    $y=$row['password'];
     $id=$row['sid'];
      $_SESSION["id"]=$id;
       $_SESSION["uname"]=$x;

    $query2=mysqli_query($con,$ret);
    $row2=mysqli_fetch_assoc($query2);
     $pic=$row2["iname"];
      /*echo"<img src='pictures/$pic'>";*/

     }
    
   
    
    
     if($a==$id and $b==$y and $z=='Admin' )
         header("location:admin.php");

      else if($a==$id and $b==$y and $z=='Faculty' )
         header("location:staff.php");
      
     else if($a==$id and $b==$y and $z=='student' )
         header("location:student.php");
     else
         {
            echo"<br>"."<center>Invalid Username or password or role<center>";
            //echo"<br>"."<center>"."<a href='edit_login1.html'>click</a>here to login again"."</center>";
         
         }
     
     
    /*echo "NAME:".$x."<br>";
    echo"PASSWORD:".$y;*/
    
    
      
     }
     else
     {
        header('location:edit_login1.html');
     }

        ?>



