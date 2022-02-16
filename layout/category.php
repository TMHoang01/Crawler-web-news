<!-- BEGIN category -->
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
        $namecate = $title['name'];
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
                <!-- <li><a href="">Đời sống</a></li> -->
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
            let title = document.getElementsByClassName('sidebar');
            console.log(title);
            let catesub = title[0].getElementsByTagName('a');
            console.log(catesub);
            for(var j = 0; j < catesub.length; j++) {
                if(catesub[j].innerHTML == '<?php echo $namecate ?>'){
                    catesub[j].style.color= "#b80f14";
                    // console.log(namecates[0]);
                    break;
                }
            }

</script>

<!-- END category -->
