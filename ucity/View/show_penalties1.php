<?php 
session_start();
include_once '../Classes/class_user.php';
include_once '../Classes/class_student.php';
$user_object = new Class_user;
$id = $_SESSION['id'];



$student_object = new class_student;
$check_student = $student_object->check_student($_SESSION['type']);
if(!$check_student)
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  .row{
  	  }
.button1 {
	margin-top: 25px;
	margin-left: 50px;
  background-image: url("s1.png");
    background-repeat: no-repeat;
    background-position: left; 
  padding: 19px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #007296;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button1:hover {background-color: #1F9DBB}

.button1:active {
  background-color: #1F9DBB;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button2 {
	background-image: url("s2.png");
    background-repeat: no-repeat;
    background-position: left; 
	margin-top: 25px;
	margin-left: 50px;
  padding: 19px 35px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #22607C;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button2:hover {background-color: #3992B1}

.button2:active {
  background-color: #3992B1;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button3 {
	margin-top: 25px;
	margin-left: 50px;
  background-image: url("s3.png");
    background-repeat: no-repeat;
    background-position: left; 
  padding: 19px 35px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #31596A;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button3:hover {background-color: #4D8BA0}

.button3:active {
  background-color: #4D8BA0;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button4 {
 background-image: url("s4.png");
    background-repeat: no-repeat;
    background-position: left; 
	margin-top: 50px;
	margin-left: 50px;
    padding: 19px 35px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #236386;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button4:hover {background-color: #4392B6}

.button4:active {
  background-color: #4392B6;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button5 {
	 background-image: url("o5.png");
    background-repeat: no-repeat;
    background-position: left; 
	margin-top: 50px;
	margin-left: 50px;
  
  padding: 19px 20px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #1F9DBB;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button5:hover {background-color: #67BDD5}

.button5:active {
  background-color: #67BDD5;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button6 {
	 background-image: url("s6.png");
    background-repeat: no-repeat;
    background-position: left; 
	margin-top: 50px;
	margin-left: 50px;
  
  padding: 19px 35px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #3992B1;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button6:hover {background-color: #77B7D3}

.button6:active {
  background-color: #77B7D3;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>student_home</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
    <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">U<span class="lite">City</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                   
                   
                   
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="profile1.png">
                            </span>
                            <?php
                            $name = $_SESSION['name'];
                            $name = ucwords($name);
                            ?>
                            <span class="username"><?php echo $name; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            
                            
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
     
  </section>
 
      <!--header start-->
      
           
     
      <!--header end-->

      <!--sidebar start-->
      <aside>
                <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="old_student_request.php">Old Student Request</a></li>                          
                          
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="" href="downloadpdf.php">
                          <i class="icon_desktop"></i>
                          <span>Check Acceptance</span>
                          
                      </a>
                      
                  </li>
                  <li>
                      <a class="" href="show_attendance.php">
                          <i class="icon_genius"></i>
                          <span>See Attendance</span>
                      </a>
                  </li>
                  
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>See penalties</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Student Penalties</a></li>
                          <li><a class="" href="basic_table.html">Room Penalties</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu ">
                      <a href="javascript:;" class="" href="show_announcements.php">
                          <i class="icon_documents_alt"></i>
                          <span>See Announcements</span>
                          
                      </a>
                    
                  </li>
                  <li>                     
                      <a class="" href="payment.php">
                          <i class="icon_piechart"></i>
                          <span>payment</span>
                          
                      </a>
                                         
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
     
      </aside>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                                <li><i class="fa fa-hme"></i><a href="student_home.php">student</a></li>
                                                
						<li><i class="fa fa-bars"></i>Pages</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              

              
              
              <div class="row"><button class="button4 col-lg-3"><a style="color:#fff;" href="show_student_penalties.php">Student Penalties</a></button>
                  <div class="row"><button class="button4 col-lg-3"><a style="color:#fff;" href="show_room_penalties.php">Room Penalties</a></button>
    
   
              
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
            <div class="credits">
                <br><br><br><br><br><br><br><br><br><br>
               By <a >Software-1 Team</a>
            </div>
        </div>
      
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
