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

function insert_feedback(): void{
    global $connection;
    if(isset($_POST['btn_message'])){
         $get_username = $_POST['username'];
         $get_email    = $_POST['email'];
         $get_phone    = $_POST['telephone'];
         $get_address  = $_POST['address'];
         $get_message  = $_POST['message'];

        if(!empty($get_username) && !empty($get_email) && !empty($get_phone) && !empty($get_address) && !empty($get_message)){
            $sql_get_feedback = "INSERT INTO `feedback`(`username`, `email`, `telephone`, `address`, `message`) VALUES ('$get_username','$get_email','$get_phone','$get_address','$get_message') ";
            $result = $connection->query($sql_get_feedback);
            if($result){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success",
                                text: "Your feedback success",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }

    };

}

function add_footer(){
    
}







?>