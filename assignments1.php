
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style >
 body{
         background-color: #f3f5f8;
      }

 .container{
  width: 600px;
  border:1px solid black;
 }
 .container .row{
  margin:2px;
 }
  </style>
 

</head>

<body >
  
 <script>
$(document).ready(function(){
  $("#sub").click(function(){
    $.post($("#form1").attr("action"),
    {
      ch: $("#ch").val(),
      qno: $("#qno").val(),
      question:$("#question").val(),
      a: $("#a").val(),
      b: $("#b").val(),
      c: $("#c").val(),
      d: $("#d").val(),
      ans: $("#ans").val()
    },
    function(data){
     $("#div1").html(data);
    });
  });
  $("#form1").submit(function(){return false;});
 
});
</script>
 
  <div id="Faculty">
  <div class="container">
    <br>
    <center>Make Quiz</center>
    <br>
  </div>  
  <div class="container" >
    <form action="assign.php" method="post"  id="form1">
      <div class="form-group">
  <label for="sel1">Select chapter:</label>
  <select class="form-control" id="ch" name="ch" style="width:50%">
    <option name="ch1" value="1">chapter1</option>
    <option name="ch2" value="2">chapter2</option>
    <option name="ch3" value="3">chapter3</option>
    <option name="ch4" value="4">chapter4</option>
    <option name="ch5" value="5">chapter5</option>
  </select>

  <?php 
 
  
echo'</div>
    <div class="form-group row">
  <div class="col-xs-2">
    <label for="ex1">Q.no:</label>
    <input class="form-control" id="qno" name="qno" type="text">
  </div>
  <br><br><br>
    <div class="form-group">
     <textarea class="form-control" rows="2" name="question" id="question" style="width:95%"></textarea>
    </div>
    <div class="form-group row">
  <div class="col-xs-2">
    <label for="ex1">A</label>
    <input class="form-control" id="a" name="a" type="text">
  </div>
  
  <div class="col-xs-2">
    <label for="ex1">B</label>
    <input class="form-control" id="b" name="b" type="text">
  </div>
  
  <div class="col-xs-2">
    <label for="ex1">C</label>
    <input class="form-control" id="c" name="c" type="text">
  </div>
 
  <div class="col-xs-2">
    <label for="ex1">D</label>
    <input class="form-control" id="d" name="d" type="text">
  </div>
   
  <div class="col-xs-2">
    <label for="ex1">Answer</label>
    <input class="form-control" id="ans" name="ans" type="text">
  </div>
  </div>
     <div class="form-group row">
     <div class="col-xs-2">
  <button type="button" id="sub" class="btn btn-success" align="center">Add Question to Quiz</button>
  </div>
  <div><p id="div1" class="col-xs-12"></p></div>
  </div>
    ';
 
  

  ?>
  
  </div>
  </div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>


</body>


</html>
