<html>
<body>
 <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   body{
         background-color: #f3f5f8;
      }

  #abc {
    display:none;
  }

table {
    border-collapse: collapse;
    width: 80%;
}

.display th, td {
    text-align: left;
    padding: 8px;
}

.display tr:nth-child(even){background-color: #f2f2f2}

.display th {
    background-color:#2d5bb7;
    color: white;
}
#good{
  color:green;
}
#notgood
{
  color:red;
}
#best
{
  color:green;
}
#better
{
  color:blue;
}
/*
   CSS-Tricks Example
   by Chris Coyier
   http://css-tricks.com
*/

*         { margin: 0; padding: 0; }
body       { font: 14px Georgia, serif; }

#page-wrap        { width: 500px; margin: 0 auto; }

h1                  { margin: 25px 0; font: 14px Georgia, Serif; text-transform: uppercase; letter-spacing: 3px; }

#quiz input {
    vertical-align: middle;
}

#quiz ol {
   margin: 0 0 10px 20px;
}

#quiz ol li {
   margin: 0 0 20px 0;
}

#quiz ol li div {
   padding: 4px 0;
}

#quiz h3 {
   font-size: 17px; margin: 0 0 1px 0; color: #666;
}

#results {
    font: 44px Georgia, Serif;
}
#x{ font: 14px Georgia, serif;}
#customers td, #customers th {
    padding: 8px;
}

</style>
</head>
<body>
 <script> 
  function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            start = Date.now() + 1000;
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var fiveMinutes = 10,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
    window.setTimeout(function() { $("#sub").click();

     }, 10000);

};

</script>
  <!--<div class="btn btn-primary" onclick="CountDown(10, display)"></div>-->
<h3><p id="countdown"></p></h3>
<div id="display"></div>
<div id="show" >
<body>
    <div style="float:right;" id="timer"><span style="color: red">Exam ends in</span> <span id="time" style="font-family: verdana;"></span></div>
</body>
<?php
session_start();
$userid=$_SESSION['userid'];
$id=$_GET['id'];
$cid=$_GET['cid'];


 $con=mysqli_connect('localhost','root','','Lms');
$sql="select distinct *  from quiz q,quiz_score qs where qs.quizid=q.quizid and chapter='$id' and cid='$cid';";
$s="select distinct quizid from quiz_score where chapter='$id' and cid='$cid';";
$getid=mysqli_query($con,$s);
$r=mysqli_fetch_assoc($getid);
$quizid=$r["quizid"];

$display = mysqli_query($con,$sql);
  
if (!isset($_POST['submit'])) {

  
  echo "<form method='post' id='sravan' name='sravan' action=''>";
  echo "<table border=0 id='customers'>";

  while ($row = mysqli_fetch_array($display)) {
  $id = $row["qno"];
  $question = $row["question"];
  $opt1 = $row["opt1"];
  $opt2 = $row["opt2"];
  $opt3 = $row["opt3"];
  $opt4 = $row["opt4"];
  $answer = $row["answer"];
  

  echo "<tr style='background-color:#e4e3ea;padding:2px'><td colspan=3><br><b>$question</b></td></tr>";
  echo "<tr><td><input type=radio name=q$id value=\"$opt1\">$opt1 </td></tr><tr><td> <input type=radio name=q$id value=\"$opt2\">$opt2</td></tr><tr><td><input type=radio name=q$id value=\"$opt3\">$opt3 </td><tr><td><input type=radio name=q$id value=\"$opt4\">$opt4 </td></tr>";

  }

  echo "</table>";
  echo "<center><input type='submit'  id='sub' name='submit' class='btn btn-primary'>Get results</center>";
  echo "</form>";

}

elseif (isset($_POST['submit'])) 

{
 echo '<script>document.getElementById("timer").style.display="none";</script>';
$score = 0;
 
$total = mysqli_num_rows($display);
    while ($result = mysqli_fetch_array($display)) 


    {
          $q=" ";
            $id = $result["qno"];

            if(isset($_POST["q$id"]))
              $q = $_POST["q$id"];

           
           


        $answer = $result["answer"];



    if ($q == $answer) 
    {
    $score++; 
    }

}
$sper=($score/$total)*100;
$s1="insert into score values('$quizid','$userid','$score','$sper');";
if(mysqli_query($con,$s1))
  echo "<center><strong>Thank you.Your response has been recorded</strong></center>";
else
  echo "<center>Thank you </center>";

echo "<p align=center><div class='alert alert-success'>
  <strong>You scored $score out of $total</strong> .
</div></p>";
echo "<p>";

if   ($score == $total) {
echo "<p id='best'><b>Congratulations! You got every question right!</b></p>";
}
elseif ($score/$total < 0.34) {
echo "<p id='better'><b>Oh dear. Not the best score, but don't worry, it's only a quiz.</b></p>";
}
elseif ($score/$total > 0.67) {
echo "<b><p id='good'>Well done! You certainly know your stuff.</p></b>";
}
else {
echo "<p id='notgood'><b>Not bad - but there were a few that caught you out!But you need practice</b></p>";
}

echo "</p>";

echo "<p>Here are the answers:</p>";

echo "<table border=0 class='display'><tr><th>Q.no</th><th>ANS</th></tr><tr>";
$display = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($display)) {

$question = $row["question"];
$answer = $row["answer"];
//$q = $row["q"];

echo "<tr><td>$question</td>


 <td>$answer</td></tr>";




}
echo "</table></p>";

}
?>
</div>
</body>
</html>