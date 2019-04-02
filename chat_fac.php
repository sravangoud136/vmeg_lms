<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>
</head>
<body>
<?php include("configure.php");
 session_start();
?>

<div class="container">
  <h2></h2>
  <p></p>  
  <!--<a href="grpmsgview.php" target="frame"><button class="button" style='float:right;background-color:#474e5d;'>Group message <span class="glyphicon glyphicon-edit"></span></button></a> -->       
  <table class="table">
    <thead>
      <tr>
        <th>Chats</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $f=$_SESSION['id']; 
      $fc=$_SESSION['fac'];
      $cid=$_SESSION['cid'];
      //echo $cid;
     //echo $cid;
    $sql="select * from student;";
      
    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
 

    while($row=mysqli_fetch_array($query))
    {
   
    $sid=$row['sid'];
    $sname=$row['sname'];
   
    $s="select count(mid) as mcount from messaging where sender_id='$sid' and receiver_id='$f';";
    if( $query1=mysqli_query($con,$s)){
      /*echo "success"*/
    }
    $row1=mysqli_fetch_array($query1);
    $mcount=$row1['mcount'];
        echo '<tr>
        <td>'.$sid.'</td>
        <td>'.$sname.'</td>
      <td>'.$mcount.'new messages</td>
        <td><a href="chat_handle.php?senderid='.$sid.'&sendername='.$sname.'"><button class="btn btn-primary">view</button></a></td>
      </tr>';
      
        

    }
    

    ?>

    

   
    
   

      
     
    </tbody>
  </table>
</div>

