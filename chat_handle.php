<?php include("configure.php");
 session_start();
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
.container1{
  width:500px;
  border:1px solid black;

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
  max-width:150px;
  position: relative;
  background: white;
  text-align: right;
  padding: 10px 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-left:340px;
 
 
 
}

.him {
   background:lightyellow;
  
  padding:5px;
  max-width:150px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-left:10px;
 
}

</style>

	
   <h3 style="font-family: verdana;color:blue"></h3><br>
      
  <?php
      $senderid=$_GET['senderid'];
      $sendername=$_GET['sendername'];
      $f=$_SESSION['id']; 
      $fc=$_SESSION['fac'];
      $_SESSION['rec_id']=$senderid;
    $sql="select * from messaging where receiver_id='$f' and sender_id='$senderid' union select * from messaging where receiver_id='$senderid' and sender_id='$f' group by dateandtime order by dateandtime;";
      
      
    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }

    
     /*echo'<div id="adjust">
      <nav class="navbar navbar-default navbar-fixed-top">
     
  <div class="container">
    <h2><p>'.$sendername.'</p></h2>
  </div>
</nav>';*/
echo '<div class="container1"><div><p></p></div><div class="container">
    <h2><p>'.$sendername.'</p></h2><hr>
  </div>';
    $d='';
    while($row=mysqli_fetch_array($query))
    {
    
    $id=$row['sender_id'];
    $msg=$row['message'];
    $time=$row['dateandtime'];
    $rec=$row["receiver_id"];
    $c=substr($time,2,9);
    $mid=$row['mid'];
    if($d!=$c)
    {
      echo '<br><center><div style="background-color:lightgrey">'.date("d-M-Y", strtotime($c)).'</div></center><br>';

    }
    $d=$c;

        if($id==$senderid)
        echo '<br><div class="him"><p style="font-size:8px">'.$id.'&nbsp&nbsp<span style="color:blue;opacity:0.6;font-size:8px;float:right">'.substr($time,11,5).'</span></p>'.$msg.'</div>';
        else
        echo '<br><div class="me"><p style="font-size:8px"><span style="color:blue;opacity:0.6;font-size:8px;float:left">'.substr($time,11,5).'</span>&nbsp&nbsp'.$id.'</p>'.$msg.'</div>';
      /*$u="update messaging set status=1 where sender_id='$id' and receiver_id='$rec' and mid='$mid';";
      if(mysqli_query($con,$u)){}//{[-]
        //echo "status updated";
     // }
      //else
        //echo "status failed";*/
   }
   

 
 ?>

   <!--<div id="bottom">
      <nav class="navbar navbar-default navbar-fixed-bottom">-->
    <br> 
  <div class="container">
  <form action="fac_message.php" method="post" enctype="multipart/form-data" id="form1">
     <div class="form-group">
     <div style="float:left"><textarea class="form-control" rows="1" id="comment" name="message" style="width:400px"></textarea></div><div><!--input type="submit" name="postfile" class="btn btn-primary" value="send"></div>-->
     <button class="btn btn-primary" name="postfile"  id="sub">send</button>
  </div>
      
      </form>
    </div>
  </div>
     <!-- </nav>-->
       <script type="text/javascript">
    $(document).ready(function(){
  $("#sub").click(function(){
    $.post($("#form1").attr("action"),
    {
      message: $("#comment").val()
     
    },
    function(data){
     $("#div1").html(data);
     $("#comment").val(" ");
     location.reload();
     
    });
  });
  $("#form1").submit(function(){return false;});
 
});
</script>
