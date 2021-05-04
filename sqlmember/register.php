<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>สมัครสมาชิก</title>
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
	<style>
			table {
        border-collapse: collapse;
      width: 50%;
      }
      th, td {
        text-align: center;
        padding: 8px;
      }

      tr:nth-child(even){
        background-color: #f2f2f2
      }
    th {
      background-color: #4CAF50;
      color: white;
    }
    input[type=text]:focus,input[type=password]:focus {
      background-color: lightblue;
    }
    input[type=text], select, input[type=password], select{
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=submit] {
      width: 55%;
      background-color: #4CAF50;
      color: white;
      padding: 5px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 50px;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    select {
      width: 50%;
      padding: 10px 10px;
      border: none;
      border-radius: 4px;
      background-color: white;
    }
    .Form {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 10px;
      background-image:url('bg.png');
      background-size: cover;
      background-repeat: no-repeat;
    }
    label {
      font-family: 'Asap', sans-serif;
      font-style: bold;
    }
.title-form {
  font-size: 34px;
  color: white;
  font-style: bold;
  font-family: 'Asap', sans-serif;
}
.error {color: #FF0000;}
	</style>
</head>

<body id="top">
     

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">
                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <img src="../images/logo.png" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

               

                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                     <ul class="header__nav">
                        <li><a href="../index.php" title="">หน้าแรก</a></li>
                        <li><a href="../founding.php" title="">พบเจอของหาย</a></li>
                        <li><a href="../findout.php" title="">ประกาศตามหา</a></li>
                        <li><a href="../searching.php" title="">ค้นหาของหาย</a></li>
                        <li><a href="../howtouse.php" title="">วิธีการใช้งาน</a></li>
                        <li><a href="../about.php" title="">เกี่ยวกับเรา</a></li>
                        <li><a href="../contact.php" title="">ติดต่อ</a></li>
                          <li><a href="register.php" title="">สมัครสมาชิก</a></li>
                        <li><a href="login.php" title="">เข้าสู่ระบบ</a></li> <br><br>
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
	<?php 
		include("config.php");
     // define variables and set to empty values
		$nameErr = $usernameErr = $passErr = $conpassErr = $telErr = $emailErr = "";
		$name = $username = $password = $conpassword = $passformErr = "";
		//set variable to false values
    $namechk =  $passchk = $conpasschk = $matchpasschk = $passformchk = $telchk = $emailchk = $emailformchk = 0; 
    $usernamereqchk = $usernamesqlchk =$usernameformchk = $usernamechk = $usernamelongchk = 0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if(!$namechk) {
  				if (empty($_POST["txtName"])) {
    			$nameErr = "ต้องการชื่อ-นามสกุล";
  				}
  				else {
  					$namechk = 1;
  				}	
      		}

      		if(!$usernamechk) {
  		  		if (empty($_POST["txtUsername"])) {
    				$usernameErr = "ต้องการชื่อผู้ใช้";
        	} else {
 				$usernamereqchk = 1;
          	}
        	$username = test_input($_POST["txtUsername"]);
       		if (!preg_match('/\w{8,}/', $username)) {
          		$usernameErr = "รูปแบบชื่อผู้ใช้ผิดพลาด";
        	} else {
					 $usernameformchk = 1;
		   }
        		$strSQL = "SELECT * FROM member WHERE Username = '$username' ";
				$objQuery = mysqli_query($objCon,$strSQL);
				$objResult = mysqli_fetch_array($objQuery,MYSQLI_NUM); 
			    if($objResult[1]==$username)  {
					$usernameErr = "มีชื่อผู้ใช้มีในระบบแล้ว";
				} else {
					$usernamesqlchk = 1;		
				  } 
			}

			if(!$passchk) {
				if (empty($_POST["txtPassword"])) {
    			$passErr = "ต้องการรหัสผ่าน!";
        } else {
            $passchk = 1;
          }
			}
      
      if(!$passformchk) {
        $password = test_input($_POST["txtPassword"]);
        if(!preg_match('/[0-9]{8,}/',$password)) {
        $passformErr = "รูปแบบรหัสผ่านผิดพลาด!";
      }else {
        $passformchk = 1;
       }
     } 
			if(!$conpasschk) {
				if (empty($_POST["txtPassword"])) {
    			$passErr = "ต้องการรหัสผ่าน";
                } else {
                	$conpasschk = 1;
                }
			}
   
			if(!$matchpasschk) {
				if($_POST["txtPassword"] != $_POST["txtConPassword"]) {
				$conpassErr = "รหัสผ่านไม่เหมือนกัน!";
				} else {
					$matchpasschk = 1;
				}
		    }
		if(!$telchk) {
  				if (empty($_POST["txtTel"])) {
    			$telErr = "ต้องการเบอร์โทรศํพท์!";
  				}else {
  					$telchk = 1;
  				}	
    }
		if(!$emailchk) {
  	   if (empty($_POST["txtEmail"])) {
        $emailErr = "ต้องการอีเมลล์!";
        }else {
          $emailchk = 1; 
        }
    }
    if(!$emailformchk) {
      $email = test_input($_POST["txtEmail"]);
     //check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "รูปแบบอีเมลล์ผิดพลาด!"; 
          } else { 
            $emailformchk = 1;
          }
		}
	} 
       	
	function test_input($data) {
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}

	?>
	<div class="Form">
    	<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        	<h3 class="title-form"><font color="black">สมัครสมาชิก</p></h3>
        	ชื่อผู้ใช้งาน <br>
        	<input name="txtUsername" type="text" id="txtUsername" size="20" placeholder="ตัวอักษรหรือตัวเลข อย่างน้อย 8 ตัว"> <span class="error">*<?php echo $usernameErr;?></span><br>
        	รหัสผ่าน <br>
        	<input name="txtPassword" type="password" id="txtPassword" placeholder="รหัสผ่านอย่างน้อย 8 ตัว"> 
        	<span class="error">* <?php echo $passErr;?></span><br>
        	ยืนยันรหัสผ่าน <br>
        	<input name="txtConPassword" type="password" id="txtConPassword" placeholder="ยืนยันรหัสผ่าน">
        	<span class="error">* <?php echo $conpassErr;?></span><br>
       	 	ชื่อจริง - นามสกุล <br>
     	   	<input name="txtName" type="text" id="txtName" size="35" placeholder="ชื่อ และ นามสกุล">
        	<span class="error">* <?php echo $nameErr;?></span><br>
          เบอร์โทรศัพท์ <br>
     	   	<input name="txtTel" type="text" id="txtTel" size="10" placeholder="เบอร์โทรศัพท์ตัวเลข10หลัก">
        	<span class="error">* <?php echo $telErr;?></span><br>	 
        	อีเมลล์ <br>
     	   	<input name="txtEmail" type="text" id="txtEmail" size="30" placeholder="โปรดกรอกอีเมลล์">
        	<span class="error">* <?php echo $emailErr;?></span><br>           
        	เพศ<br>
        	<select name="ddlGender"  id="ddlGender">
              <option selected="selected">เลือกเพศ</option>
            	<option value="MALE">ชาย</option>
            	<option value="FEMALE">หญิง</option>		
			   <p><input type="submit" name="submit" value="สมัครสมาชิก"></p>
			
    		</form>
			
	</div>
	<?php 


	if($usernamereqchk && $usernamesqlchk && $namechk  && $passchk && $conpasschk && $matchpasschk && $passformchk && $usernameformchk && $emailchk && $emailformchk ) { 
	$strSQL = "INSERT INTO member(Username,Password,Name,Telephone,Email,Gender,Status)
	VALUES ('".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."','".$_POST["txtEmail"]."','".$_POST["ddlGender"]."','USER')";


    ?>
   <script type="text/javascript">
           if(confirm("สมัครสมาชิกสำเร็จ")) {
                window.location="login.php"; 
            }  
            else{ window.location="register.php";  } 

        </script>

	<?php	
    $objQuery = mysqli_query($objCon,$strSQL); } ?>

  <p id="Lastmodified" style="text-align: center;"></p>
  <script type="text/javascript">
      var x = document.lastModified;
      document.getElementById("Lastmodified").innerHTML = x;
  </script>
  <?php 
        echo "<br><a href='login.php'>กลับสู่หน้าเข้าสู่ระบบ</a>";
        
  ?>



            </div>
        </div>
        
		    
    </section>

    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row narrow section-intro add-bottom text-center">
            <div class="col-twelve tab-full">

                

                <p class="lead" >ระบบพิเศษ : เมื่อของที่พบ และ ของที่หายนั้น มีความตรงกันระบบจะแจ้งเตือนไปที่ email ของทั้ง 2 ฝ่าย ให้มาเช็คว่าของที่หาตรงกับของที่พบหรือไม่</p>

            </div>
    </div>

       <?php
        include("config.php");
        $strSQL = "SELECT orders.OrderID FROM orders ORDER BY `OrderID` DESC, `UserID` DESC, `ObjectID` DESC, `LocationID` DESC";
        $objQuery = mysqli_query($objCon,$strSQL); 
        for ($x = 0; $x <= 8; $x++) {
            $OK_NAKA[$x]="";
        }
          $Zero = 0 ; 
          while($Result0 = mysqli_fetch_array($objQuery)) {    
            $OK_NAKA[$Zero] = $Result0[0]; 
            $Zero++;         
          }

   // $strSQL = "SELECT member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER')";
    $objQuery = mysqli_query($objCon,$strSQL); 
    ?>
        <div class="row top">

            <div class="col-twelve md-twelve tab-full popular">
                <h3>ประกาศล่าสุด</h3>
      
                <div class="block-1-3 block-m-full popular__posts">

                <!--  1  -->
               <?php 
               
                 $strSQL0 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[0]"; 
                 $objQuery0 = mysqli_query($objCon,$strSQL0);
                 $Result0 = mysqli_fetch_array($objQuery0); 

                 $strSQL1 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[1]"; 
                 $objQuery1 = mysqli_query($objCon,$strSQL1); 
                 $Result1 = mysqli_fetch_array($objQuery1);

                 $strSQL2 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[2]"; 
                 $objQuery2 = mysqli_query($objCon,$strSQL2); 
                 $Result2 = mysqli_fetch_array($objQuery2); 

                 $strSQL3 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[3]"; 
                 $objQuery3 = mysqli_query($objCon,$strSQL3); 
                 $Result3 = mysqli_fetch_array($objQuery3); 

                 $strSQL4 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[4]"; 
                 $objQuery4 = mysqli_query($objCon,$strSQL4); 
                 $Result4 = mysqli_fetch_array($objQuery4); 

                 $strSQL5 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[5]"; 
                 $objQuery5 = mysqli_query($objCon,$strSQL5); 
                 $Result5 = mysqli_fetch_array($objQuery5);

                     $strSQL6 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[6]"; 
                 $objQuery6 = mysqli_query($objCon,$strSQL6); 
                 $Result6 = mysqli_fetch_array($objQuery6); 

                $strSQL7 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[7]"; 
                 $objQuery7 = mysqli_query($objCon,$strSQL7); 
                 $Result7 = mysqli_fetch_array($objQuery7); 

                  $strSQL8 = "SELECT orders.OrderID,member.Username,object.ObjectName,object.image,orders.Date,orders.Status FROM orders,member,object WHERE orders.UserID = member.UserID AND orders.ObjectID = object.ObjectID AND orders.Status IN('ANNOUNCE','FIND_OWNER') AND orders.OrderID = $OK_NAKA[8]"; 
                 $objQuery8 = mysqli_query($objCon,$strSQL8); 
                 $Result8 = mysqli_fetch_array($objQuery8); 
             //รับobjectจาก db แสดงโพส

 


                 ?>
                       <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result0['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>" ><?php echo($Result0['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>">
                                    <?php echo($Result0['Username']); 
                                       ?> </a></span>
                                       <?php 
                if($Result0['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result0['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result0['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                              
                            <span class="popular__date"><span>on</span> <time><?php echo($Result0['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--2-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result1['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>" ><?php echo($Result1['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>">
                                    <?php echo($Result1['Username']); ?></a></span> 
                                                           <?php 
                if($Result1['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result1['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result1['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result1['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--3-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[2]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result2['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[2]);?>" ><?php echo($Result2['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>">
                                    <?php echo($Result2['Username']); ?></a></span> 
                                                           <?php 
                if($Result2['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result2['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result2['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result2['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--4-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result3['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>" ><?php echo($Result3['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>">
                                    <?php echo($Result3['Username']); ?></a></span> 
                                                           <?php 
                if($Result3['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result3['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result3['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result3['Date']); ?></time></span>
                        </section>
                    </article>
                   
                    <!--5-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result4['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>" ><?php echo($Result4['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>">
                                    <?php echo($Result4['Username']); ?></a></span> 
                                                           <?php 
                if($Result4['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result4['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result4['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result4['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--6-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result5['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>" ><?php echo($Result5['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>">
                                    <?php echo($Result5['Username']);  ?></a></span> 
                                                           <?php 
                if($Result5['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result5['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result5['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result5['Date']); ?></time></span>
                        </section>
                    </article>

                       <!--7-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result6['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>" ><?php echo($Result6['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>">
                                    <?php echo($Result6['Username']); ?></a></span> 
                                                           <?php 
                if($Result6['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result6['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result6['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result6['Date']); ?></time></span>
                        </section>
                    </article>

                    
                       <!--8-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result7['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>" ><?php echo($Result7['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>">
                                    <?php echo($Result7['Username']); ?></a></span> 
                                                           <?php 
                if($Result7['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result7['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result7['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result7['Date']); ?></time></span>
                        </section>
                    </article>

                     
                       <!--9-->

                    <article class="col-block popular__post">
                        <a href="member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='../images/".$Result8['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>" ><?php echo($Result8['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>">
                                    <?php echo($Result8['Username']); ?></a></span> 
                                                           <?php 
                if($Result8['Status']=="FIND_OWNER") { 
                    echo('ตามหาเจ้าของ');   
                }
                if($Result8['Status']=="FOUNDED") {
                    echo('เจอเจ้าของแล้ว');
                }
                if($Result8['Status']=="ANNOUNCE") { 
                    echo('ประกาศตามหา');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result8['Date']); ?></time></span>
                        </section>
                    </article>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
        </div> <!-- end row -->

        

    </section><!-- end s-extra --> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
 <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                  <h4>Link</h4>

                    <ul class="s-footer__linklist">
                       <li><a href="index.php" title="">หน้าแรก</a></li>
                        <li><a href="founding.php" title="">พบเจอของหาย</a></li>
                        <li><a href="findout.php" title="">ประกาศตามหา</a></li>
                        <li><a href="searching.php" title="">ค้นหาของหาย</a></li>
                        <li><a href="howtouse.php" title="">วิธีการใช้งาน</a></li>
                        <li><a href="about.php" title="">เกี่ยวกับเรา</a></li>
                        <li><a href="contact.php" title="">ติดต่อ</a></li>  
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

              

              

                <div class="col-five md-full end s-footer__subscribe">
                        
                  <h4>เกี่ยวกับเรา</h4>

                    <p>เว็บไซต์ Where is it gone ? จัดทำโดยกลุ่มนักศึกษา สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง คณะวิศวกรรมศาสตร์ สาขาวิศวกรรมสารสนเทศ เพื่อเป็นสื่อกลางในการตามหาของหายภายในคณะวิศวกรรมศาสตร์ ที่เปิดให้นักศึกษาของสถาบันได้เข้างาน
                    </p>

               

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>WHERE IS IT GONE ?</span> 
                        <span>| ENGINEERING KMITL</a></span>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
<?php mysqli_close($objCon);   ?>

    <!-- Java Script
    ================================================== -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>