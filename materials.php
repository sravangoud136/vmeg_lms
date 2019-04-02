
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
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
      border:1px;
      }
  .container{
    width:500px;
    border:1px solid black;
  }
  .container .row{
    margin:2px;
  }
      body{
         background-color: #f3f5f8;
      }

</style>
</head>
<body >
 <?php
    session_start();
    $con=mysqli_connect('localhost','root','','Lms');
     ?>
   <div class="container">
       <div id="Faculty">
       <div class="row">
        <div id="hide" >
          <h3 style="font-family: verdana"> post material</h3><hr>
       <form action="upload.php" method="post" enctype="multipart/form-data">

    <?php
   echo'</div>';
  $fid=$_SESSION['id'];
    $con=mysqli_connect('localhost','root','','Lms');
    $sql1="select * from courses c,teach t where t.cid=c.cid and t.fid='$fid' ;";
    if( $query=mysqli_query($con,$sql1)){
      /*echo "success"*/
    }
   
  echo'
    <div style="width:50%"><label for="sel1">Select course</label>
  <select class="form-control" id="sel1" name="course">';
    while($row=mysqli_fetch_array($query))
    {
    $x= $row['cname'];
    $y=$row['cid'];
   echo'
    <option name="'.$x.'" value="'.$y.'">'.$x.'</option>';
    
    }
   echo' </select>
</div>';

    ?>
  <br>
    

          
 
        <div class=form-group style="width:50%">
      DOC-Name:<input type="text" name="n">
        </div>
        <div class=form-group>
        Upload:<input type="file" name="f">
        </div>
      </div>
   
        <div class="form-group">
        
      <textarea class="form-control" rows="3" id="comment" name="message"></textarea>
      </div>
      <div>
      <input type="submit" name="postfile" class="btn btn-primary"><br><br>
      </div>
      </form>
     </div>
   </div>
   </div>
  <br>
  <hr>
<div class="container">
  <?php
      $f=$_SESSION['id']; 
     $courseid= $_SESSION['cid'];
    $sql="select * from documents where cid='$courseid';";

    if( $query=mysqli_query($con,$sql)){
      /*echo "success"*/
    }
    echo'<div class="row">';

    while($row=mysqli_fetch_array($query))
    {
    $x= $row['cid'];
    $y=$row['name'];
    $path=$row['path'];
    $id=$row['id'];
    $msg=$row['message'];
        
        echo '<br><div></div><br><div class="well"><span class="glyphicon glyphicon-list-alt"></span>'.$y;
        echo'<a href="download.php?id='.$id.'?>" style="float:right">download</a><div>'.$msg.'</div></div>';
       

    }

    ?>
  
  </div>  
 </div>
</div>

</body>
</html>



