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
$task = $_GET['task'];
$id =$_GET['id'];
if(isset($task))
{
   if($id)
   {
       $sup = $admin_object->get_supervisor_by_id($id);
       if($sup)
       {
           $q = "DELETE FROM `users` WHERE id=$id";
           $db_object = new database();
           $db_object->database_query($q);
           
           //delete
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

    <title>add_supervisor</title>
      <style>
      .button1 {
	margin-top: 90px;
	margin-left: 800px;
          margin-bottom: -120px;
  background-image: url("o2.png");
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
      </style>
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
      <!--main content start-->
      
      <section id="main-content">
          <button class="button1 col-lg-3"><a style="color:#fff;" href="add_supervisor2.php">Add New Supervisor</a></button>
          <section class="wrapper">
		  <div class="row">
              
				<div class="col-lg-12">
                    
                    
                     
                    
                    
					<h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
                    
                   
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                                <li><i  class="fa fa-hom"></i><a href="admin_home.php">Admin</a></li>
						
						<li><i class="fa fa-th-list"></i>Supervisors</li>
					</ol>
                    
				</div>
			</div>
              <!-- page start-->
            
            
            
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Full Name</th>
                                  <th><i class="icon_mail_alt"></i> Email</th>
                                  <th><i class="icon_mobile"></i> Phone</th>
                                 
                                 
                                 <th><i class="icon_pin_alt"></i> Username</th>
                                 
                                 <th><i class="icon_cogs"></i> Password</th>
                              </tr>
                              
                              <?php
                              $admin_object= new class_admin;
                              $data =$admin_object->show_supervisors();
                              
                              foreach ($data as $row)
                              {
                                  echo '<tr><td>'.$row['name'].'</td>'
                                          . '<td>'.$row['email'].'</td>'
                                          . '<td>'.$row['phone'].'</td>'
                                          .'<td>'.$row['username'].'</td>'
                                          .'<td>'.$row['password'].'</td>'
                                          .'<td>
                                  <div class="btn-group">
                                        
                                      <a class="btn btn-danger" href="add_supervisor1.php?id='. $row['id'] .'&task=delete" onclick=\"if(confirm(\'Do you really want to delete this customer?\')) return true;else return false;\"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>'
                                          . '</tr>';
                              }
                              
                              
                              ?>
                   
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
            <div class="credits">
              By <a >Software-1 Team</a>
            </div>
        </div>
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
