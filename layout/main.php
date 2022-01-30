<!-- BEGIN Main Cate -->
<?php
if (isset($_GET['theloai']))
    {
    $listdata = get_main($_GET['theloai']);
    }else{
        $listdata = get_main('');
    // echo var_dump($listdata);
}
?>
<div class="main-center">
                <!-- <div class="item">
                    <div class="item-thumb">
                        <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <h3 class="item-title">Ngayf nhom ha son nhom ha son nhom ha son sen tem cu re</h3>
                        <p class="item-desc">Ngày nhosm ha son nhom ha son nhom ha son sen tem cu re Ngayf nhom ha son nhom hàng son nhom ha son sen tem cu re</p>
                    </div>
                </div> -->
                <?php
                    foreach($listdata as $item){
                        if(!empty($item['thumb']) && !empty($item['excrept'])){
                            echo '<div class="item">';
                            echo '<div class="item-thumb">';
                                    echo '<img src="'.$item['thumb'].'">';
                            echo '</div>';
                            echo '<div class="item-content">';
                                echo '<h3 class="item-title">'.$item['title'].'</h3>';
                                echo '<p class="item-desc">'.$item['excrept'].'</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                
            </div>
            <div class="point-right">
                <!-- <div class="item">
                    <div class="item-thumb">
                        <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <p class="item-title"><a href=""> Ngayf nhôm ha son nhom hạ hỏa son nhom ha son sên tem cu re</a></p>
                    </div>
                </div> -->
                <?php
                    foreach($listdata as $item){
                        if(!empty($item['thumb']) && empty($item['excrept'])){
                            echo '<div class="item">';
                            echo '<div class="item-thumb">';
                                    echo '<img src="'.$item['thumb'].'">';
                            echo '</div>';
                            echo '<div class="item-content">';
                                echo '<p class="item-title"><a>'.$item['title'].'</a></p>';
                                // echo '<p class="item-desc">'.$item['excrept'].'</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>

<!-- END Main Cate -->
