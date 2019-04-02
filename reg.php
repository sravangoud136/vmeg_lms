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

</head>
<body>

   <?php include("configure.php")?>
    
    <?php

    //if($con)
    //echo "successful<br>";
    //else
    //echo "failed<br>";
    $i=$_POST["id"];
    $a=$_POST["fname"];
    
    $b=$_POST["pwd1"];
    $c=$_POST["type"];
   
    $img=$_FILES["image"]["name"];

         if($c=='Faculty'){
     
        $sql="insert into faculty(fid,fname,password) values('$i','$a','$b');";
        $ins="insert into fimages values('$i','$img');";
                         }
     if($c=='student'){
     
        $sql="insert into student(sid,sname,password) values('$i','$a','$b');";
        $ins="insert into simages values('$i','$img');";
       }
    if(mysqli_query($con,$sql)&&mysqli_query($con,$ins)){
       echo '<br><br><br><center><div style="background-color:#f3f3f3;max-width:400px"><br><div><b><i>Registration successfull</i></b></div><br><div><a href="edit_login1.html"><button class="btn btn-primary" style="color:white">click</button></a> here to Login</div><br></div><center><br>';
      
       move_uploaded_file($_FILES["image"]["tmp_name"], "pictures/$img");
    }
    else
    echo "Failed to insert<br>";
    ?>


<!--Welcome <?//php echo $_POST["fname"]; ?>
Your Role is: <?//php echo $_POST["type"] ?>

Registration successful!!<button class="btn btn-primary"><a href="edit_login.html">click here to login</a><button>

-->
</body>
</html> 
