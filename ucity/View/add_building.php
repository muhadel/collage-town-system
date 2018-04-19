<?php
session_start();
include_once '../Classes/class_admin.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);
$admin_object = new class_admin;
$db = new database();


$check_admin = $admin_object->check_admin($_SESSION['type']);

//echo $_SESSION['type'];
if(!$check_admin)
{
    header("Location: index.php");
}
/*if($_POST['task'])
    echo 'YES';
else
    echo 'NOO';

if($_POST['task'])
{
    if($_POST['building_num'])
    {
        $num = $_POST['building_num'];
        $query = "DELETE FROM `building` WHERE `building`.`building_num` = $num";
        echo $query;
        $db->database_query($query);
        
        echo "<font color='red'>Building deleted successfully</font>";
        
    } else {
        
        echo "<font color='red'>NOT FOUND</font>";
        
    }
}*/
if(isset($_POST['add']))
{
if(!$_POST['building_num'] || !$_POST['building_capacity'])
{
    $errormessage="<font color='green'>Please fill all data</font>";
}
else
{
    $num =$db->clean($_POST['building_num']);
    
    $capacity = $db->clean($_POST['building_capacity']);
    
    $admin_object = new class_admin();
    $check = $admin_object->add_new_building($num,$capacity);
    if($check == FALSE)
    {
        $errormessage="<font color='red'>Building is already found  ,Try again</font>";
    }
    
    if($check ==TRUE)
    {
        $errormessage="<font color='green'>Building is Added Successfully </font>";
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

    <title>add_building</title>

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
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i  class="fa fa-hom"></i><a href="admin_home.php">Admin</a></li>
						<li><i class="fa fa-table"></i>Add new building</li>
					
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
              <header class="panel-heading" style="margin-left: 20px;margin-bottom: 15px;">Add New Building</header>
                  <div class="col-sm-6">
                      
                    <form action="add_building.php" method="post">  <section class="panel" style="width: 155px; margin-left: 340px;">
                          <header class="panel-heading">
                              Building Number
                          </header>
                          <input type="Number" name="building_num">
                              <header class="panel-heading">
                              Capcity	
                          </header>
                          <input type="Number" name="building_capacity">
                        
                      </section>
                        
                  </div>
              <button   type="submit" value="submit" name="add"  style="background-color: #696969; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
                                 
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;margin-top: 30px;
    margin-right: 70px;">Add</button>
                  <?php
                  if($errormessage)
                  {
                      echo $errormessage;
                  }
                  ?>
                     </form> 
              </div>
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Buildings
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Building Number</th>
                                 <th><i class="icon_calendar"></i> Capcity</th>
                                 <th><i class="icon_mail_alt"></i> Supervisor</th>
                                 
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                           <?php
                                             echo '<a  href="#"&task=delete>h</a>';
                                   
                                   ?>
                          
                              
                                 <?php 
                                 
                                 $data = $admin_object->show_building();
                                
                                 foreach ($data as $rows)
                                 {
                                     echo '<tr><td>'.$rows['building_num'].'</td><td>'.$rows['available_place'].'<td>Mohamed Adel</td></td><td><div class="btn-group">
                                      <a class="btn btn-danger" na href="add_building.php"'.$rows['building_num']. '&task=delete\' onclick="if(confirm("Do you want to delete this building ?")) return true; else return false;" ><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td></tr>';
                                     /*echo $rows['building_num'];
                                     echo '$';
                                     echo $rows['available_place'];*/
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
