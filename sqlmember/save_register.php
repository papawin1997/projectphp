<?php
include("config.php");
$username = $_POST["txtUsername"];
if (preg_match('/ITE_6/', $username)) {
	echo strlen($username);
	if (strlen($username) >15) {
		echo "username too long.";
		$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit(); }
} else {
echo "Wrong username format.";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit();
}
if(trim($_POST["txtUsername"]) == "")
{
echo "Please input Username!";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit();
}
if(trim($_POST["txtPassword"]) == "")
{
echo "Please input Password!";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit();
}
if($_POST["txtPassword"] != $_POST["txtConPassword"]) {
echo "Password not Match!";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit();
}
if(trim($_POST["txtName"]) == "")
{
echo "Please input Name!";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
exit();
}
$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult)  {
echo "Username already exists!";
$link_address1 = 'register.php';
echo "<p>";
echo "<a href='$link_address1'>Go back to Register page</a>";
}


else {
$strSQL = "INSERT INTO member (Username,Password,Name,Status) VALUES ('".$_POST["txtUsername"]."',
'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["ddlStatus"]."')";
$objQuery = mysqli_query($objCon,$strSQL);
echo "Register Completed!<br>";
echo "<br> Go to <a href='login.php'>Login page</a>";
}
mysqli_close($objCon);
?>