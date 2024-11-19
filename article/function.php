
<!--@import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<?php 
// @Connection database
// $con = new mysqli('localhost','root','','cms');
// .. ថយចេញពីfileដែរកំពុងនៅ

include '../admin/connection.php';
if (!function_exists('show_logo')) {
    function show_logo($location){
        global $connection;
        $sql_get_logo = "SELECT * FROM logo WHERE `status` = '$location' ORDER BY `id` DESC LIMIT 1";
        $result       = $connection -> query($sql_get_logo);
        $row          = mysqli_fetch_assoc($result);    
        return $row['thumbnail'];
    }
}

if (!function_exists('show_new')) {
    function show_new($category){
        global $connection;
        $sql_get_news = "SELECT * FROM new WHERE `category` = '$category' ORDER BY `id` DESC LIMIT 3";
        $result = $connection -> query($sql_get_news);
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id='.$row['id'].'">
                            <div class="thumbnail">
                                <img width="350" height="200" src="../admin/assets/image/'.$row['banner'].'" alt="">
                            <div class="title">
                                '.$row['title'].'
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
            ';
        }
    }
}



if (!function_exists('update_view')) {
function update_view($news_id){
    global $connection;
    $sql_update_view  = "UPDATE new SET view = view + 1 WHERE `id` = '$news_id'";
    $connection -> query($sql_update_view);
  }
}

if (!function_exists('get_related_news')) {
function get_related_news($news_id,$category){
    global $connection;
    $sql_get_related_news = "SELECT * FROM new WHERE `id` NOT IN ('$news_id') AND `category` = '$category' LIMIT 2";
    $result               = $connection -> query($sql_get_related_news);
    while($row = mysqli_fetch_assoc($result)){
        echo '
            <figure>
                <a href="news-detail.php?id='.$row['id'].'">
                    <div class="thumbnail">
                        <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="">
                    </div>
                    <div class="detail">
                        <h3 class="title">'.$row['title'].'</h3>
                        <div class="date">'.$row['create_at'].'</div>
                        <div class="description">
                            '.$row['description'].'
                        </div>
                    </div>
                </a>
            </figure>
        ';
    }
  }
}

function trending_litle(){
    global $connection;
    $sql = "SELECT * FROM `new` ORDER BY `id` DESC LIMIT 3";
    $rs  = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
                    <i class="fas fa-angle-double-right"></i>
                    <a href="./news-detail.php?id=' . $row['id'] . '">' . $row['title'] . '</a> &ensp;
                ';
    }
}

function search_news($query){
    global $connection;
    $sql = "SELECT * FROM `news` WHERE title LIKE '%$query%'";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        $date = $row['create-at'];
        $date = date('d/m/y');
        echo '
            <div class="col-4">
                <figure>
                    <a href="./news-detail.php?id=' . $row['id'] . '">
                        <div class="thumbnail">
                        <img src="../admin/assets/image/' . $row['thumbnail'] . '" alt="" width="350px" height="200px">
                        </div>
                        <div class="detail">
                            <h3 class="title">' . $row['title'] . '</h3>
                            <div class="date">' . $date . '</div>
                            <div class="description">' . $row['description'] . '</div>
                        </div>
                    </a>
                </figure>
            </div>
            ';
    }
}

function show_trending(){
    global $connection;
    $sql_get_news = "SELECT * FROM new  ORDER BY `view` DESC LIMIT 3";
    $result = $connection -> query($sql_get_news);
    while($row = mysqli_fetch_assoc($result)){
        echo '
            <div class="col-4">
                <figure>
                    <a href="news-detail.php?id='.$row['id'].'">
                        <div class="thumbnail">
                            <img width="350" height="200" src="../admin/assets/image/'.$row['banner'].'" alt="">
                        <div class="title">
                            '.$row['title'].'
                        </div>
                        </div>
                    </a>
                </figure>
            </div>
        ';
    }
}



?>