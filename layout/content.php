<?php
    //phan trang
    $limit = 12;
    $page = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    if($page <= 0){
        $page = 1;
    }
    $firstIndex = ($page - 1)*$limit;

    
    if (isset($_GET['theloai'])) {
        $link = $_GET['theloai'];
        $listdata = getmain1($_GET['theloai'], $firstIndex, $limit);
    }else{
        $listdata = getmain('');
    // echo var_dump($listdata);
    }
    // $listcate = get_category();
    // $sql = "SELECT * from `coupon` where 1 ORDER BY id_cp desc limit ".$firstIndex.",".$limit;
    // $coupon = executeResult($sql);
    // echo $listdata;
    $count = count(getmain($_GET['theloai']));
    $numberPages = ceil($count/$limit);
    //------
?>

            <div class="main-center">
                <!-- <div class="item">
                    <div class="item-thumb">
                        <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><?php //echo $count ?></h3>
                        <p class="item-desc"><?php //echo $numberPages ?></p>
                    </div>
                </div> -->
                <?php
                    foreach($listdata as $item){
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

                <?php 
                // echo '<div class="item">';
                    if($numberPages > 1){
                        echo '<ul class="pagination">';
                        if($page > 1){
                            echo '<li class="page-item"><a class="page-link" href="?theloai='.$link.'&page='.($page-1).'">Trước</a></li>';
                        }      
                        $showPages = [1, $page-1, $page, $page+1, $numberPages];
                        $isFirst = $isLast = false;
                        for($i = 1; $i <= $numberPages; $i++){
                            if(!in_array($i, $showPages) && ($numberPages > 6)) {
                                if(!$isFirst && $page > 3){
                                    echo '<li class="page-item "><a class="page-link" href="?theloai='.$link.'&page='.($page-2).'">...</a></li>';
                                    $isFirst = true;
                                }
                                if(!$isLast && ($i-1 > $page)){
                                    echo '<li class="page-item "><a class="page-link" href="?theloai='.$link.'&page='.($page+2).'">...</a></li>';
                                    $isLast = true;
                                }
                                continue;
                            
                            }
                            if($page == $i){
                                echo '<li class="page-item active"><a class="page-link" href="?theloai='.$link.'&page='.$i.'">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?theloai='.$link.'&page='.$i.'">'.$i.'</a></li>';
                        }
                        }
                        if($page < $numberPages){
                            echo '<li class="page-item"><a class="page-link" href="?theloai='.$link.'&page='.($page+1).'">Sau</a></li>';
                        }
                        echo '</ul>';
                    }
                    // echo '</div>';

                ?>
                
            </div>
            <div class="bar-right"> 
            <div class="point-right">
                <h2>Tiêu điểm</h2>
                <!-- <div class="item">
                    <div class="item-thumb">
                        <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <p class="item-title"><a href=""> Ngayf nhôm ha son nhom hạ hỏa son nhom ha son sên tem cu re</a></p>
                    </div>
                </div> -->
                <?php
                    $sql = "SELECT * from `category`,`newpaper` 
                    where `category`.`id` = newpaper.id_cate AND 
                    (`category`.`url`='".$link."' or `category`.`url_main`='".$link."') order by RAND(`newpaper`.`id`) limit 5;";
                    // echo $sql;
                    $point = executeResult($sql);
                    // echo "<br/>".var_dump($point);
                    foreach($point as $item){
                        echo '<div class="item">';
                        echo '<div class="item-thumb">';
                            echo '<img src="'.$item['thumb'].'">';
                        echo '</div>';
                        echo '<div class="item-content">';
                            echo '<p class="item-title"><a href="?tin='.$item['link'].'">'.$item['title'].'</a></p>';
                            // echo '<p class="item-desc">'.$item['excrept'].'</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
            </div>