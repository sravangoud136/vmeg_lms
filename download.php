 <?php
    $con=mysqli_connect('localhost','root','','Lms');
  $id=$_GET['id'];
   $sql="select * from documents where id='$id';";
   $res=mysqli_query($con,$sql);
   while($row=mysqli_fetch_array($res))
   {
   	$path=$row['path'];
   	header('Content-Disposition:attachment;filename ="'.basename($path).'"');
   	header("content-type:application/octent-strem");
   	header("content-length:".filesize($path));
    ob_clean();
    ob_flush ();
   	readfile($path);


   }
   ?>
   <body> 


