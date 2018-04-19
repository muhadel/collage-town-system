<?php
session_start();
if(isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type'])){
    session_unset();
    session_destroy();
    header("Location: http://localhost/ucity/View/");
    }
