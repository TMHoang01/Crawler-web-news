<?php 
require_once('define.php');

// them, sua, xoa 
function execute($sql){
    // mo ket noi

    $conn = mysqli_connect(HOST,USERNAME, PASSWORD,DATABASE);
    mysqli_set_charset($conn,'utf8');

    //querry
    mysqli_query($conn,$sql);

    //dong ket noi
    mysqli_close($conn);
}

// querry lay du lieu ra
function executeResult($sql){
    $data = null;

    // mo ket noi
    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn,'utf8');

    //querry
    $resultset = mysqli_query($conn,$sql);
    
    $data = [];
    while(($row = mysqli_fetch_array($resultset,1)) != null){
        $data[] = $row;
        
    }

    //dong ket noi
    mysqli_close($conn);
    return $data;
}

function executeSingleResult($sql){
    // $data = null;

    // mo ket noi
    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn,'utf8');

    //querry
    $resultset = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultset,1);
    
    //dong ket noi
    mysqli_close($conn);
    return $row;
}

function createData(){
    $file_content = file('database.sql');
    $query = "";
    foreach($file_content as $sql_line){
        if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
            $query .= $sql_line;
            if (substr(rtrim($query), -1) == ';'){
                echo $query.'<br/>';
                $result = execute($query);
                $query = "";
            }
        }
    }
}
// createData();

function import_category($name, $url, $url_main){
    $sql = 'INSERT INTO `category` (`name`, `url`, `url_main`)
    VALUES ("'.$name.'", "'.$url.'", "'.$url_main.'");';
    // echo $sql."<br/>";
    execute($sql);
}

function freedata(){
    // $sql =  'DELETE FROM `category`;';
    // execute($sql);
    $sql =  'DELETE FROM `newpaper`;';
    execute($sql);

}
// import_category('Xahpo','gpps//se .new.htmlem','htttp://saw/effa');
// freedata();

function import_new($title, $link, $thumb, $excrept, $id_cate){
    $sql = 'INSERT INTO `newpaper` (`title`, `link`, `thumb`, `excrept`, `id_cate`)
    VALUES ("'.$title.'", "'.$link.'", "'.$thumb.'", "'.$excrept.'", "'.$id_cate.'");';
    // echo $sql."<br/>";
    execute($sql);
}

// function import_new($title, $link, $thumb, $excrept, $id_cate){
//     $sql = 'INSERT INTO `subcategory` (`title`, `link`, `thumb`, `excrept`, `id_cate`)
//     VALUES ("'.$title.'", "'.$link.'", "'.$thumb.'", "'.$excrept.'", "'.$id_cate.'");';
//     // echo $sql;
//     execute($sql);
// } 781 707 376