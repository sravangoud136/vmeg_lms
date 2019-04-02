<?php include('edit_profile_template.php');
      include('configure.php');

      echo'</nav>';
     ?>
     <hr>
  <style>
  .sidenav {
      height: 100%;
      font-size:16px;
      

    }
    h4{
      font-weight: bold;
    }
</style>
<body>
    <div class="row content">
    <div class="col-sm-3 sidenav">

      <h4 style="color:red">&nbsp&nbsp&nbspCourses</h4>
      <ul class="nav nav-pills nav-stacked">
      <?php
      
    $fid=$_SESSION['id'];
    //$con=mysqli_connect('localhost','root','','Lms');
    if($_SESSION['type']=='Faculty')
     $sql="select * from courses c,teach t where t.cid=c.cid and t.fid='$fid' ;";
     else
     $sql="select * from courses c,enrolls e where e.cid=c.cid and e.sid='$fid' ;"; 
   
    if($query=mysqli_query($con,$sql)){
      //echo "success";
    }
   
    while($row=mysqli_fetch_array($query))
    {
    $x= $row['cname'];
    $y=$row['cid'];
    //echo'<p>course code:'.$y.'</p>';
       if($_SESSION['type']=='Faculty')
        echo'<li><a href="coursbase.php?id='.$fid.'&cid='.$y.'&cname='.$x.'">'.$x.'</a><li>';
       else
        echo'<li><a href="coursbase.php?id='.$fid.'&cid='.$y.'&cname='.$x.'">'.$x.'</a><li>';


      
      
    
    }
 
  echo'</ul><br>';
    
?>

     
       
       
      
      
    </div>

    <div class="col-sm-9">
     <iframe   src="welcome.html" id="frame" name="frame" scrolling="no" style=" overflow: hidden;"></iframe>
    </div>
  </div>
  
 <footer class="container-fluid bg-4 text-center">
  <p>A Learning platform by<a href="http://www.vardhaman.org">www.vardhaman.org</a></p> 
 </footer>

</body>
</html>
