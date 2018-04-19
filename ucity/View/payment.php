<?php
session_start();
include_once '../Database/database.php';
include_once '../Classes/class_student.php';



$student_object = new class_student;
$check_student = $student_object->check_student($_SESSION['type']);
if(!$check_student)
{
    header("Location: index.php");
}


$msg = '';
if(isset($_POST['pay']))
{
    $db = new database();
    
    $card_name = $db->clean($_POST['card_name']);
    $card_num = $db->clean($_POST['card_num']);
    $card_password = $db->clean($_POST['card_password']);

    if(!$card_name || !$card_num || !$card_password)
    {
        $msg = "<font  size='5' style=\"margin-left:5px; margin-top:0px;\" color='red'>Please fill all data.</font>";
    }
 else {
     if (preg_match("/[^0-9]/", $card_num)) {
         
                $msg = "<font  size='5' style=\"margin-left:5px; margin-top:0px;\" color='red'>Please Enter a correct card number</font>";
               
            }
    if (preg_match('/^[^A-Za-z .\-]+$/i', $card_name)) {
         
        if($msg)
        {
            $msg .= "<font  size='5' style=\"margin-left:5px; margin-top:0px;\" color='red'> & card name.</font>";
 
        }else
        {
            $msg = "<font  size='5' style=\"margin-left:5px; margin-top:0px;\" color='red'>Please Enter a correct card name.</font>";
 
        }
        }
            if(!$msg)
            {
                $encpassword = sha1($card_password);
                
                $month = date('m');
                
                $id_student = $_SESSION['id'];
                
                
                $student_object = new class_student;
                $student_object->payment($card_name, $card_num, $encpassword,$month,$id_student);
        
                $msg = "<font  size='5' style=\"margin-left:5px; margin-top:0px;\" color='green'>Transaction has been successfully</font>";
        
                
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

    <title>payment</title>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
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
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
                                                <li><i class="fa fa-hme"></i><a href="student_home.php">Student</a></li>
						
						<li><i class="fa fa-square-o"></i>Payment</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <?php
          echo $msg;
          ?>
              <div class="container" style="width: 300px;">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      
      <form action="payment.php" method="post">
          <div class="form-group">
              
              <label for="PaymentAmount">Payment amount</label>
              <div class="amount-placeholder">
                  <span>200</span>
                  <span>EGP</span>
              </div>
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" class="form-control" type="text" maxlength="50" name="card_name" value="<?php echo $card_name; ?>"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" class="null card-image form-control" type="text" minlength="16" maxlength="16"  name="card_num" value="<?php echo $card_num; ?>"></input>
          </div>
         
          <div class="zip-code-group form-group">
              <label for="ZIPCode">Security Code</label>
              <div class="input-container">
                  <input id="ZIPCode" class="form-control" type="password" maxlength="8" name="card_password" value="<?php echo $card_password; ?>"></input>
                  
              </div>
          </div>
          <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit" value="submit" name="pay">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Pay 200 EGP</span>
          </button>
         
      </form>
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
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
        <script src="js/index.js"></script>


  </body>
</html>
