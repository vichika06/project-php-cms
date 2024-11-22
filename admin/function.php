<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
include './connection.php';
function register_user()
{
    global $connection;
    if (isset($_POST['btn_register'])) {
        $username = $_POST['username'];
        // $gender   = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile = $_FILES['profile']['name'];

        if (!empty($username)  && !empty($email) && !empty($password) && !empty($profile)) {
            // && !empty($gender)
            $thumbnail = date('YmdHis') . '-' . $profile;
            $path = 'assets/image/' . $thumbnail;
            move_uploaded_file($_FILES['profile']['tmp_name'], $path);
            $password = md5($password);

            $query  = "INSERT INTO `user`( `username`, `email`, `password`, `profile`)
                 VALUES ('$username','$email',' $password','$thumbnail')";
            $result = $connection->query($query);
            if ($result) {
                header('location: login.php');
            }
        } else {
            echo 13;
        }
    }
}
register_user();
function login_user()
{
    global $connection;
    session_start();
    if (isset($_POST['btn_login'])) {
        $name_email = $_POST['name_email'];
        $password   = $_POST['password'];
        if (!empty($name_email)  && !empty($password)) {
            $password = md5($password);
            $sql_select = "SELECT * FROM `user` WHERE `username` ='$name_email' OR `email` = '$name_email' AND `password` ='$password'";
            $result = $connection->query($sql_select);

            if ($result) {
                session_start();

                $row = mysqli_fetch_assoc($result); //fetch for session
                //  echo $row['id'];
                //  echo $row['username'];
                //  echo $row['profile'];
                $_SESSION['id']  = $row['id'];

                header("location: index.php");
            }
        }
    }
}
login_user();
function logout_user()
{
    if (isset($_POST['btn_confirm_logout'])) {
        session_start();
        session_unset();
        header('location: login.php');
    }
}
logout_user();

function move_file($file_name)
{
    $thumbnail = $_FILES[$file_name]['name'];
    $image = date('ymdhis') . '-' . $thumbnail;
    $path  = 'assets/image/' . $image;
    move_uploaded_file($_FILES[$file_name]['tmp_name'], $path);

    return $image;
}

function addLogo()
{
    global $connection;
    if (isset($_POST['cornfirm_add'])) {
        // echo 123;
        // $status = $_POST['statup'];
        $status    = $_POST['status'];
        $thumbnail = move_file('thumbnail');

        if (!empty($status) && !empty($thumbnail)) {
            $sql_insert_logo = "
                                INSERT  INTO logo (status,thumbnail) VALUES ('$status','$thumbnail');
                           ";
            $result = $connection->query($sql_insert_logo);

            if (!$result) {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success Insert Logo",
                                text: "You Inserted Logo",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        } else {
            echo '
        <script>
            $(document).ready(function(){
                swal({
                    title: "Insert not success Logo",
                    text: "You not Inserted Logo",
                    icon: "error",
                    button: "Confirm",
                });
            })
        </script>
    ';
        }
    }
}
addLogo();

function update_logo()
{
    global $connection;
    if (isset($_POST['cornfirm_update'])) {
        $updated_id = $_GET['id'];
        $updated_status = $_POST['update_status'];
        $updated_image  = $_FILES['update_thumbnail']['name'];
        if ($updated_image == null) {
            $thumbnail = $_POST['old_image'];
        } else {
            $thumbnail = move_file('update_thumbnail');
        }

        if (!empty($updated_status) && !empty($thumbnail)) {
            $sql_update_logo = "UPDATE logo SET status = '$updated_status' , thumbnail = '$thumbnail' WHERE id='$updated_id'";
            $result = $connection->query($sql_update_logo);
            if ($result) {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success Edit Logo",
                                text: "You Edited Logo",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }
    }
}
update_logo();


function remove_logo()
{
    global $connection;
    if (isset($_POST['confirm_remove'])) {
        $ID = $_POST['remove_Id'];

        $sql = " DELETE FROM logo WHERE id = '$ID' ";

        $result = $connection->query($sql);

        if ($result) {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Delete success ",
                            text: "You Deleted Logo",
                            icon: "success",
                            button: "Confirm",
                        });
                    })
                </script>
            ';
        } else {
            echo '
            <script>
                $(document).ready(function(){
                    swal({
                        title: "Delete not success ",
                        text: "deleted Logo failed!",
                        icon: "error",
                        button: "Confirm",
                    });
                })
            </script>
            ';
        }
    }
}
remove_logo();

// Add new 

function Addnews()
{
    global $connection;
    if (isset($_POST['cornfirm_submit'])) {

        $title = $_POST['title'];
        $type  = $_POST['type'];
        $category = $_POST['category'];
        $banner = move_file('banner');
        $thumbnail = move_file('thumbnail');
        $description = $_POST['description'];
        $author_id = $_SESSION['id'];

        if (!empty($title) && !empty($type) && !empty($category) && !empty($banner) && !empty($thumbnail) && !empty($description)) {
            $sql_Addnews = "INSERT INTO new (title,new_type,category,banner,thumbnail,description,author_id) VALUES('$title','$type','$category','$banner','$thumbnail','$description','$author_id')";
            $result = $connection->query($sql_Addnews);

            if ($result) {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success Add News",
                                text: "You Added News",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }
    }
}
Addnews();

function update_New()
{
    global $connection;
    if (isset($_POST['cornfirm_update_new'])) {
        $get_id_update = $_GET['id'];
        $title     = $_POST['updated_title'];
        $news_type = $_POST['updated_type'];
        $category  = $_POST['updated_category'];
        $description = $_POST['updated_description'];
        $banner    = $_FILES['updated_banner']['name'];
        $thumbnail = $_FILES['updated_thumbnail']['name'];

        // echo $get_id_update;

        if ($banner == null) {
            $banner = $_POST['old_banner'];
        } else {
            $banner = move_file('updated_banner');
        }
        if ($thumbnail == null) {
            $thumbnail = $_POST['old_thumbnail'];
        } else {
            $thumbnail = move_file('updated_thumbnail');
        }

        if (!empty($banner) && !empty($thumbnail) && !empty($description) && !empty($category) && !empty($news_type) && !empty($title) && !empty($get_id_update)) {
            $mysql_update_new = "UPDATE `new` SET `title`='$title', `new_type`='$news_type', `category`='$category', `banner`='$banner', `thumbnail`='$thumbnail', `description`='$description' WHERE id = '$get_id_update'";
            $result = $connection->query($mysql_update_new);
            if ($result) {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success update News",
                                text: "You update News",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }
    }
}
update_New();

function remove_new()
{
    global $connection;
    if (isset($_POST['deleteNews'])) {
        $ID = $_POST['remove_new_id'];
        $mysql = " DELETE FROM new WHERE id = '$ID' ";
        $result = $connection->query($mysql);
        if ($result) {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Delete success ",
                            text: "You Deleted Logo",
                            icon: "success",
                            button: "Confirm",
                        });
                    })
                </script>
            ';
        }
    }
}
remove_new();

function addFooter()
{
    global $connection;
    if (isset($_POST['footer_submit'])) {

        $descreiption = $_POST['descreiption'];

        $logo1 = move_file('logo1');
        $logo2 = move_file('logo2');
        $logo3 = move_file('logo3');

        $id = $_SESSION['id'];


        if (!empty($logo1) && !empty($logo2) && !empty($logo3) && !empty($description)) {
            $sql_Add_footer = "INSERT INTO `about_us` (`id`,`logo1`,`logo2`,`logo3`,`descreiption`) VALUES('$id','$logo1','$logo2','$logo3','$descreiption')";
            $result = $connection->query($sql_Add_footer);

            if ($result) {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success Add News",
                                text: "You Added News",
                                icon: "success",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }
    }
}
addFooter();
