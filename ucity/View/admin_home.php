<?php
session_start();
include_once '../Classes/class_admin.php';
$admin_object = new class_admin;
$check_admin = $admin_object->check_admin($_SESSION['type']);

//echo $_SESSION['type'];
if(!$check_admin)
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
  background-image: url("o1.png");
    background-repeat: no-repeat;
    background-position: left; 
  padding: 19px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #696969;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button1:hover {background-color: #787878}

.button1:active {
  background-color: #787878;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button2 {
	background-image: url("o2.png");
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
  background-color: #878787;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button2:hover {background-color: #787878}

.button2:active {
  background-color: #787878;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button3 {
	margin-top: 25px;
	margin-left: 50px;
  background-image: url("o3.png");
    background-repeat: no-repeat;
    background-position: left; 
  padding: 19px 35px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #969696;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button3:hover {background-color: #787878}

.button3:active {
  background-color: #787878;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button4 {
 background-image: url("o4.png");
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
  background-color: #B4B4B4;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button4:hover {background-color: #787878}

.button4:active {
  background-color: #787878;
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
  background-color: #D2D2D2;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button5:hover {background-color: #787878}

.button5:active {
  background-color: #787878;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button6 {
	 background-image: url("o6.png");
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
  background-color: #E1E1E1;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button6:hover {background-color: #787878}

.button6:active {
  background-color: #787878;
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

    <title>Admin_home</title>

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
                            <span class="username">Admin</span>
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
  <section id="container" class="">
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
                          <li><a class="" href="new_student_request.php">New Student Request</a></li>
                          <!--<li><a class="" href="old_student_request.php">Old Student Request</a></li> -->
                      </ul>
                  </li>  
                  <li>
                      <a class="" href="add_building.php">
                          <i class="icon_table"></i>
                          <span>ADD Building</span>
                      </a>
                  </li>
                  <li class="sub-menu ">
                      <a href="add_supervisor.html" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Add Supervisor</span>
                          
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="show_student.html" class="">
                          <i class="icon_desktop"></i>
                          <span>Show Students</span>
                         
                      </a>
                     
                  </li>
                  
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Show Statistics</span>
                          
                      </a>
                                         
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Set Announcement</span>
                          
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
						<li><i class="fa fa-bars"></i>Pages</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
<div class="row"><button class="button1 col-lg-3"><a style="color:#fff;" href="add_building.php">Add Building</a></button>
<button class="button2 col-lg-3"><a style="color:#fff;" href="add_supervisor1.php">Add Supervisor</a></button>
<button class="button3 col-lg-3"><a style="color:#fff;" href="show_student.php">Show Students</a></button></div>
<div class="row"><button class="button4 col-lg-3"><a style="color:#fff;" href="show_stat.php">Show statistics</a></button>
    
<button class="button5 col-lg-3"><a style="color:#fff;" href="set_announcement.php">Set Announcement</a></button>
<button class="button6 col-lg-3"><a style="color:#fff;" href="check_housing.php">Check Housing</a></button></div>
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
