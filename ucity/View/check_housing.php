<?php
session_start();
include_once '../Classes/class_admin.php';
include_once '../Database/database.php';
require './Email/Email_Config.php';
$admin_object = new class_admin;
$db_object = new database();

if($_POST['openform'])
{
    $admin_object->openform();
    $msg="<font size='5'color='red'>Form is opened</font>";
    
}

if($_POST['closeform'])
{
   $admin_object->closeform();
    $msg = "<font size='5' color='red'>Form is closed</font>";
}
if(isset($_POST['sendmails']))
{

    $data = $admin_object->get_emails_user_password();
    foreach ($data as $email)
    {
        $user=$email['username'];
        $pass=$email['password'];
        SendEmail($email['email'], 'ATTENTION PLEASE !', "Your login:$user"&"Your Password :$pass");
    }
    




}

if($_POST['checknewstudents'])
{
    $admin_object->check_new_students();
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>check housing</title>

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
                      <a class="" href="index.html">
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
                                                <li><i class="fa fa-hfome"></i><a href="admin_home.php">Admin</a></li>
						
						<li><i class="fa fa-square-o"></i>Check conditions</li>
					</ol>
				</div>
			</div>
              <!-- page start----------------------------------------------------------------------------------------> 
              <?php
              if($msg)
              {
                  echo $msg;
              }
              ?>
              <form action="check_housing.php" method="post">
                  <table border="1px">
                      <tr>
                          
                          <td><label style="font-size: 20px;font-family: monospace">Close registration form </label></td>
                          <td><button style="width: 100%;" type="submit" name="closeform" value="submit">close form </button></td>
                          </tr>
                      <tr>
                          
                           <td><label style="font-size: 20px;font-family: monospace">Open registration form </label></td>
                          <td><button style="width: 100%;" type="submit" name="openform" value="submit">open form </button></td>
                      
                      </tr>
                      <tr>
                          
                          <td><label style="font-size: 20px;font-family: monospace">Check for accepted new students</label></td>
                          <td><button style="width: 100%;" type="submit" name="checknewstudents" value="submit">Submit</button></td>
                      </tr>
                      
                      <tr>
                          
                          <td><label style="font-size: 20px;font-family: monospace">Send mails to new students</label></td>
                          <td><button style="width: 100%;" type="submit" name="sendmails" value="submit">Submit</button></td>
                      </tr>
                      
                  
                  </table>
                  
                  
                  
                  
                  
              </form>
              <div class="col-sm-6"style="margin-left: 500px;margin-top:-145px;">
                      <section class="panel">
                          <header class="panel-heading">
                              Striped Table
                          </header>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>collage</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                 
                              </tr>
                            
                              </tbody>
                          </table>
                      </section>
                  </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
            <div class="credits">
               
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
