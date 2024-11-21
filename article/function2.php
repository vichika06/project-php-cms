<!--@import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<?php
// @Connection database
// $con = new mysqli('localhost','root','','cms');
// .. ថយចេញពីfileដែរកំពុងនៅ

include '../admin/connection.php';
function show_sport_news($category, $new_type)
{
    global $connection;
    $sql_get_news = "SELECT * FROM new WHERE `category` = '$category' AND `new_type` = '$new_type' ORDER BY `id` DESC ";
    $result = $connection->query($sql_get_news);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
           

            <div class="col-4">
                            <figure>
                                 <a href="news-detail.php?id=' . $row['id'] . '">
                                    <div class="thumbnail">
                                        <img width="350" height="200" src="../admin/assets/image/' . $row['banner'] . '" alt="">
                                    </div>
                                    <div class="detail">
                                        <h3 class="title"> ' . $row['title'] . ' </h3>
                                        <div class="date">' . $row['create_at'] . '</div>
                                        <div class="description">
                                           ' . $row['description']. '
                                        </div>
                                    </div>
                                </a>
                            </figure>
                        </div>

        ';
    }
}





?>