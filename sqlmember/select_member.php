<?php
$sql = "SELECT UserID,Username,Name,Telephone,Email,Gender,Status FORM member WHERE UserID ='$UserID'";
$record=mysqli_fetch_array($result);
$UserID = $record[0];
$Username =  $record[1];
$Name = $record[3];
$Telephone = $record[4];
$Email = $record[5];
$Gender = $record[6];
$Status = $record[7];
?>
