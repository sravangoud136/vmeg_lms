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
   <?php include("configure.php");?>
    
    <?php
     session_start();
     if(isset($_POST["save"]))
     {
     $c=$_SESSION["type"];
     //echo $c;
    /*if($con)
    echo "successful<br>";
    else
    echo "failed<br>";*/
    $i=$_POST["id"];
    $a=$_POST["fname"];
    
    $b=$_POST["pwd1"];
    
    $fn=$_POST["firstname"];
    $ln=$_POST["lastname"];
    $em=$_POST["email"];
    $mob=$_POST["mobile"];
    $img=$_FILES["image"]["name"];

         if($c=='Faculty'){
     
     $sql="update  faculty set firstname='$fn',lastname='$ln',email='$em',mobile='$mob',fid='$i',fname='$a',password='$b' where fid='$i';";
        $ins="update fimages set id='$i',iname='$img' where id='$i';";
                         }
     if($c=='student'){
     
        $sql="update  student set firstname='$fn',lastname='$ln',email='$em',mobile='$mob',sid='$i',sname='$a',password='$b' where sid='$i';";
       $ins="update simages set id='$i',iname='$img' where id='$i';";
       }
       if($img!=null)
      mysqli_query($con,$ins);
      //else
        //echo"failed";

    if(mysqli_query($con,$sql))

    {
      header("location:editpage.php");
       //echo '<br><br><br><center><div style="background-color:#f3f3f3;max-width:400px"><br><div><b><i>Updated successfully</i></b></div><br><div><a href="editpage.php"><button class="btn btn-primary" style="color:white">click</button></a> here to go to edit page</div><br></div><center><br>';
       move_uploaded_file($_FILES["image"]["tmp_name"], "pictures/$img");
       header("location:editpage.php");
    }
    else
    {
    echo "Failed to update<br>";
    }

}
else
 header("location:profile.php");
?>





</body>
</html> 
