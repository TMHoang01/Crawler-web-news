<!-- BEGIN footer -->
<div id="footer">
    <div class="footer-menu ">
        <?php
                // include "";
                $cate =   get_category();
                // print_r($cate);
                foreach($cate as $item){
                    echo '<a href="?theloai='.$item['url'].'">'.$item['name'].'</a>';
                }
            ?>

    </div>
    <div class="footer-info">
        <p>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span> Điện thoại: 0123 456 789</span>
        </p>    
        <p>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span> Email: ABC@GMAIL.COM</span>
        </p>
    </div>
</div>

</body>

</html>

<!-- END footer -->