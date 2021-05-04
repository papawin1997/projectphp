<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
 	<meta charset="utf-8">
    <title>Founding</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- script
    ================================================== -->
    <script src="../js/modernizr.js"></script>
    <script src="../js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
     <link rel="shortcut icon" href="../ico.ico" type="image/x-icon">
    <link rel="icon" href="../ico.ico" type="image/x-icon">
</head>
<body>
<?php
	session_start();
	if($_SESSION['UserID'] == ""){
		echo "Please Login!";
		exit();
	}
    include("config.php");
    $tobeObjID = $_GET['OrderID'] ; 
    $tobeNewName = $_POST['txtObject'];
 $strSQL = "UPDATE orders,object  SET LocationID='".$_POST['txtLocation']."' , object.CataID='".$_POST['txtCata']."'
    ,object.ObjectName ='".$_POST['txtObject']."' , orders.Date = '".$_POST['Date']."'
     WHERE OrderID = '".$tobeObjID."'AND orders.ObjectID = object.ObjectID ";
 	$objQuery = mysqli_query($objCon,$strSQL);
    
    
    
    
    mysqli_close($objCon); 
    
?>
    <script text="text/javascript">
        alert("บันทกข้อมูลสำเร็จ")
        window.location="member.php"
    </script>
    <!-- Java Script
    ================================================== -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    
</body>
</html>

เร็จ")
        window.location="member.php"
    </script>
    <!-- Java Script
    ================================================== -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    
</body>
</html>

