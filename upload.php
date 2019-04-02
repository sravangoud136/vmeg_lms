<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
    session_start();
    $con=mysqli_connect('localhost','root','','Lms');

  if(isset($_POST['postfile']))
  {		  
         if($_SESSION['type']=='Faculty'){

                $c=$_POST['course'];
        $n=$_POST['n'];
        $m=$_POST['message'];
       $fname=$_FILES['f']['name'];
        $dest="files/".$fname;
         $s=$_SESSION['id'];
     

                $sql="insert into documents(name,filename,path,message,cid,postedby) values('$n','$fname','$dest','$m','$c','$s');";
                    if(mysqli_query($con,$sql)){
                                                move_uploaded_file($_FILES["f"]["tmp_name"], $dest);
                                                 echo"file uploaded";

                                                 echo'<br><center><div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;"><img src="loader.gif" width="64" height="64" /><br>Loading..</div>
                  
                                                 <div id="notif"><button class="btn btn-primary" id="notify">Notify Students</button></div></center>';
                                               }
                   else
                        	echo"failed to upload";
       }
       else{
                $s=$_SESSION['id'];
                $m=$_POST['message'];
                $sql="insert into messaging(sender_id,message) values('$s','$m');"; 
                if(mysqli_query($con,$sql)){

                                          echo"posted";     
                                          }
                   else
                          echo"failed to upload111";

       }

  }
  ?>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#notify").click(function(){

        $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
     });
  
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  });
          $.ajax({
            url: "send_mail.php",
            success: function(result){
      $("#notif").html(result);
        }

        });

        });

    });
  </script>