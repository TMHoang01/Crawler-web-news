<?php 
    // require './database/control.php';
    // require './database/dbhelper.php';

    require 'topnews.php';
    $sql = "SELECT * from `newpaper` where 1 order by RAND() limit 5;";
    $topnews =  executeResult($sql);
?>
<!-- Begin homepage -->
<div id="main" class="container">
    <div class="top-main">

        <div class="banner">
            <div class="banner-left">
                <div class="item">
                    <div class="item-thumb">
                        <img src="<?php echo $topnews[0]['thumb'] ?>" alt="">
                    </div>
                    <div class="item-content">
                        <?php echo '<h3 class="item-title"><a href="?tin='.$topnews[0]['link'].'">'.$topnews[0]['title'].'</a></h3>'; ?>
                        <p class="item-desc"><?php echo $topnews[0]['excrept'] ?></p>
                    </div>
                </div>
            </div>

            <div class="banner-right">
                <?php
            for($i = 1; $i<5; $i++){
                echo '<div class="item">';
                    echo '<div class="item-thumb">';
                    echo     '<img src="'.$topnews[$i]['thumb'].'" alt="">';
                    echo '</div>';
                    echo '<div class="item-content">';
                        echo '<h4 class="item-title"><a href="?tin='.$topnews[$i]['link'].'">'.$topnews[$i]['title'].'</a></h4>';
                    echo '</div>';
                echo '</div>';
            }
            ?>

                <!-- <div class="item">
                <div class="item-thumb">
                    <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                </div>
                <div class="item-content">
                    <p class="item-title">Hậu trường Táo Quân 2022: Dàn diễn viên "11 tháng 5 ngày" hội ngộ ba</p>
                    
                </div>
            </div> -->

            </div>
        </div>

    </div>

    <div class="main-content">
        <div class="main-center">
            <!-- <h2>Tin mới</h2> -->
            <?php
                    $sql = "SELECT * from `newpaper` where 1 order by RAND() limit 12;";
                    $hotdata =  executeResult($sql);
                    foreach($hotdata as $item){
                        echo '<div class="item">';
                        echo '<div class="item-thumb">';
                                echo '<img src="'.$item['thumb'].'">';
                        echo '</div>';
                        echo '<div class="item-content">';
                            echo '<h3 class="item-title"><a href="?tin='.$item['link'].'">'.$item['title'].'</a></h3>';
                            echo '<p class="item-desc">'.$item['excrept'].'</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
        </div>
        <div>
            <?php top_category('/xa-hoi.htm');?>
            <?php top_category('/van-hoa.htm');?>
        </div>
    </div>

    <div class="box-cate">
        <?php top_category('/the-thao.htm');?>
        <?php top_category('/du-lich.htm');?>
        <?php top_category('/giai-tri.htm');?>
    </div>
    <div class="box-cate">
        <?php top_category('/giai-tri/thoi-trang.htm');?>
        <?php top_category('/van-hoa/dien-anh.htm');?>
        <?php top_category('/doi-song/chuyen-la.htm');?>
    </div>
</div>
<!-- End homepage -->
