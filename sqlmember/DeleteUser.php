<!DOCTYPE html>
<html>
<body>
  <?php 
  include("config.php");
  $strSQL = "DELETE FROM member ";
  $strSQL .="WHERE UserID ='".$_GET["UserID"]."' ";
  $objQuery = mysqli_query($objCon,$strSQL);
  if($objQuery){
  	echo "Record delete.";
  }
  else
  {
  	echo "Error delete [".$strSQL."]";
  }
  $link_address1 = 'manage_user.php';
  	echo "<p>";
  	echo "<a href='$link_address1'>Go back to mange user page</a>";
  mysqli_close($objCon); 
?>
</body>
</html>