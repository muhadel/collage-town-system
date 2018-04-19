<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include_once '../Database/database.php';
include_once '../Classes/class_user.php';
include_once '../Classes/class_student.php';
$id = $_SESSION['id'];

$student_object = new class_student;
$check_student = $student_object->check_student($_SESSION['type']);
if(!$check_student)
{
    header("Location: index.php");
}


$db = new database();
database::getInstance();


        
$data = $db->get_row("SELECT collage,national_id,city,address,parent_phone FROM `student`WHERE users_id=\"$id\"");
$_SESSION['collage'] =$data['collage'];
$_SESSION['national_id'] =$data['national_id'];
$_SESSION['city'] =$data['city'];
$_SESSION['address'] =$data['address'];
$_SESSION['parent_phone'] =$data['parent_phone'];




$name = $_SESSION['name'];
$name = ucwords($name);

$national_id = $_SESSION['national_id'];
$collage = $_SESSION['collage'];
$city = $_SESSION['city'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];
$parent_phone = $_SESSION['parent_phone'];
$email = $_SESSION['email'];

//echo $id . "-".$name;

$msg = '';
if (isset($_POST['submit'])) {

    $grade = $db->clean($_POST['grade']);

    if (!$grade ) {
        $msg = "Please fill your grade. ";
    }
 else {
     $year = date("Y");
     
        
     $student_object = new class_student;
     
     $student_object->old_student_request($grade, $year,$id);
     $msg2=1;
        
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

        <title>Old Student Request</title>
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
        <style>
            
            .select_join {
  width: 159px;
  height: 28px;

  background: url('http://s24.postimg.org/lyhytocf5/dropdown.png') no-repeat  right #FEFEFE;
  
  border: #FEFEFE 1px solid;
  border-radius: 3px;
  -webkit-box-shadow: inset 0px 0px 10px 1px #FEFEFE;
  box-shadow: inset 0px 0px 10px 1px #FEFEFE;
}
.select_join select {
  background: transparent;
  width: 170px;
  font-size:10pt;
  color:grey;

  border-radius: 4  ;
  height: 28px;
  -webkit-appearance: none;
}
        </style>


    </head>

    <body>
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
                            <h3 class="page-header"><i class="fa fa-files-o"></i> Old Student Request</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="fa fa-home"></i><a href="student_home.php">Student</a></li>
                                <li><i class="icon_document_alt"></i>Forms</li>
                                <li><i class="fa fa-files-o"></i>Old Student Request</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Form validations -->              
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Student Request
                                </header>
                                <div class="panel-body">
                                    <div class="form">

<?php
if ($msg) {
    echo ' <p  style="white-space:nowrap;color : red; font-size: 20px;">*' . $msg . '*</p>';
}
?>  

                                        <form class="form-validate form-horizontal" id="feedback_form" method="post" action="old_student_request.php">

                                            <div class="form-group ">
                                                <label  for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                                <div class="col-lg-10">
                                                    <input style="width : 30%; margin-left: 30px" class="form-control" id="cname"  minlength="8" type="text" name="name" value="<?php echo $name; ?>" disabled="disabled" />


                                                    <label style="margin-left:30%;margin-top:-4%;" for="cname" class="control-label col-lg-2">National ID <span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input style="margin-left:55%;width : 30%;margin-top:-5%;" class="form-control" id="cname" name="national_id"maxlength="14"  minlength="14" value="<?php echo $national_id; ?>"  type="text" disabled="disapled" />

                                                        <br>
                                                                                           <label style="margin-left:-20%;" for="cname" class="control-label col-lg-2">Collage<span class="required">*</span></label>
                                                                        <div class="col-lg-10">
                                                                            <input style="margin-left:0%;width : 30%;margin-top:;" class="form-control" id="cname" maxlength="11" type="email"  name="collage" value="<?php echo $collage; ?>"  disabled="disapled" />

                                                                            <br/>

                                                                            <label style="margin-left:-20%;margin-top:;" for="cname" class="control-label col-lg-2">Grade <span class="required">*</span></label>
                                                                            <div class="col-lg-10">
                                                                                <?php 
                                                                                if($msg2)
                                                                                {
                                                                                    echo "<font style=\"margin-left:5px; margin-top:0px;\" color='green'>data has been saved successfully.</font>";
                                                                                    
                                                                                }else
                                                                                {
                                                                                    echo "<font style=\"margin-left:5px; margin-top:0px;\" color='red'>Please enter your grade for the previous year.</font>";
                                                                                }
                                                                                
                                                                                ?>
                                                                                <div  class="select_join" class="col-lg-10">
                                                                                <select  style="margin-left : -13px; " name="grade">
                                                                            <option disabled selected>-- Select Grade --</option>

                                                                            <option value="excellent" <?php if ($_POST['grade'] == 'excellent') echo "selected = \"selected\""; ?>>Excellent</option>
                                                                            <option value="verygood" <?php if ($_POST['grade'] == 'verygood') echo "selected = \"selected\""; ?>>Very good</option>
                                                                            <option value="good" <?php if ($_POST['grade'] == 'good') echo "selected = \"selected\""; ?>>Good</option>
                                                                            <option value="bad" <?php if ($_POST['grade'] == 'bad') echo "selected = \"selected\""; ?>>Bad</option>
                                                                            <option value="verybad" <?php if ($_POST['grade'] == 'verybad') echo "selected = \"selected\""; ?>>Very Bad</option>

                                                                        </select></div>

                                                                                <br> 

                                                        <label style="margin-left : -25%;" for="cname" class="control-label col-lg-2">City <span class="required">*</span></label>
                                                        <div  class="select_join" class="col-lg-10">

                                                            <select style="margin-left : -15px;" name="city" disabled="disabled">



                                                                <option  selected disabled><?php echo $city;?></option>


                                                            </select>




                                                            <br>

                                                            <br>
                                                            <label style="margin-left:-80%" for="cname" class="control-label col-lg-2">Address<span class="required">*</span></label>
                                                            <input style="margin-left:-10%;width : 500%;margin-top:-5%;" class="form-control" id="cname" name="address" maxlength="100"  type="text" value="<?php echo $address; ?>"disabled="disabled" />


                                                            <br>
                                                           
                               
                                                     
                                                            <br>

                                                            <label style="margin-left:-80%;" for="cname" class="control-label col-lg-2">Phone<span class="required">*</span></label>
                                                            <div class="col-lg-10">
                                                                <input style="margin-left:-30%;width : 200%;" class="form-control" id="cname" name="phone" maxlength="11"  minlength="11"type="text" value="<?php echo $phone ?>" disabled="disabled" />



                                                                <label style="margin-left:180%;margin-top:-34px;" for="cname" class="control-label col-lg-2">ParentNum<span class="required">*</span></label>

                                                                <input style="margin-left:280%;width : 200%;margin-top:-35px;" class="form-control" id="cname" name="parent_phone" maxlength="11" minlength="11" type="text" value="<?php echo $parent_phone; ?>" disabled="disabled" />
                                                                <br>





                                                                <label style="margin-left:-140%;" for="cname" class="control-label col-lg-2">Email<span class="required">*</span></label>
                                                                <div class="col-lg-10">
                                                                    <input style="margin-left:-82%;width : 500%;" class="form-control" id="cname" name="email" maxlength="50"value="<?php echo $email; ?>" type="email" disabled="disabled" />


                                                                    <br>

                                                                   
                                                                    <div class="col-lg-10">
                                                                       
                                                                        <br><br> 

                                     
                                                                                <br><br>

                                                                                <div class="form-group">
                                                                                    <div class="col-lg-offset-2 col-lg-10">
                                                                                        <input style=" position : relative ;margin-top:-50%; margin-left : 250px;width: 3000%;"class="btn btn-primary" type="submit" name="submit">





                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        </form>


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

                                                        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

                                                        <script src="js/scripts.js"></script>    


                                                        </body>
                                                        </html>
