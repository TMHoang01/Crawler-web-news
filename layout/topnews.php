<?php
    function top_category($link){
        $sql = "SELECT * from `newpaper` where 1 order by RAND() limit 5;";
        $sql = "SELECT * from `category`,`newpaper` 
        where `category`.`id` = newpaper.id_cate AND 
        (`category`.`url`='".$link."' or `category`.`url_main`='".$link."') order by RAND() limit 5;";
        $hotdata =  executeResult($sql);
        // $hotdata =  getmain($link);
        $sql = "SELECT * from `category` where `category`.`url`='".$link."';";
        $title =  executeSingleResult($sql);
        echo '<div class="content-category">';
            echo '<h2>'.$title['name'].'</h2>';
            echo '<div class="item">';
                echo '<div class="item-thumb">';
                        echo '<img src="'.$hotdata[0]['thumb'].'">';
                echo '</div>';
                echo '<div class="item-content">';
                    echo '<h3 class="item-title"><a href="news.php?tin='.$hotdata[0]['link'].'">'.$hotdata[0]['title'].'</a></h3>';
                    // echo '<p class="item-desc">'.$hotdata[0]['excrept'].'</p>';
                echo '</div>';
                echo '</div>';
            for($i = 1; $i<5; $i++){
                echo '<div class="item">';
                    echo '<div class="item-content">';
                        echo '<h4 class="item-title"><a href="news.php?tin='.$hotdata[$i]['link'].'">'.$hotdata[$i]['title'].'</a></h4>';
                    echo '</div>';
                echo '</div>';
            }
            
        
        echo '</div>';
    }

    function top_category1($link){
        $sql = "SELECT * from `newpaper` where 1 order by RAND() limit 5;";
        $sql = "SELECT * from `category`,`newpaper` 
        where `category`.`id` = newpaper.id_cate AND 
        (`category`.`url`='".$link."' or `category`.`url_main`='".$link."') order by RAND() limit 5;";
        $hotdata =  executeResult($sql);
        // $hotdata =  getmain($link);
        $sql = "SELECT * from `category` where `category`.`url`='".$link."';";
        $title =  executeSingleResult($sql);
        echo '<div class="content-category">';
            echo '<h2>'.$title['name'].'</h2>';
            echo '<div class="item">';
                echo '<div class="item-thumb">';
                        echo '<img src="'.$hotdata[0]['thumb'].'">';
                echo '</div>';
                echo '<div class="item-content">';
                    echo '<h3 class="item-title"><a href="news.php?tin='.$hotdata[0]['link'].'">'.$hotdata[0]['title'].'</a></h3>';
                    // echo '<p class="item-desc">'.$hotdata[0]['excrept'].'</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="point-right">';
            for($i = 1; $i<5; $i++){
                echo '<div class="item">';
                echo '<div class="item-thumb">';
                        echo '<img src="'.$hotdata[$i]['thumb'].'">';
                echo '</div>';
                    echo '<div class="item-content">';
                        echo '<h4 class="item-title"><a href="news.php?tin='.$hotdata[$i]['link'].'">'.$hotdata[$i]['title'].'</a></h4>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
            
        
        echo '</div>';
    }