<html>
<body>
<?php 
  include("config.php");
  $strSQL = "SELECT * FROM member,orders WHERE orders.UserID = member.UserID ";
  $objQuery = mysqli_query($objCon,$strSQL);
?>
<table width="600" border="1">
  <tr>
	<th width="91"> <div align="center">OrderID </div></th>  
    <th width="91"> <div align="center">UserId</div></th>
    <th width="98"> <div align="center">Username </div></th>
    <th width="97"> <div align="center">Name </div></th>
    <th width="59"> <div align="center">Status </div></th>
    <th width="30"> <div align="center">Edit </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery)) { 
?>
        <tr>
		<td><div align="center"><?php echo $objResult["OrderID"]; ?> </div></td>
          <td><div align="center"><?php echo $objResult["UserID"]; ?> </div></td>
           <td><?php echo $objResult["Username"]; ?></td>
           <td><?php echo $objResult["Name"]; ?></td>
          <td><?php echo $objResult["Status"]; ?></td>
           <td align="center"><a href="DeleteUser.php?UserID=<?php echo $objResult["UserID"];?>">Delete</a></td>
           </tr>
<?php
  }
?>
</table>
<?php
  echo "<br><a href='admin_page.php'>Go back to Admin page</a>";
  mysqli_close($objCon); 
?>
</body>
  </html>