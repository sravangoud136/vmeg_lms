
<?php     
$to_email = 'sravangoud136@gmail.com';
$subject = 'Vardhaman LMS';
$message = 'D.sravan goud posted a material on vardhaman LMS, you can go through the content ';
$headers = 'From:Vardhaman.lms@gmail.com';
if(mail($to_email,$subject,$message,$headers))
  echo "<center><div><img src='ok-256.jpg' width='20' height='20'></div><h2 style='color:green;font-family:verdana'>Notified through E-mail</h2></center>";
else
  echo "Failed to send";
?>