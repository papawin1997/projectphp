<?php 
	session_start();
	$UserID = $_SESSION['UserID'];
	echo($UserID);
	$str0 = "SELECT Email FROM member WHERE UserID = $UserID";
	$objQuery0 = mysqli_query($objCon,$str0);
    $objResult0 = mysqli_fetch_array($objQuery0);
    $Email0 =  $objResult0['Email'];
    echo($Email0);
 	$str = "SELECT OrderID,Status,orders.ObjectID,object.ObjectName,location.LocationName,orders.LocationID FROM orders,location,object WHERE orders.UserID = $UserID AND orders.ObjectID = object.ObjectID AND orders.LocationID = location.LocationID AND orders.ObjectID = object.ObjectID";
 	$objQuery = mysqli_query($objCon,$str);
    $objResult = mysqli_fetch_array($objQuery);
    $Status = $objResult['Status'];  // Announe
    $ObjectID = $objResult['ObjectID']; // 
    $ObjectName = $objResult['ObjectName']; 
    $LocationName = $objResult['LocationName'];
    $LocationID = $objResult['LocationID'];
    echo($Status);
    echo($ObjectID);
    echo($ObjectName);
    echo($LocationName);
    echo($LocationID);

    $str1 = "SELECT ObjectID FROM object WHERE ObjectName LIKE '%$ObjectName%' AND ObjectID <> $ObjectID ";  //301
    $objQuery1 = mysqli_query($objCon,$str1);
    $objResult1 = mysqli_fetch_array($objQuery1); // ObjcetID = 301 
    $ObjectID5 = $objResult1['ObjectID'];
    echo($ObjectID5);
    $str2  = "SELECT orders.OrderID,member.Username,orders.UserID,object.ObjectName,location.LocationName,orders.Date,orders.Status FROM orders,location,object,member WHERE orders.ObjectID = $ObjectID5 AND orders.LocationID = location.LocationID AND orders.LocationID = $LocationID AND orders.Status = 'FIND_OWNER' AND orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID";
    $objQuery2 = mysqli_query($objCon,$str2);
    $objResult2 = mysqli_fetch_array($objQuery2);
    $UserID1 = $objResult2['UserID'];
    echo($UserID1);
    $str3  = "SELECT Email FROM member WHERE UserID = $UserID1";
    $objQuery3 = mysqli_query($objCon,$str3);
    $objResult3 = mysqli_fetch_array($objQuery3);
    $Email = $objResult3['Email'];
    echo($Email); //EMAIL คนที่จะส่งไป 
    //send to email 
    $OrderID1 = $objResult2['OrderID'];
    $Username1 =  $objResult2['Username'];
	$ObjectName1 = $objResult2['ObjectName'];
	$LocationName1 = $objResult2['LocationName'];
	$Date1  = $objResult2['Date'];
	$strTo = "$Email";
	$strSubject = "Where is it gone?";
	$strHeader = "From: $Email0";
	$strMessage = "เรียนคุณ  $Username1 รายการหมายเลข $OrderID1 | $ObjectName1 ที่คุณได้ลงไว้เมื่อวันที่ $Date1 ได้มีสมาชิกหมายเลขไอดี $UserID คาดว่ารายการหมายเลข $OrderID1 อาจจะเป็นของเขา
	และต้องการจะติดต่อกับคุณ";
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend){
		echo "Email Sending.";
	}else{
		echo "Email Can Not Send.";
}
?>