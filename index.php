<?php   session_start();   
		error_reporting(E_ALL ^ E_NOTICE);  
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>WHERE IS IT GONE </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="ico.ico" type="image/x-icon">
    <link rel="icon" href="ico.ico" type="image/x-icon">

</head>

<body id="top">
   	<?php         
   		include("config.php");
        $strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
        $objQuery = mysqli_query($objCon,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);
	?>
    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader--home">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->
                

             <!-- end header__social -->

       <!-- sadsadsa -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>
      <ul class="header__nav">
                        <li><a href="index.php" title="">?????????????????????</a></li>
                        <li><a href="founding.php" title="">?????????????????????????????????</a></li>
                        <li><a href="findout.php" title="">?????????????????????????????????</a></li>
                        <li><a href="searching.php" title="">?????????????????????????????????</a></li>
                        <li><a href="howtouse.php" title="">???????????????????????????????????????</a></li>
                        <li><a href="about.php" title="">????????????????????????????????????</a></li>
                        <li><a href="contact.php" title="">??????????????????</a></li>
                            <?php  if($_SESSION['UserID'] == ""){ ?>
                            <li><a href="sqlmember/register.php" title="">?????????????????????????????????</a></li>
                            <li><a href="sqlmember/login.php" title="">?????????????????????????????????</a></li> 
                        <?php } ?>
                        <?php  if($_SESSION['UserID'] != ""){ ?>
                        <p align="right"> Username : <?php echo $objResult["Username"]; ?> | 
                            <a href="sqlmember/member.php"style="color:wite;" ><strong>????????????????????????????????????</strong></a> |  
                            <a href="sqlmember/logout.php" style="color:wite;"><strong>??????????????????????????????</strong></a> 
                        </p> 
                        <?php } ?>
                    </ul> <!-- end header__nav -->
                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->


        <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('images/banner.jpg');">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">KMITL</a></span>

                                <h1><a href="#0" title="">"???????????????????????????????????????????????????????????????" <br>Where is it gone?</a></h1>

                                <div class="entry__info">
                                   
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url('images/31.jpg');">
                            
                            <div class="entry__content">                     
                                <h1><a href="findout.php" title="">?????????????????????????????????</a></h1>
                                <div class="entry__info">
                                    <a href="finding.html" class="entry__profile-pic">
                                        <img class="avatar" src="images/banner.jpg" alt="">
                                    </a>                            
                                </div>
                            </div> <!-- end entry__content -->                         
                        </div> <!-- end entry -->

                        <div class="entry" style="background-image:url('images/32.jpg');">
                            <div class="entry__content">       
                                <h1><a href="founding.php" title="">????????????????????????</a></h1>

                                <div class="entry__info">
                                    <a href="founding.html" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->
    </section> <!-- end s-pageheader -->


     


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row narrow section-intro add-bottom text-center">
            <div class="col-twelve tab-full">

                

                <p class="lead" >??????????????????????????? : ??????????????????????????????????????? ????????? ??????????????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????????????? email ????????????????????? 2 ???????????? ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>

            </div>
    </div>

       <?php
   
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

    $objQuery = mysqli_query($objCon,$strSQL); 
    ?>
        <div class="row top">

            <div class="col-twelve md-four tab-full popular">
                <h3>????????????????????????????????????</h3>
      
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
             //?????????object????????? db ?????????????????????

 


                 ?>

                  
                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result0['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>" ><?php echo($Result0['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[0]);?>">
                                    <?php echo($Result0['Username']); 
                                       ?> </a></span>
                                       <?php 
                if($Result0['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result0['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result0['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                              
                            <span class="popular__date"><span>on</span> <time><?php echo($Result0['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--2-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result1['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>" ><?php echo($Result1['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>">
                                    <?php echo($Result1['Username']); ?></a></span> 
                                                           <?php 
                if($Result1['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result1['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result1['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result1['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--3-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[2]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result2['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[2]);?>" ><?php echo($Result2['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[1]);?>">
                                    <?php echo($Result2['Username']); ?></a></span> 
                                                           <?php 
                if($Result2['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result2['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result2['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result2['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--4-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result3['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>" ><?php echo($Result3['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[3]);?>">
                                    <?php echo($Result3['Username']); ?></a></span> 
                                                           <?php 
                if($Result3['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result3['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result3['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result3['Date']); ?></time></span>
                        </section>
                    </article>
                   
                    <!--5-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result4['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>" ><?php echo($Result4['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[4]);?>">
                                    <?php echo($Result4['Username']); ?></a></span> 
                                                           <?php 
                if($Result4['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result4['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result4['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result4['Date']); ?></time></span>
                        </section>
                    </article>

                    <!--6-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result5['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>" ><?php echo($Result5['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[5]);?>">
                                    <?php echo($Result5['Username']);  ?></a></span> 
                                                           <?php 
                if($Result5['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result5['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result5['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result5['Date']); ?></time></span>
                        </section>
                    </article>

                       <!--7-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result6['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>" ><?php echo($Result6['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[6]);?>">
                                    <?php echo($Result6['Username']); ?></a></span> 
                                                           <?php 
                if($Result6['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result6['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result6['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result6['Date']); ?></time></span>
                        </section>
                    </article>

                    
                       <!--8-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result7['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>" ><?php echo($Result7['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[7]);?>">
                                    <?php echo($Result7['Username']); ?></a></span> 
                                                           <?php 
                if($Result7['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result7['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result7['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result7['Date']); ?></time></span>
                        </section>
                    </article>

                     
                       <!--9-->

                    <article class="col-block popular__post">
                        <a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>"class="popular__thumb">
                          <!--  <img src="images/thumbs/small/wheel-150.jpg" alt=""> -->
                            <?php
                            echo "<div id='img_div'>";
                            echo "<img src='images/".$Result8['image']." ' >";
                            echo "</div>";
                            ?>
                        </a>
                        <h5><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>" ><?php echo($Result8['ObjectName']); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span><a href="sqlmember/member_order.php?OrderID=<?php echo($OK_NAKA[8]);?>">
                                    <?php echo($Result8['Username']); ?></a></span> 
                                                           <?php 
                if($Result8['Status']=="FIND_OWNER") { 
                    echo('????????????????????????????????????');   
                }
                if($Result8['Status']=="FOUNDED") {
                    echo('??????????????????????????????????????????');
                }
                if($Result8['Status']=="ANNOUNCE") { 
                    echo('?????????????????????????????????');
                }
            ?><br>
                            <span class="popular__date"><span>on</span> <time><?php echo($Result8['Date']); ?></time></span>
                        </section>
                    </article>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
        </div> <!-- end row -->

        

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
 <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                  <h4>Link</h4>

                    <ul class="s-footer__linklist">
                       <li><a href="index.php" title="">?????????????????????</a></li>
                        <li><a href="founding.php" title="">?????????????????????????????????</a></li>
                        <li><a href="findout.php" title="">?????????????????????????????????</a></li>
                        <li><a href="searching.php" title="">?????????????????????????????????</a></li>
                        <li><a href="howtouse.php" title="">???????????????????????????????????????</a></li>
                        <li><a href="about.php" title="">????????????????????????????????????</a></li>
                        <li><a href="contact.php" title="">??????????????????</a></li>  
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

              

              

                <div class="col-five md-full end s-footer__subscribe">
                        
                  <h4>????????????????????????????????????</h4>

                    <p>???????????????????????? Where is it gone ? ??????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ??????????????????????????????????????????????????? ???????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????????????????????????????
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>