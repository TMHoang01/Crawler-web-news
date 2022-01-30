<?php 
    require('database/dbhelper.php');
    require("database/control.php");


    include 'layout/header.php';

    if(empty($_GET)){
        include 'layout/home.php';
    }else{
        // echo 'mama';
        if(!empty($_GET['theloai'])){
            include( 'layout/category.php');
        }else if(!empty($_GET['tin'])){
            include( 'layout/news.php');
        }else if(!empty($_GET['timkiem'])){
            include( 'layout/search.php');
        }
    }


    include 'layout/footer.php';


?>
