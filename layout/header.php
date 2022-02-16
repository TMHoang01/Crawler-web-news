<?php
if (isset($_GET['theloai'])){
        $link = $_GET['theloai'];
        $sql = "SELECT * from `category` where `url`= '".$link."';" ;
        // echo $sql."<br/>";
        $title = executeSingleResult($sql);
 
        $linkcate = $title['url_main'];
        $linksubcate = $title['url'];

        // ten the loai
        // echo '<h1><a href="?theloai='.$title['url'].'">';
        // echo ''.$title['name'].'';
        // echo '</a></h1>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>

<body>
    <div id="header" class="container">
        <div id="loggle"></div>
        <div class="logo"><a href="index.php"><h3>Tin tức</h3></a> </div>
        <ul id="nav">
            <li id="home"><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li><a href="?theloai=/xa-hoi.htm">Xã hội</a>
                <ul class="subnav">
                    <li><a href="?theloai=/xa-hoi/chinh-tri.htm">Chính trị</a></li>
                    <li><a href="?theloai=/xa-hoi/moi-truong.htm">Môi trường</a></li>
                    <li><a href="?theloai=/xa-hoi/giao-thong.htm">Giao thông</a></li>
                    <li><a href="?theloai=/xa-hoi/nong-tren-mang.htm">Nóng trên mạng</a></li>
                    <li><a href="?theloai=/xa-hoi/chuyen-ngay-moi.htm">Chuyện ngày mới</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/the-gioi.htm">Thế giới</a>
                <ul class="subnav">
                    <li><a href="?theloai=/the-gioi/quan-su.htm">Quân sự</a></li>
                    <li><a href="?theloai=/the-gioi/ho-so-phan-tich.htm">Hồ sơ - Phân tích</a></li>
                    <li><a href="?theloai=/the-gioi/the-gioi-do-day.htm">Thế giới đó đây</a></li>
                    <li><a href="?theloai=/the-gioi/kieu-bao.htm">Kiều bào</a></li>
                </ul>
            </li>

            <li><a href="?theloai=/the-thao.htm">Thể thao</a>
                <ul class="subnav">
                    <li><a href="?theloai=/the-thao/bong-da-trong-nuoc.htm">Bóng đá trong nước</a></li>
                    <li><a href="?theloai=/the-thao/bong-da-chau-au.htm">Bóng đá Châu Âu</a></li>
                    <li><a href="?theloai=/the-thao/tennis.htm">Tennis</a></li>
                    <li><a href="?theloai=/the-thao/golf.htm">Golf</a></li>
                    <li><a href="?theloai=/the-thao/vo-thuat.htm">Võ thuật</a></li>
                    <li><a href="?theloai=/the-thao/cac-mon-the-thao-khac.htm">Các môn Thể thao khác</a></li>
                    <li><a href="?theloai=/the-thao/hau-truong.htm">Hậu trường</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/van-hoa.htm">Văn hóa</a>
                <ul class="subnav">
                    <li><a href="?theloai=/van-hoa/doi-song-van-hoa.htm">Đời sống văn hóa</a></li>
                    <li><a href="?theloai=/van-hoa/dien-anh.htm">Điện ảnh</a></li>
                    <li><a href="?theloai=/van-hoa/am-nhac.htm">Âm nhạc</a></li>
                    <li><a href="?theloai=/van-hoa/van-hoc.htm">Văn học</a></li>
                    <li><a href="?theloai=/van-hoa/hat-giong-tam-hon.htm">Hạt giống tâm hồn</a></li>
                    <li><a href="?theloai=/van-hoa/huong-vi-viet.htm">Hương vị Việt</a></li>
                </ul>
            </li>

            <li><a href="?theloai=/kinh-doanh.htm">Kinh doanh</a>
                <ul class="subnav">
                    <li><a href="?theloai=/kinh-doanh/tai-chinh.htm">Tài chính</a></li>
                    <li><a href="?theloai=/kinh-doanh/chung-khoan.htm">Chứng khoán</a></li>
                    <li><a href="?theloai=/kinh-doanh/doanh-nghiep.htm">Doanh nghiệp</a></li>
                    <li><a href="?theloai=/kinh-doanh/khoi-nghiep.htm">Khởi nghiệp</a></li>
                    <li><a href="?theloai=/kinh-doanh/tieu-dung.htm">Tiêu dùng</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/lao-dong-viec-lam.htm">Việc làm</a>
                <ul class="subnav">
                    <li><a href="?theloai=/lao-dong-viec-lam/chinh-sach.htm">Chính sách</a></li>
                    <li><a href="?theloai=/lao-dong-viec-lam/viec-lam.htm">Việc làm</a></li>
                    <!-- <li><a href="?theloai=/lao-dong-viec-lam/dua-nghi-quyet-68-vao-cuoc-song.htm" >Đưa nghị quyết 68 vào cuộc sống</a></li> -->
                    <li><a href="?theloai=/lao-dong-viec-lam/xuat-khau-lao-dong.htm">Xuất khẩu lao động</a></li>
                    <li><a href="?theloai=/lao-dong-viec-lam/chung-toi-noi.htm">Chúng tôi nói</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/giai-tri.htm">Giải trí</a>
                <ul class="subnav">
                    <li><a href="?theloai=/giai-tri/hau-truong.htm">Hậu trường</a></li>
                    <li><a href="?theloai=/giai-tri/thoi-trang.htm">Thời trang</a></li>
                    <li><a href="?theloai=/giai-tri/tvshow.htm">TVshow</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/du-lich.htm">Du lịch</a>
                <ul class="subnav">
                    <li><a href="?theloai=/du-lich/tin-tuc.htm">Tin tức</a></li>
                    <li><a href="?theloai=/du-lich/kham-pha.htm">Khám phá</a></li>
                    <li><a href="?theloai=/du-lich/mon-ngon-diem-dep.htm">Món ngon - Điểm đẹp</a></li>
                    <li><a href="?theloai=/du-lich/tour-hay-khuyen-mai.htm">Tour hay - Khuyến mại</a></li>
                    <li><a href="?theloai=/du-lich/video-anh.htm">Video - Ảnh</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/doi-song.htm">Đời sống</a>
                <ul class="subnav">
                    <li><a href="?theloai=/doi-song/cong-dong.htm">Cộng đồng</a></li>
                    <li><a href="?theloai=/doi-song/nha-dep.htm">Nhà đẹp</a></li>
                    <li><a href="?theloai=/doi-song/thuong-luu.htm">Thượng lưu</a></li>
                    <li><a href="?theloai=/doi-song/chuyen-la.htm">Chuyện lạ</a></li>
                    <li><a href="?theloai=/doi-song/cho-online.htm">Chợ online</a></li>
                </ul>
            </li>
            <li><a href="?theloai=/tinh-yeu-gioi-tinh.htm">Tình yêu</a>
                <ul class="subnav">
                    <li><a href="?theloai=/tinh-yeu-gioi-tinh/chuyen-cua-toi.htm">Chuyện của tôi</a></li>
                    <li><a href="?theloai=/tinh-yeu-gioi-tinh/gia-dinh.htm">Gia đình</a></li>
                    <li><a href="?theloai=/tinh-yeu-gioi-tinh/tinh-yeu.htm">Tình yêu</a></li>
                </ul>
            </li>
        </ul>
        <div id="search-icon"></div>

            <!--input--------->
            <form method="get" id="search-box" class="container" onsubmit="return required(this)">

                <input placeholder=" Tìm kiếm..." type="text" name="timkiem" require/>
                <!--icon------>

                <button type="submit" class="s-icon">
                    <i class="fa fa-search"></i>
                </button>
            </form>

        <!-- </div> -->
    </div>
    <script type="text/javascript">
        // ----------------------
        // begin load category
        let cate ='<?php  echo !empty($title['name']) ? $title['name'] : '';?>';
        console.log( cate);
        let menu = document.getElementById('nav');
        let childrens = menu.children;
        // console.log(children); 
        for(var i = 1; i < childrens.length; i++) {
            if(cate == '') break;
            let check_cate = false;
            // console.log(i,childrens[i]);
            let namecates = childrens[i].getElementsByTagName('li');
            for(var j = 0; j < namecates.length; j++) {
                if(namecates[j].innerHTML == cate){
                    check_cate =true;
                    namecates[0].style.color= "#7ac64d";
                    // console.log(namecates[0]);
                    break;
                }
            }


        }


        // ------------------------------- //
        // SREACH
        let loggle = document.getElementById('loggle');
        let search_box = document.getElementById('search-box');
        let search_icon= document.getElementById('search-icon');

        loggle.addEventListener('click', function() {
            loggle.classList.toggle("active");
            search_icon.classList.toggle("show");
            let nav = document.getElementById('nav');
            nav.classList.toggle("active");
            if(nav.matches('.active')){
                search_box.classList.add("active");
                search_icon.classList.add("active");

            }else{
                search_box.classList.remove("active");
                search_icon.classList.remove("active");
            }
                // console.log('aaa');
            // document.getElementById('nav').classList.toggle("active");


        });

        search_icon.addEventListener('click', function() {
            search_box.classList.toggle("active");
            search_icon.classList.toggle("active");
        });
        // Pass reference to form from listener
        function required(form) {
        // Loop over controls in form, checking that they all meet a condition
        return Array.from(form.elements).every(function (control) {
        // Ingore submit button (may want to ignore others)
        if (control.type != 'submit') {
            // If value is empty, return false
            if (control.value == '') {
            return false;
            }
        }
        // Otherwise, return true
        return true;
        });
        }
    </script>