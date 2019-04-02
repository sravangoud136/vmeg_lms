<!DOCTYPE html>
<html lang="en">
<head>
  <title>messaging</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #abc {
    display:none;
  }
  .container1{
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
   background-color:lightyellow;
  padding:5px;
  max-width:150px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-left: 10px;
  
 
}
.button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

</style>
</head>
<body >
<div id="div1"></div>
<?php include("configure.php");
 session_start();
?>

<!--<a href="grpmsgview.php" target="frame"><button class="button" style='float:right;'>Group message <span class="glyphicon glyphicon-edit"></span></button></a>-->
  <?php
      $f=$_SESSION['id']; 
      $fc=$_SESSION['fac'];
      $fname=$_SESSION['fname'];
      if($_SESSION['type']=='student')
    $sql="select * from messaging where receiver_id='$fc' and sender_id='$f' union select * from messaging where receiver_id='$f' and sender_id='$fc' group by dateandtime order by dateandtime;";
      else
        header('location:chat_fac.php');

    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    /* echo'<div id="adjust">
      <nav class="navbar navbar-default navbar-fixed-top">
     
  <div class="container">
    <h2><p>Mr.'.$fname.'</p></h2>
  </div>
</nav>';*/
echo '<div class="container1">';
$d='';
    while($row=mysqli_fetch_array($query))
    {
   
    $id=$row['sender_id'];
    $msg=$row['message'];
    $time=$row['dateandtime'];
    $rec=$row['receiver_id'];
    $mid=$row['mid'];
      $c=substr($time,2,9);
    if($d!=$c)
    {
      echo '<br><center><div style="background-color:lightgrey;  ">'.date("d-M-Y", strtotime($c)).'</div></center><br>';

    }
    $d=$c;
        if($id==$f)
        echo '<br><div class="me"><p style="font-size:8px">'.$id.'&nbsp&nbsp<span style="color:blue;opacity:0.6;font-size:8px;float:right">'.substr($time,11,5).'</span></p>'.$msg.'</div>';
         else
         echo '<br><div class="him"><p style="font-size:8px">'.$id.'&nbsp&nbsp<span style="color:blue;opacity:0.6;font-size:8px;float:right">'.substr($time,11,5).'</span></p>'.$msg.'</div>';
       
      /* $u="update messaging set status=1 where  receiver_id='$rec' and mid='$mid';";
      if(mysqli_query($con,$u)){
        //echo "status updated";
      }
      
       // echo "status failed";*/
      

    }
   

 ?>

   <!--<div id="bottom">
      <nav class="navbar navbar-default navbar-fixed-bottom">-->
  <br>   
  <div class="container">
  <form action="fac_message.php" method="post"  id="form1">
     <div class="form-group">
     <div style="float:left"><textarea class="form-control" rows="1" id="comment" name="message" style="width:400px"></textarea></div><div>
      <!--<input type="submit" name="postfile" class="btn btn-primary" id="sub"></div>-->
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
     $("input").focus();
    });
  });
  $("#form1").submit(function(){return false;});
 
});
</script>

 

