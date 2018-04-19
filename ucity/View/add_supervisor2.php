<?php
session_start();

include_once '../Database/database.php';
include_once '../Classes/class_admin.php';

$admin_object = new class_admin;
$check_admin = $admin_object->check_admin($_SESSION['type']);

//echo $_SESSION['type'];
if(!$check_admin)
{
    header("Location: index.php");
}



      $db_object= new database();
        
        $name = $db_object->clean($_POST['name']);
        $email = $db_object->clean($_POST['email']);
        $phone = $db_object->clean($_POST['phone']);
        $username = $db_object->clean($_POST['username']);
        $password = $db_object->clean($_POST['password']);
        $vpassword = $db_object->clean($_POST['vpassword']);


if($_POST['save'])
{
    if(!$_POST['name'] || !$_POST['email'] || !$_POST['phone'] || !$_POST['username'] || !$_POST['password'] || !$_POST['vpassword']){
        
        $msg="<font    size='5px' color='red'>Please fill all data</font>";
    }
    else
    {
      
        if($_POST['password']==$_POST['vpassword'])
        {
        
        
        $enc_password =  sha1($password);
        $admin_object = new class_admin;
        $admin_object->add_supervisors($name,$email,$phone,$username,$password,$enc_password);
        header("location: add_supervisor1.php");
        }
        
        else {
             $msg="<font size='5px' color='red'>invalid password,Try again</font>";
            }
        
        
    }
}

if($_POST['cancel'])
{
    header("location: add_supervisor1.php");
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

    <title>Add_supervisor</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />

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
					<h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                                <li><i  class="fa fa-files-o"></i><a href="admin_home.php">Admin</a></li>
						<li><i class="icon_document_alt"></i>Add New Supervisor</li>
						
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Form validations
                          </header>
                          <div class="panel-body">
                              
                              
                              
                              <div class="form">
                                  <!-- form hena------------------------------------>
                                  
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="add_supervisor2.php">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname"  minlength="5" type="text"value="<?php echo $name; ?>" name="name" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="email" value="<?php echo $email; ?>" name="email" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Phone</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  type="text"value="<?php echo $phone; ?>" name="phone" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="subject"  minlength="5" type="text" value="<?php echo $username; ?>" name="username"required />
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Password<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                             <input class="form-control " id="curl" type="password"  name="password" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Verify Password<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                             <input class="form-control " id="curl" type="password" name="vpassword" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" value="submit" name="save">Save</button>
                                              <button class="btn btn-default" type="submit" value="submit" name="cancel">Cancel</button>
                                              <?php
                                              if($msg)
                                                  echo $msg;
                                              ?>
                                          </div>
                                      </div>
                                  </form>
                                  <!---------------------------------------- form hena------------------------------------>
                              </div>

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
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    
    <script src="js/scripts.js"></script>    


  </body>
</html>
