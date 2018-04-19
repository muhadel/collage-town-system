<?php
session_start();
include_once '../Database/database.php';
include_once '../Classes/class_user.php';
$errormessage ="";
$db = new database();
database::getInstance();

if(isset($_POST['lgnbtn']))
{
    $username =$db->clean($_POST['username']);
    $password = $db->clean($_POST['password']);
   
   /*if(is_numeric($username)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }*/
    if(!$_POST['username'] || !$_POST['password'])
    {
        $errormessage="<font color='red'>Please enter your username or password</font>";
    }
   else
   {
       
       $encpassword= sha1($_POST['password']);
       
       $user_object=new Class_user;
       $user_object->set_username($username);
       //$user_object->set_password($password);
       $user_object->set_encpassword($encpassword);
       $return_value = $user_object->login();
       //session_start();
       
       $user_id=$user_object->get_id();
       
       
        if($return_value){
            
             $user_object=new Class_user($user_id);
             
             $_SESSION['id']=$user_id;
             //echo 'LOL';
             $_SESSION['username']=$user_object->get_username();
             $_SESSION['password']=$user_object->get_password();
             $_SESSION['name']=$user_object->name;
             $_SESSION['phone']=$user_object->phone;
             $_SESSION['email']=$user_object->email;
             $_SESSION['type']=$user_object->get_user_type();
             
             
             $type_user =$user_object->get_user_type();
             if($type_user==1){ //admin_home
                    header("location: admin_home.php");
                    exit();
             }
              if($type_user==2){ //student_home
                    header("location: student_home.php");
                    exit();
             }
             if($type_user==3){ //supervisor_home
                    header("location: supervisor_home.php");
                    exit();
             }

       }   
       else{
           echo $return_value;
             $errormessage="<font color='red'>Invalid username or password,Try again</font>";

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

    <title>Home Page-v2</title>
      <link href="adelstyle.css" type="text/css" rel="stylesheet">

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


  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <?php
if ((isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['type']))) {

    echo '<header class="header dark-bg">
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
      </header>      ';
} else {
    echo ' <header class="header dark-bg">
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
          
          <!----------------------------------- DOLA -------------->
          
          <div id="tit">
          
            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form" action="isahome.php" method="post">
                             
                             <label  style="margin-left:60px; width:10%;"class="uz">USERNAME</label>
                            <input class="form-control"  style="background: white url(\'a1.png\') no-repeat 3px;"placeholder="Username" type="text" name="username">
                            <label>PASSWORD</label>
                            <input class="form-control" style="background: white url(\'k1.png\') no-repeat 3px;"placeholder="Password" type="password" name="password">
                            <input class="lgn" type="submit" value="LOGIN" name="lgnbtn">
                            
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>
          
          </div>
           
         
        
        
      </header>';
}

?>
      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="#">
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
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
		  <div class="row">
                    
				<div class="col-lg-12">
                                      <?php echo '<p style="color:red;font-size:20px; position:relative;margin-left:60%; margin-top:-0px;margin-bottom:-30px;">'.$errormessage.'&nbsp;</p>';?>
					<h3 class="page-header"><i class="fa fa-files-o"></i>HOME PAGE</h3>
                                        
                                        
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                                /*hena */
                                                <?php 
                                                       if($type_user==1){ //admin_home
                                                           echo '<li><i class="fa fa-home"></i><a href="admin_home.php">Admin</a></li>';
                                                }
                                                 if($type_user==2){ //student_home
                                                     echo '<li><i class="fa fa-home"></i><a href="student_home.php">Student</a></li>';
                                                }
                                                if($type_user==3){ //supervisor_home
                                                       echo '<li><i class="fa fa-home"></i><a href="supervisor_home.php">Supervisor</a></li>';
                                                }

                                                               ?>

						
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <img src="pic2.jpg" width="100%" height="290px;">
              <br><br><br>
              <h1>Instructions</h1>
              <p class="p1" >Some of the procedures that must be followed by students to apply in university cities for the academic year 2016/2017 are as follows:<br>
1 - Must be the student / student, whether old / old cut off / old on the website Login to the link Application for admission to university cities during the application deadline, as the site will not accept any application for admission after the scheduled dates.<br>

2- After the student / student has completed his / her statements on the website, he / she will print the electronic application to be a notice stating that he has entered his data on the website.<br>

3 - Then the student / student (Old - Old Mntqt - Old) to download and print the paper application form of the same site after entering the link to the instructions and presentation and select the University of Alexandria from the list and click on the display instructions.<br>

4- The applicant / old student (excellent - very good - good) shall go to the competent committee to review his paper data and review his electronic data as he will not allow the student to purchase the envelope of residence until after reviewing his paper and electronic data during the period , and applications submitted after that period will not be considered.<br>

5- The new student / student (high school graduate) shall go to the competent committee to review his paper and electronic data.<br>

6- Old Thread Tools Old <br>

A - Application: The employee responsible for receiving their forms in the Office of Student Affairs to review the paper data (a copy of the student's national ID and his guardian is asked to apply for the electronic application card, which is distributed in the university city), during the period from , and applications submitted after that period will not be considered.<br>
B- Students: The application is submitted electronically only. In case of announcing their admission to the university cities, the student shall go to the competent committee to review its papers and data electronically within 10 days from the date of the announcement of acceptance.<br>
7- The student / student (the second course - Summer course - the remote areas of Alexandria - Term IX) shall be in the period for the competent committee to review its paper and electronic data provided that their admission to university cities Later.<br>

</p>
              
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
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    


  </body>
</html>
