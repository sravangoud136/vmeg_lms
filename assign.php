 <?php include('configure.php') ?>
 <?php
     session_start();
    $f=$_SESSION['id'];
    
   /* if($con)
    echo "successful<br>";
    else
    echo "failed<br>";*/
    $ch=$_POST["ch"];
    $qno=$_POST["qno"];
    $question=$_POST["question"];
    $a=$_POST["a"];
    $b=$_POST["b"];
    $c=$_POST["c"];
    $d=$_POST["d"];
    $e=$_POST["ans"];
    $courseid=$_SESSION['cid'];
    $quizid=$courseid.$ch;

    if(empty($ch) or empty($qno) or empty($question) or empty($a) or empty($b) or empty($c) or empty($d) or empty($e)){

        echo "<span style='color:red'>Fields can't be blank</span>";
    }
    else
    {
    

    $sql="insert into quiz values('$quizid','$qno','$question','$a','$b','$c','$d','$e');";
    $sql1="insert into quiz_score values('$quizid','$courseid',$ch);";
    if(mysqli_query($con,$sql) and mysqli_query($con,$sql1)){
       echo "<span style='color:green'>1 Question added</span><br>";
       
       }
    else
    echo "Failed to insert<br>";
  }
    ?>
 