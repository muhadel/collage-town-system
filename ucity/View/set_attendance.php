<?php
session_start();
include_once '../Classes/class_supervisor.php';

$supervisor_id = $_SESSION['id'];
//echo $supervisor_id;


if(!$_SESSION['task'])
{
    echo $_SESSION['task'];
}
$_SESSION['task']=$_GET['task'];
$task = $_SESSION['task'];
         
$_SESSION['id_sent']=$_GET['id'];
$id_sent =$_SESSION['id_sent'];
echo $task.$id_sent;


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

        <title>Set_attendance</title>

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

     
        <style >
            .switch {
                position: relative;
                display: inline-block;
                width: 45px;
                height: 24px;
            }

            .switch input {display:none;}

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 20px;
                width: 16px;

                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
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
                                <li><a class="" href="form_component.html">Form Elements</a></li>                          
                                <li><a class="" href="form_validation.html">Form Validation</a></li>
                            </ul>
                        </li>       
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>UI Fitures</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="general.html">Components</a></li>
                                <li><a class="" href="buttons.html">Buttons</a></li>
                                <li><a class="" href="grids.html">Grids</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="widgets.html">
                                <i class="icon_genius"></i>
                                <span>Widgets</span>
                            </a>
                        </li>
                        <li>                     
                            <a class="" href="chart-chartjs.html">
                                <i class="icon_piechart"></i>
                                <span>Charts</span>

                            </a>

                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_table"></i>
                                <span>Tables</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="active" href="basic_table.html">Basic Table</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_documents_alt"></i>
                                <span>Pages</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">                          
                                <li><a class="" href="profile.html">Profile</a></li>
                                <li><a class="" href="login.html"><span>Login Page</span></a></li>
                                <li><a class="" href="blank.html">Blank Page</a></li>
                                <li><a class="" href="404.html">404 Error</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                <li><i  class="fa fa-hom"></i><a href="supervisor_home.php">Supervisor</a></li>

                                <li><i class="fa fa-th-list"></i>Show Students</li>
                            </ol>
                        </div>
                    </div>
                    <!-- page start-->
                                        

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    building Num 
                                    <?php
                                    $supervisor_object = new class_supervisor;
                                    $building_num = $supervisor_object->supervisor_building($supervisor_id);
                                    /*
                                      echo '<pre>';
                                      print_r($building_num);
                                      echo '</pre>';
                                     */
                                    echo $building_num[0]['building_num'];
                                    ?>
                                </header>


                                <table class="table table-striped table-advance table-hover">
                                    <tbody>
                                        <tr>
                                            <th><i class="icon_cogs"></i> Room Num</th>
                                            <th><i class="icon_profile"></i> Student 1</th>
                                            <th><i class="icon_profile"></i> Student 2</th>
                                            <th><i class="icon_profile"></i> Student 3</th>

                                            <!-- <th><i class="icon_profile"></i>Punishment</th> -->

                                        </tr>

                                    <form action="set_attendance.php" method="get">                                     
                                        <input type="date" name="date"> 
                                        <input type="submit" value="Submit" name="send_attendance">
                                        <?php
                                        //$data = $supervisor_object->show_students_by_room(101);
                                        



                                        for ($i = 101; $i <= 103; $i++) {

                                            //$data = $supervisor_object->show_students_by_room(403);
                                            $data = $supervisor_object->show_students_by_room($i);

                                            /* echo '<tr><td>'.$i.'</td>'
                                              . '<td>'.$data[0]['name'].'</td>'
                                              . '<td>'.$data[1]['name'].'</td>'
                                              . '<td>'.$data[2]['name'].'</td>'
                                              . '</tr>'; */

                                            echo' 
                                                <tr><td>' . $i . '</td><td style="max-width: 170px;"> <a href="#">' . $data[0]['name'] . '</a><div style="float: right;"><div style="float: right;">
                                                
                                                <label class="switch"><label class="switch" style="margin-left : -130px;margin-top:20px; ">

                                                        
                                                <input type="checkbox">    
                                                <div class="slider round"></div>  

                                                <a style=" margin-left:-170px;margin-top:15px;color : blue; text-decoration: underline;" href="#penalty"><a href="?id='.$data[0]['id'].'&task=sp">Set Penalties</a></a>
                                                    <p style="margin-left : -70px; margin-top :-18px;">Attendance</p>
                                                        
                                                </label></div></td>
                                                


<td style="max-width: 170px;"> <a href="#">' . $data[1]['name'] . '</a><div style="float: right;"><div style="float: right;">
                                                
                                                <label class="switch"><label class="switch" style="margin-left : -130px;margin-top:20px; ">

                                                        
                                                <input type="checkbox">    
                                                <div class="slider round"></div>  

                                                <a style=" margin-left:-170px;margin-top:15px;color : blue; text-decoration: underline;" href="#penalty"><a href="?id='.$data[0]['id'].'&task=sp">Set Penalties</a></a>
                                                    <p style="margin-left : -70px; margin-top :-18px;">Attendance</p>
                                                        
                                                </label></div></td>

                                                    
                                               

<td style="max-width: 170px;"> <a href="#">' . $data[2]['name'] . '</a><div style="float: right;"><div style="float: right;">
                                                
                                                <label class="switch"><label class="switch" style="margin-left : -130px;margin-top:20px; ">

                                                        
                                                <input type="checkbox">    
                                                <div class="slider round"></div>  

                                                <a style=" margin-left:-170px;margin-top:15px;color : blue; text-decoration: underline;" href="#penalty"><a href="?id='.$data[0]['id'].'&task=sp">Set Penalties</a></a>
                                                    <p style="margin-left : -70px; margin-top :-18px;">Attendance</p>
                                                        
                                                </label></div></td>
                                                
                                                

                                        </tr>';
                                        }
                                       
                                        ?>
                                    </form>

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
