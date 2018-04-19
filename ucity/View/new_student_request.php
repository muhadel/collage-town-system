<?php
session_start();

include_once '../Database/database.php';
include_once '../Classes/class_user.php';
include_once '../Classes/class_admin.php';
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
       $user_object->set_password($password);
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



$msg = '';
if (isset($_POST['submit'])) {
    

    $name = $db->clean($_POST['name']);
    $national_id = $db->clean($_POST['national_id']);
    $city = $_POST['city'];

    $address = $db->clean($_POST['address']);
    $sex = $_POST['sex'];
    $religion = $_POST['religion'];

    $y = $_POST['year'];
    $m = $_POST['month'];
    $d = $_POST['day'];

    $birth_date = $y . "-" . $m . "-" . $d;
    $phone = $db->clean($_POST['phone']);
    $parent_phone = $db->clean($_POST['parent_phone']);
    $email = $db->clean($_POST['email']);
    $highschool_grade = $db->clean($_POST['highschool_grade']);

    $filename = $_FILES['upfile']['tmp_name'];
    $actualfile_name = $_FILES['upfile']['name'];
    $size = $_FILES['upfile']['size'];
    $type = $_FILES['upfile']['type'];
    $error = $_FILES['upfile']['error'];

    if (!$name || !$national_id || !$city || !$address || !$sex || !$religion || !$birth_date || !$phone || !$parent_phone || !$email || !$highschool_grade) {
        $msg = "Please fill all data ";
        
    }

    if ($name && $national_id && $city && $address && $sex && $religion && $birth_date && $phone && $parent_phone && $email && $highschool_grade) {
        if (preg_match('/^[^A-Za-z .\-]+$/i', $name)) { //**
            //"/[^A-Za-z]/"
            $msg .= "Please Enter a correct name\n";
        }
        
        if (preg_match("/[^0-9]/", $national_id)) {
            if ($msg) {
                $msg .= " & national ID ";
            } else {
                $msg .= "Please Enter a correct national ID.\n";
            }
        }
        if (preg_match("/[^0-9]/", $phone)) {
            if ($msg) {
                $msg .= " & phone number ";
            } else {
                $msg .= "Please Enter a correct phone number.\n";
            }
        }
        if (preg_match("/[^0-9]/", $parent_phone)) {
            if ($msg) {
                $msg .= " &  a parent phone number ";
            } else {
                $msg .= "Please Enter a correct parent phone number.\n";
            }
        }
        if (preg_match("/[^0-9]/", $highschool_grade)) {
            if ($msg) {
                $msg .= " &  school grade ";
            } else {
                $msg .= "Please Enter a correct school grade.\n";
            }
        }
     
        
        /* ********** */
        if(!$msg)
        {
            $path_parts = pathinfo($actualfile_name);
        $path = "../uploads/" . $actualfile_name;
        while (file_exists($path)) {
            static $ctr = 1;
            $actualfile_name = $path_parts['filename'] . "_$ctr." . $path_parts['extension'];
            $path = "../uploads/" . $actualfile_name;
            $ctr++;
        }
        move_uploaded_file($filename, $path);
        
        
        
        //$name = $_SESSION['name'];
         $name = ucwords($name);
         
        $user_object= new Class_user();
        $check = $user_object->new_student_request($name,$national_id,$city,$address,$sex,$religion,$birth_date,$phone,$parent_phone,$email,$highschool_grade,$path);
        
        if($check == FALSE)
        {
            $msg="<font color='red'>Building is already found  ,Try again</font>";
        }
        
        if($check ==TRUE)
        {
            $msg="<font color='green'>Building is Added Successfully </font>";
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

        <title>New Student Request</title>
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
                            <span class="username">'.$_SESSION['name'].'</span>
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
                        <form class="navbar-form" action="new_student_request.php" method="post">
                             
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
                            <a class="" href="home.html">
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
                                <li><a class="" href="form_component.html">New Student Request</a></li>                          

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
                            <h3 class="page-header"><i class="fa fa-files-o"></i> New Student Request</h3>
                            
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>

                                <li><i class="icon_document_alt"></i>Forms</li>
                                <li><i class="fa fa-files-o"></i>New Student Request</li>
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

                                        <form class="form-validate form-horizontal" id="feedback_form" method="post" action="new_student_request.php" enctype="multipart/form-data">

                                            <div class="form-group ">
                                                <label  for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                                <div class="col-lg-10">
                                                    <input style="width : 30%;" class="form-control" id="cname"  minlength="8" type="text" name="name" value="<?php echo $_POST['name']; ?>" required />


                                                    <label style="margin-left:30%;margin-top:-4%;" for="cname" class="control-label col-lg-2">National ID <span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input style="margin-left:55%;width : 30%;margin-top:-5%;" class="form-control" id="cname" name="national_id"maxlength="14"  minlength="14" value="<?php echo $_POST['national_id']; ?>"  type="text" required />

                                                        <br>

                                                        <label style="margin-left : -25%;" for="cname" class="control-label col-lg-2">City <span class="required">*</span></label>
                                                        <div  class="select_join" class="col-lg-10">

                                                            <select style="margin-left : -15px;" name="city" required>



                                                                <option disabled selected>-- Select City --</option>
<?php
$cities = array("Cairo", "Alexandria", "Gizeh", "Helwan", "Shubra El-Kheima", "Port Said", "Suez", "Luxor", "al-Mansura", "El-Mahalla El-Kubra", "Tanta", "Asyut", "Ismailia", "Fayyum", "Aswan", "Damietta", "Damanhur", "Beni Suef", "Sohag", "Hurghada");

foreach ($cities as $value => $name) {
    if ($value == $_POST['city']) {
        echo "<option selected='selected' value='" . $name . "'>" . $name . "</option>";
    } else {
        echo "<option value='" . $name . "'>" . $name . "</option>";
    }
}
?>

                                                            </select>




                                                            <br>

                                                            <br>
                                                            <label style="margin-left:-80%" for="cname" class="control-label col-lg-2">Address<span class="required">*</span></label>
                                                            <input style="margin-left:-10%;width : 500%;margin-top:-5%;" class="form-control" id="cname" name="address" maxlength="100"  type="text" value="<?php echo $_POST['address']; ?>"required />


                                                            <br>
                                                            <label style="margin-left:-80%" for="cname" class="control-label col-lg-2">gender<span class="required">*</span></label>

                                                            <div   style=" width:100%" class="select_join">
                                                                <select  style="margin-left : -15px;" name="sex">
                                                                    <option disabled selected>-- Select Gender --</option>

                                                                    <option value="m" <?php if ($_POST['sex'] == 'm') echo "selected = \"selected\""; ?>>Male</option>
                                                                    <option value="f" <?php if ($_POST['sex'] == 'f') echo "selected = \"selected\""; ?>>Female</option>

                                                                </select>

                                                            </div>


                                                            <label style="margin-left:200%;margin-top:-20%" for="cname" class="control-label col-lg-2">Religion<span class="required">*</span></label>

                                                            <div   style=" width:100%; margin-left:420px;margin-top:-17%" class="select_join">
                                                                <select  style="margin-left : -15px;" name="religion">
                                                                    <option disabled selected>-- Select Religion --</option>

                                                                    <option value="m" <?php if ($_POST['religion'] == 'm') echo "selected = \"selected\""; ?>>Muslim</option>
                                                                    <option value="c" <?php if ($_POST['religion'] == 'c') echo "selected = \"selected\""; ?>>Christian</option>

                                                                </select>

                                                            </div>
                                                            <br>

                                                            <label style="margin-left:-80%;margin-top:;" for="cname" class="control-label col-lg-2">Birthday<span class="required">*</span></label>

                                                            <div   style=" width:100%;" class="select_join">
                                                                <select  style="margin-left : -15px;width:50%;background: url('http://s24.postimg.org/lyhytocf5/dropdown.png') no-repeat 50px; #FEFEFE;" name="day">
                                                                    <option disabled selected>-- day --</option>
<?php


//$day = array();
for ($i = 1; $i <= 31; $i++) {
    if ($i == $_POST['day']) {
        echo "<option selected='selected' value='" . $i . "'>" . $i . "</option>";
    } else {
        echo "<option value='" . $i . "'>" . $i . "</option>";
    }
    
}
?>
                                                                    

                                                                </select>


                                                                <select  style="margin-left : 5px;width:54%;background: url('http://s24.postimg.org/lyhytocf5/dropdown.png') no-repeat 54px; #FEFEFE;" name="month">
                                                                    <option disabled selected>-- month --</option>
<?php
$month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");

for ($i = 0; $i <= 12; $i++) {
    if ($i == $_POST['month']) {
        echo "<option selected='selected' value='" . $i . "'>" . $month[$i] . "</option>";
    } else {
        echo "<option value='" . $i . "'>" . $month[$i] . "</option>";
    }
}

   
?>

                                                                </select>


                                                                <select  style="margin-left : 170px;top:-27px;position:relative;width:51%;background: url('http://s24.postimg.org/lyhytocf5/dropdown.png') no-repeat 50px; #FEFEFE;" name="year">
                                                                    <option disabled selected>-- year --</option>
<?php
for ($i = 1990; $i <= 2017; $i++) {
    if ($i == $_POST['year']) {
        echo "<option selected='selected' value='" . $i . "'>" . $i . "</option>";
    } else {
        echo "<option value='" . $i . "'>" . $i . "</option>";
    }
}
?>

                                                                </select>


                                                            </div>
                                                            <br>

                                                            <label style="margin-left:-80%;" for="cname" class="control-label col-lg-2">Phone<span class="required">*</span></label>
                                                            <div class="col-lg-10">
                                                                <input style="margin-left:-30%;width : 200%;" class="form-control" id="cname" name="phone" maxlength="11"  minlength="11"type="text" value="<?php echo $_POST['phone']; ?>" required />



                                                                <label style="margin-left:180%;margin-top:-34px;" for="cname" class="control-label col-lg-2">ParentNum<span class="required">*</span></label>

                                                                <input style="margin-left:280%;width : 200%;margin-top:-35px;" class="form-control" id="cname" name="parent_phone" maxlength="11" minlength="11" type="text" value="<?php echo $_POST['parent_phone']; ?>" required />
                                                                <br>





                                                                <label style="margin-left:-140%;" for="cname" class="control-label col-lg-2">Email<span class="required">*</span></label>
                                                                <div class="col-lg-10">
                                                                    <input style="margin-left:-82%;width : 500%;" class="form-control" id="cname" name="email" maxlength="50"value="<?php echo $_POST['email']; ?>" type="email" required />


                                                                    <br>

                                                                    <label style="margin-left:-290%;" for="cname" class="control-label col-lg-2">High school Grade<span class="required">*</span></label>
                                                                    <div class="col-lg-10">
                                                                        <input style="margin-left:-382%;width : 375%;" class="form-control" id="cname" name="highschool_grade"maxlength="3" type="text"value="<?php echo $_POST['highschool_grade']; ?>" required />

                                                                        <br><br>
                                                                        <label style="margin-left:-170px;" for="cname" class="control-label col-lg-2">upload your college card <span class="required">*</span></label>
                                                                        <input style="margin-left:-70px;" type="file" name="upfile" value="<?php echo $_POST['name']; ?>" Required>
                                                                       <!--<input  style="margin-top: -130%; margin-left: 130px;"type="submit" name="sub" value="upload"> -->


                                                                        <br><br>

                                                                        <div class="form-group">
                                                                            <div class="col-lg-offset-2 col-lg-10">
                                                                                 <?php
                                                                                 $user_object = new Class_user;
                                                                                        $data = $user_object->checkform();
                                                                                        /*echo '<pre>';
                                                                                        print_r($data);
                                                                                        echo '</pre>';*/
                                                                                     foreach ($data as $r)
                                                                                     {
                                                                                         if($r['formkey']==1)
                                                                                                {
                                                                                                    echo '<input style=" position : relative ;margin-top:-50%; margin-left : 250px;width: 3000%;"class="btn btn-primary" type="submit" name="submit">';
                                                                                                }
                                                                                                if($r['formkey']==0)
                                                                                                {
                                                                                                    echo "<font size='5'color='red'>REGISTRATION IS CLOSED</font>";
                                                                                                }
                                                                                         
                                                                                     }
                                                                                                
                                                                                                
                                                                                                ?>
                                                                                





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
