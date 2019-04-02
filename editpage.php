<?php include('getdetails.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="container">
    <h1>Edit Profile  </h1>
  	<hr>
    <form class="form-horizontal" role="form" method='post' action='update.php' enctype="multipart/form-data">
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <?php echo"<img src='pictures/$pic' width='150' height='150'  class='img-circle' >"?>
          <h6>Upload a different photo...</h6>
           <input type="file" class="form-control" name="image">
                  </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info" id='errmsg'>
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">X</a> 
          <i class="fa fa-coffee"></i>
          Please <strong>Fill</strong> out  all the fields
        </div>
        <h3>Personal info</h3>
        
        
         

          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $fn ?>" name="firstname">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $ln ?>" name="lastname">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Roll No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $id ?>" name="id">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $em ?>" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mobile No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $mob ?>" name="mobile">
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?php echo $x ?>" name='fname'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="<?php echo $y ?>" name='pwd1'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="<?php echo $y ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes" name="save">
              <span></span>
              <a href="profile.php"><button class="btn btn-info" style="color:white">cancel</button></a></div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>