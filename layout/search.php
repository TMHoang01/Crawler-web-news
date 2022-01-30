<!-- BeGIN search -->
<?php
    // require 'database/dbhelper.php';
    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		// $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		// $str = preg_replace("/( )/", '-', $str);
		return $str;
	}


    //phan trang
    $limit = 12;
    $page = 1;
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }
    if($page <= 0){
        $page = 1;
    }
    $firstIndex = ($page - 1)*$limit;

    $listdata = array();
    $count = 0;
    if(!empty($_GET['timkiem'])){

        $key = mb_strtolower(($_GET['timkiem']));
        $key = preg_replace('/\s+/', ' ', $key); // loại bỏ khoảng trắng thừa
        $key = trim($key, ' '); // loại bỏ khoảng trắng trước và sau ký tự

        $sql = "SELECT * from `newpaper` where `title` like '%".$key."%' group BY link";
        $count = count(executeResult($sql));
        // echo $key
        $sql = "SELECT * from `newpaper` where `title` like '%".$key."%' group BY link limit ".$firstIndex.",".$limit.";";
        // echo "<br/>".$sql."<br/>";
        $listdata= executeResult($sql);
        
    }else{
        
    }

    // $count = count($listdata);
    $numberPages = ceil($count/$limit);
    
    ?>
<div class="container" id="main">
    <div class="search-content container">
        <div class="search">
            <form  method="get" >
                <input type="text" placeholder="Tìm kiếm..." class="search-box"  name="timkiem" />
                <h2><?php if(!empty($key)){
                                echo 'Có '.$count.' kết quả tìm kiếm'; 
                        }else{
                                echo 'Nhập từ tìm kiếm';
                            }
                    ?> 
                </h2>
                <!-- <select name="cate" id=""></select> -->
                <button   button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
                    <div class="main-center">
                <!-- <div class="item">
                    <div class="item-thumb">
                        <img src="https://icdn.dantri.com.vn/thumb_w/770/2022/01/17/thongbaocachly-1-1642430399871.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><?php echo $count ?></h3>
                        <p class="item-desc"><?php echo $numberPages ?></p>
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
                            echo '<li class="page-item"><a class="page-link" href="?timkiem='.$key.'&trang='.($page-1).'">Trước</a></li>';
                        }      
                        $showPages = [1, $page-1, $page, $page+1, $numberPages];
                        $isFirst = $isLast = false;
                        for($i = 1; $i <= $numberPages; $i++){
                            if(!in_array($i, $showPages) && ($numberPages > 6)) {
                                if(!$isFirst && $page > 3){
                                    echo '<li class="page-item "><a class="page-link" href="?timkiem='.$key.'&trang='.($page-2).'">...</a></li>';
                                    $isFirst = true;
                                }
                                if(!$isLast && ($i-1 > $page)){
                                    echo '<li class="page-item "><a class="page-link" href="?timkiem='.$key.'&trang='.($page+2).'">...</a></li>';
                                    $isLast = true;
                                }
                                continue;
                            }
                            if($page == $i){
                                echo '<li class="page-item active"><a class="page-link" href="?timkiem='.$key.'&trang='.$i.'">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?timkiem='.$key.'&trang='.$i.'">'.$i.'</a></li>';
                        }
                        }
                        if($page < $numberPages){
                            echo '<li class="page-item"><a class="page-link" href="?timkiem='.$key.'&trang='.($page+1).'">Sau</a></li>';
                        }
                        echo '</ul>';
                    }
                // echo '</div>';

                ?>
                
            </div>
        <div class="clear"></div>
    </div>

</div>

<!-- END search -->
