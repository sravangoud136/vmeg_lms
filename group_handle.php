<?php
   session_start();
    $con=mysqli_connect('localhost','root','','Lms');
      
       $s=$_SESSION['id'];
       $f=$_SESSION['fac'];
       //$f=$_SESSION['rec_id'];
                $m=$_POST['message'];

                $sql="insert into messaging(sender_id,receiver_id,message) values('$s','$f','$m');"; 
                if(mysqli_query($con,$sql)){

                                          echo"posted";     
                                          }
                   else
                          echo"failed to upload111";
                echo header("location:grpmsgview.php");
          
            ?>