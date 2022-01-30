<!-- BEGIN news -->
<?php 
if(!empty($_GET['tin'])){
    $link = 'https://dantri.com.vn/'.$_GET['tin'];
    $crawler=file_get_contents("$link"); 
    $crawler = str_replace('src="/', 'src="https://dantri.com.vn/' ,$crawler  );
    preg_match('/<article class="singular-container">.*?<\/article>/is',$crawler,$area);

}
    echo '<div id="main" class="container">';
        echo $area[0].'</div>';
    
?>
<!-- END news -->
