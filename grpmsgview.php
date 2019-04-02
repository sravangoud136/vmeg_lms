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
  .container{
    width:500px;
    border:1px solid black;
  }
   body{
         background-color: #f3f5f8;
      }
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
    position: relative;
  background: white;
  
  padding: 10px 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-bottom:10px;
 max-width: 400px;
 
}

.him {
   background-color:lightyellow;
  padding:5px;
   border-radius: 6px;
  border: 1px solid #ccc;
  
 
}
.bottom{
  background-color:yellow;
}
</style>
</head>
<body >
 
<div class="container">

<?php include("configure.php");
 session_start();
?>


  <?php
      $f=$_SESSION['id']; 
      $fc=$_SESSION['fac'];
      $fname=$_SESSION['fname'];
      if($_SESSION['type']=='Faculty')
      echo'
      <div id="bottom">
    <br><br>
     <form action="group_handle.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <div>
     <div style="float:left"><textarea class="form-control" rows="1" id="comment" name="message" style="width:400px">write something here</textarea></div><div><input type="submit" name="postfile" class="btn btn-primary" value="Send"></div></div>
     </form>
     <br>
     <br>
  </div></div>';
      
      
     
    $sql="select * from messaging where sender_id=receiver_id and sender_id='$fc' group by dateandtime order by dateandtime desc;";
      //else
        //header('location:chat_fac.php');

    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
     
    $d='';
    while($row=mysqli_fetch_array($query))
    {
   
    $id=$row['sender_id'];
    $msg=$row['message'];
    $time=$row['dateandtime'];
      $c=substr($time,2,9);
      //echo'<div class="row">';
    if($d!=$c)
    {
      echo '<br><center><div style="background-color:lightgrey;max-width:200px;">'.date("d-M-Y", strtotime($c)).'</div></center><br>';

    }
    $d=$c;
        
        echo '<br><div class="me"><p style="font-size:8px">'.$id.'&nbsp&nbsp<span style="color:blue;opacity:0.6;font-size:8px;">'.substr($time,11,5).'</span></p>'.$msg.'</div>';
         /*else
         echo '<br><div class="him"><p style="font-size:8px">'.$id.'&nbsp&nbsp<span style="color:blue;opacity:0.6;font-size:8px;float:right">'.substr($time,11,5).'</span></p>'.$msg.'</div>';*/
       
      

    }

 // echo'</div>
   
     

 ?>


 </div>
 </body>
 </html>   
 
 

