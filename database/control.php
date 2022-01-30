<?php
    // require 'database/dbhelper.php';

    function get_category(){
        $sql = "SELECT * from `category` where `url_main`='' limit 100;";
        return executeResult($sql);
    }
    function get_subcate($url_main){
        $sql = "SELECT * from `category` where `url_main`='".$url_main."';";
        if(empty(executeResult($sql))){
        $sql = "SELECT * from `category` where `url_main`=( SELECT url_main from `category` where `url`='".$url_main."');";

        }
        return executeResult($sql);
    }
// echo var_dump(get_category());
    function getmain($link){
        $sql = "SELECT * from `category`,`newpaper` 
        where `category`.`id` = newpaper.id_cate AND 
        (`category`.`url`='".$link."' or `category`.`url_main`='".$link."');";
        // echo $sql;
        $result = executeResult($sql);
        if(empty($result)){
            $sql = "";
        }
        return $result;

    }
    function getmain1($link, $firstIndex, $limit){
        $sql = "SELECT * from `category`,`newpaper` 
        where `category`.`id` = newpaper.id_cate AND 
        (`category`.`url`='".$link."' or `category`.`url_main`='".$link."') limit ".$firstIndex.",".$limit.";";
        // echo $sql;
        $result = executeResult($sql);
        if(empty($result)){
            $sql = "";
        }
        return $result;

    }