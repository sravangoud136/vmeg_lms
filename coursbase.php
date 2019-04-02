<html lang="en" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
  <style>
  .navBardemoBasicUsage md-content .ext-content {
  padding: 50px;
  margin: 20px;
  background-color: #FFF2E0; 
  display: block;
}
 a{
   text-decoration:none;
   display:block;
  }
  </style>
</head>
<body>
<?php include('edit_profile_template.php');
$id=$_GET['id'];
$cid=$_GET['cid'];
$cname=$_GET['cname'];
 $sql="select f.fname,f.fid from faculty f,teach t where t.cid='$cid' and t.fid=f.fid ;";
 $q=mysqli_query($con,$sql);
 $r=mysqli_fetch_assoc($q);
 $fname=$r['fname'];
 $fac=$r['fid'];
 $_SESSION['fac']=$fac;
 $_SESSION['cid']=$cid;
 $_SESSION['fname']=$fname;
 echo "<center><div style='color:#ffffff font-family:verdana'><h2>".$cname."</h2>";
 echo "<h5><span class='glyphicon glyphicon-education'></span>Mr.".$fname."</h5>";
 echo "</div></center>";
  echo"<a href='profile.php' style='color:white'> <span class='glyphicon glyphicon-chevron-left'></span>Back to courses</a></div>";
 echo"</nav>";
?>

<div ng-app="MyApp" ng-cloak>
 
  <md-content class="md-padding">
<!--<div layout="row" layout-align="center" flex="98">-->
    <md-nav-bar
      md-no-ink-bar="disableInkBar"
      md-selected-nav-item="currentNavItem"
      nav-bar-aria-label="navigation links">
      <md-nav-item md-nav-click="goto('page1')" name="page1">
     <li><a href="<?php echo $assign ?>" target="frame" style='text-decoration: none' >ASSIGNMENTS</a></li>
      </md-nav-item>
      <md-nav-item md-nav-click="goto('page2')" name="page2" >
     <a href="<?php echo $material ?>" target="frame"  style='text-decoration: none'>MATERIALS</a>
      </md-nav-item>
      <md-nav-item md-nav-click="goto('page3')" name="page3" style="display:block">
        <a href="message.php" target="frame"  style='text-decoration: none;'>CONVERSATIONS</a>
      </md-nav-item>
      <md-nav-item md-nav-click="goto('page4')" name="page4">
        <a href="reports.php" target="frame"  style='text-decoration: none;display:block'><?php if($_SESSION['type']=='Faculty') echo" REPORTS";?></a>
      </md-nav-item>
      <md-nav-item md-nav-click="goto('page5')" name="page5" flex=200>
       <a href="grpmsgview.php" target="frame" style='text-decoration: none;display:block'> <?php if($_SESSION['type']=='Faculty') echo"Group message <span class='glyphicon glyphicon-edit'></span>"; else echo "PUBLIC";?></a>
     </md-nav-item>
      </md-nav-bar>
     
  </div>
    <!--<span>{{status}}</span>
    <div class="ext-content">
      External content for `<span>{{currentNavItem}}</span>`.
    </div>-->
  </md-content>
  
    <div style="border:1px">
    <iframe   src="welcome.html" id="frame" name="frame"></iframe>  
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.js"></script>
  
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    
    /**
     * You must include the dependency on 'ngMaterial' 
     */
    angular.module('MyApp', ['ngMaterial', 'ngMessages']);
  </script>
  </div>
 <footer class="container-fluid bg-4 text-center">
  <p>A Learning platform by<a href="www.vardhaman.org">www.vardhaman.org</a></p>
 </footer>

</body>
</html>
