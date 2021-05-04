<?php session_start();
	if($_SESSION['UserID'] == ""){
		echo "Please Login!";
		exit();
	}
	include("config.php");
	if($_POST["txtPassword"] != $_POST["txtConPassword"]) {
	
		$link_address1 = 'edit_profile.php';
		echo '<script type="text/javascript">
            if(confirm("รหัสผ่านไม่ตรงกัน!")) {
                window.location="edit_profile.php"; 
            }  
            else{ window.location="edit_profile.php";  } 

        </script>';
	exit();
	}

	$strSQL = "UPDATE member SET
	 	 Password = '".trim($_POST['txtPassword'])."'
		,Name = '".trim($_POST['txtName'])."'
		,Gender = '".$_POST['ddlGender']."'
		,Email = '".trim($_POST['txtEmail'])."'
		,Telephone = '".trim($_POST['txtTelephone'])."'
		WHERE UserID = '".$_SESSION["UserID"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	if($_SESSION["Status"] == "ADMIN") {
		header("location:admin_page.php");
	}
	else {
		header("location:member.php");
}
mysqli_close($objCon);
?>
