<div id="main" class="container">

    <?php
    // require("../datadantri.php");
    // require("../control.php");

    if (isset($_GET['theloai'])){
        $link = $_GET['theloai'];
        $sql = "SELECT * from `category` where `url`= $link";
        $listcate = get_category();
            
        $sql = "SELECT * from `category` where `url`= '".$link."';" ;
        // echo $sql."<br/>";
        $title = executeSingleResult($sql);
        if(!empty($title['url_main'])){
            $sql = "SELECT * from `category` where `url`= '".$title['url_main']."';" ;
            $title = executeSingleResult($sql);
        }
        // ten bao
        echo '<h1><a href="?theloai='.$title['url'].'">';
        echo ''.$title['name'].'';
        echo '</a></h1>';
?>

    <div id="content">
        <div class="sidebar">
            <ul>
                <li><a href="">Đời sống</a></li>
                <!-- <li><a href="">Chính trị</a></li> -->
                <?php

                foreach(get_subcate($_GET['theloai']) as $cate){
                        // echo $sub['url']."<br/>";
                    echo '<li><a href="?theloai='.$cate['url'].'" >'.$cate['name'].'</a></li>';
                }
                ?>
            </ul>

        </div>
        <?php include 'content.php';?>


        <?php }else{
        include 'home.php';
    }
?>

    </div>
</div>
</div>

<script type="text/javascript" >

</script>

