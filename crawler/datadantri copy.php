<?php
require '../database/dbhelper.php';

function get_content($link){
    $link1="https://dantri.com.vn".$link ; //$link là một URL bài viết bất kỳ
    $crawler=file_get_contents("$link1"); 
    $pattern = '/<article class="article-item">(.*?)<\/article>/si';
    
    preg_match_all($pattern , $crawler, $matches);
    if(!empty($matches[0]) ){
        $count=0;
        $listdata[$count]['link']= $listdata[$count]['title'] = $listdata[$count]['thumb'] =$listdata[$count]['excrept'] = null;
        foreach($matches[0] as $items){
        preg_match('/<h3 class="article-title">.*?href="(.*?)">(.*?)<\/a> <\/h3>/is',$items,$data);
        if(!empty($data[1])) $listdata[$count]['link'] = $data[1] ;
        if(!empty($data[2])) $listdata[$count]['title'] = $data[2] ;
        
        $data = null;
        preg_match('/<div class="article-excerpt">.*?href="(.*?)">(.*?)<\/a> <\/div>/is',$items,$data);
        // if(!empty($data[1])) $listdata[$count]['link'] = $data[1] ;
        if(!empty($data[2])) $listdata[$count]['excrept'] = $data[2] ;

        $data = null;
        preg_match('/<img.*?src="(https.*?)".*?>/is',$items,$data);
        // if(!empty($data[1])) $listdata[$count]['title'] = $data[1] ;
        if(!empty($data[1])) $listdata[$count]['thumb'] = $data[1] ;
        // echo var_dump($data).'<br/>';
        // if(!empty($data[1]))
        $count++;
        }
    }
    return $listdata;
}


function crawl_category($link){
    $crawler=file_get_contents("$link"); 
    echo $link; 
    $pattern = '/<nav class="menu container bg-wrap">.*?<\/ol> <div class="nf-sidebar">/si';
    $pattern = '/<ol class="nf-menu">.*?<\/ol> <div class="nf-sidebar/si';
    preg_match($pattern , $crawler, $matches);
    if(!empty($matches[0]) ){
        preg_match_all('/<li> <a href="(.*?)">(.*?)<\/a>/is',$matches[0],$datas);

        $n = count($datas[1]);
        for($i = 0; $i < $n; $i++){
            $result = strpos($datas[1][$i], "/", 1);
            $datas[1][$i] = str_replace('https://dantri.com.vn','',$datas[1][$i]);

            $result = strpos($datas[1][$i], "/", 1);
            if(empty($result)){
                import_category($datas[2][$i], $datas[1][$i], '');
                $catemain= $datas[1][$i];
            }else{
                import_category($datas[2][$i], $datas[1][$i], $catemain);
            };
        }

    }
    
}
crawl_category('https://dantri.com.vn');





// ************************************************************* //
//                       Vung nho cua trang
// ************************************************************* //

function crawl_data($link) {
    $link1="https://dantri.com.vn".$link ; //$link là một URL bài viết bất kỳ
    $crawler=file_get_contents("$link1"); 
    preg_match('/<article class="article article-three large">.*?<\/article>.<div class="row pagination">/is',$crawler,$area);
    // print_r($area);
    $pattern = '/<article class="article-item">(.*?)<\/article>/si';
    preg_match_all($pattern , $area[0], $matches);
    if(!empty($matches[0]) ){
        $count=0;
        $listdata[$count]['link']= $listdata[$count]['title'] = $listdata[$count]['thumb'] =$listdata[$count]['excrept'] = null;
        foreach($matches[0] as $items){
        preg_match('/<h3 class="article-title">.*?href="(.*?)">(.*?)<\/a> <\/h3>/is',$items,$data);
        if(!empty($data[1])) $listdata[$count]['link'] = $data[1] ;
        if(!empty($data[2])) $listdata[$count]['title'] = $data[2] ;
        
        $data = null;
        preg_match('/<div class="article-excerpt">.*?href="(.*?)">(.*?)<\/a> <\/div>/is',$items,$data);
        if(!empty($data[2])) $listdata[$count]['excrept'] = $data[2] ;

        $data = null;
        preg_match('/<img.*?src="(https.*?)".*?>/is',$items,$data);
        // if(!empty($data[1])) $listdata[$count]['title'] = $data[1] ;
        if(!empty($data[1])) $listdata[$count]['thumb'] = $data[1] ;
        $count++;
        }
    }
    return $listdata;
}

function crwaler_news() {
    $sql = "select * from `category` where url_main != '' ;";
    $listcate = executeResult($sql);
    foreach($listcate as $cate){
        echo $cate['url']."<br/>";

        for($i = 1; $i < 5 ;$i++){
            $datas = crawl_data($cate['url']);
            foreach($datas as $new){
                // import_new($new['title'], $new['link'], $new['thumb'], $new['excrept'], $cate['id']);
            }
        }
    }
}
set_time_limit(0);

$start_time = microtime(true);

crwaler_news();
$end_time = microtime(true);
$execution_time = ($end_time - $start_time);
echo " Execution time of script = ".$execution_time." sec<br/>";
    



// // Starting clock time in seconds
// $start_time = microtime(true);

// crwal_allnews();
// // ---crwal_allnews();
// // ---import_new('$new[]', "new['link']", 'new[thumb]', 'new[excret', 2);


// // End clock time in seconds
// $end_time = microtime(true);
  
// // Calculate script execution time
// $execution_time = ($end_time - $start_time);
// echo " Execution time of script = ".$execution_time." sec";




// ************************************************************* //
function crawl_datas_bfs($link,$paper = 10){
    
    if($paper ==0){
        return;
    }
    static $datas = array();; 
    $datas = crawl_data(str_replace('.htm', '/trang-'.$paper.'.htm' ,$link));
    crawl_datas_bfs($link,$paper -1) ;
    return $datas;
}

function crwal_allnews(){
    $sql = "select `url`,`id` from `category` where url_main != '' ;";
    // echo $sql."<br/>";
    $listcate = executeResult($sql);
    // print_r($listcate);

    foreach($listcate as $cate){
        $listnews =crawl_datas_bfs($cate['url'], 5);
        foreach($listnews as $new){
            import_new($new['title'], $new['link'], $new['thumb'], $new['excrept'], $cate['id']);
        }
    }


}


?>


