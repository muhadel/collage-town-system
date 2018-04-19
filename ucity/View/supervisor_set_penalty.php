<?php 
session_start();

include_once '../Database/database.php';
include_once '../Classes/class_supervisor.php';
$db = new database();
$supervisor_object = new class_supervisor;

//echo $_session['id'];

//$admin_object = new class_admin;
//$check_admin = $admin_object->check_admin($_SESSION['type']);

//echo $_SESSION['type'];
//de hatt4aal
/*if(!$check_admin)
{
    header("Location: index.php");
}*/

//echo $ann;

if($_POST['btn'])
{
    if(!$_POST['penalty'])
    {
        
        $msg ="<font color='red'>Please Enter your penalty</font>";
        
        
    }else
    {
        $penalty=$db->clean($_POST['penalty']);
        $date = date("Y-m-d");
        $supervisor_id = $_SESSION['id'];
        if($_POST['room_num']&&$_POST['student_name'])
        {
            $msg ="<font color='red'>Please Enter your penalty</font>";
        }
        if(!$msg)
        {
                if($_POST['room_num'])
            {
                $supervisor_object->set_penalty_room($room_num, $penalty, $date, $supervisor_id);
                $msg ="<font color='green'>Room penalty is added Sucessfully</font>";    
            }
            
            
            if($_POST['student_name'])
            {
                $supervisor_object->set_penalty_student($student_name, $penalty, $date, $supervisor_id);
                $msg ="<font color='green'>Student penalty is added Sucessfully</font>";    
            }
        
        }
 
    }
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

    <title>set announcement</title>

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
                          <li><a class="" href="old_student_request.html">Old Student Request</a></li>
                      </ul>
                  </li>  
                  <li>
                      <a class="" href="add_building.php">
                          <i class="icon_table"></i>
                          <span>ADD Building</span>
                      </a>
                  </li>
                  <li class="sub-menu ">
                      <a href="add_supervisor1.php" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Add Supervisor</span>
                          
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="show_student.php" class="">
                          <i class="icon_desktop"></i>
                          <span>Show Students</span>
                         
                      </a>
                     
                  </li>
                  
                  <li>                     
                      <a class="" href="show_stat.php">
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
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                                <li><i class="f"></i><a href="supervisor_home.php">Supervisor</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Set Annoncement
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="supervisor_set_penalty.php">
                                      <div class="form-group ">
                                          <label>Room Num</label>
                                          <input type="text" name="room_num">
                                          
                                          <label>Student Name</label>
                                          <input type="text" name="student_name">
                                          
                                          <label style="margin-top:50px;"for="cname" class="control-label col-lg-2">Penalty<span class="required">*</span></label>
                                          <div class="col-lg-10" style="height: 300px;">
                                              
                                              <textarea  wrap="on" style="outline: none;resize: none;border-style: inset;margin-top:50px;" rows="9" cols="90" name="penalty" value=""></textarea>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" value="Submit" name="btn">Submit</button>
                                              <?php
                                              
                                              if($msg)
                                                  echo $msg;
                                              ?>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                         
                          </div>
                      </section>
                  </div>
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
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
 
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    


  </body>
</html>
