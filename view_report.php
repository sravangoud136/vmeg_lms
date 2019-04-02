<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2></h2>
  <p></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Roll number</th>
        <th>Name</th>
        <th>marks</th>
        <th>percentage</th>
      </tr>
    </thead>
    <tbody>


<?php
session_start();
//$userid=$_SESSION['userid'];
$id=$_GET['id'];
$cid=$_GET['cid'];

 $con=mysqli_connect('localhost','root','','Lms');
 $s="select distinct quizid,chapter from quiz_score where chapter='$id' and cid='$cid';";
$getid=mysqli_query($con,$s);
$r=mysqli_fetch_assoc($getid);
$quizid=$r["quizid"];
$chapter=$r["chapter"];
$sql="select distinct s.quizid,s.sid,st.sname,s.marks,s.percentage from quiz_score q,score s,student st where q.quizid=s.quizid and s.sid=st.sid and q.chapter='$id' and q.cid='$cid' ORDER by s.percentage desc;";
$getinfo=mysqli_query($con,$sql);
while($res=mysqli_fetch_assoc($getinfo)){
$quizid=$res["quizid"];
$sname=$res["sname"];
$sid=$res["sid"];
$marks=$res["marks"];
$percentage=$res["percentage"];
$total=($marks/$percentage)*100;
echo "<tr>
        <td>".$sid."</td>
        <td>".$sname."</td>
        <td>".$marks."/".round($total)."</td>
        <td>".$percentage."</td>
      </tr>";
}

echo "</tbody>
</table>
</div>";
?>

</body>
</html>
