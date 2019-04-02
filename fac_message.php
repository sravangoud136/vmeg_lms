<?php
   session_start();
    $con=mysqli_connect('localhost','root','','Lms');
      
       $s=$_SESSION['id'];
       if($_SESSION['type']=='student')
       $f=$_SESSION['fac'];
       else
        $f=$_SESSION['rec_id'];
                $m=$_POST['message'];

                $sql="insert into messaging(sender_id,receiver_id,message) values('$s','$f','$m');"; 
                if(mysqli_query($con,$sql)){

                                          echo"posted";     
                                          }
                   else
                          echo"failed to upload111";
          // if($_SESSION['type']=='student')
          //header('location:message.php');
           ////else
        // header('location:message.php');
            ?>
