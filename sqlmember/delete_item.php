<?php 
include("config.php");
$OrderID = $_GET['OrderID'];
$strSQL = "DELETE FROM orders WHERE OrderID = $OrderID";
$objQuery = mysqli_query($objCon,$strSQL);
header('location:member.php');

?>

<script type="text/javascript">
	alert('ลบรายการเสร็จสิ้น') {
		 window.location="member.php"; 
	}
</script>
