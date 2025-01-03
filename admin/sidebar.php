<?php
include('./function.php');
// session_start();
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$ID = $_SESSION['id'];
$sql_user_id = " SELECT * FROM user WHERE `id` = '$ID' ";
$result = $connection->query($sql_user_id);
$row = mysqli_fetch_assoc($result); //fetch for show 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- theme style -->
    <link rel="stylesheet" href="assets/style/theme.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/style/bootstrap.css">

    <!-- script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="content-left">
                        <div class="wrap-top">
                            <img src="assets/icon/admin-logo.png" alt="">
                            <h5>Jong Deng News</h5>
                        </div>
                        <div class="wrap-center">
                            <img style="width: 80px; height: 80px;" src="./assets/image/<?php echo $row['profile']; ?>" alt="Profile">
                            <h6>Welcome <span style="color: greenyellow;"><?php echo $row['username']; ?></span></h6>
                        </div>
                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>LOGO</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view-logo.php" name="view_logo">View logo</a>
                                            <a href="add-logo.php" name=" ">Add New logo</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>

                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>News</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view_news.php" name="viewNews">View News</a>
                                            <a href="Add_news.php" name="addNews">Add News</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>

                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>FEEDBACK</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view-feedback.php" name="viewFeedbacks">View feedback</a>

                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>FOOTER</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="add-footerss.php" name="addFooters">Add Description And Logo</a>
                                            <a href="view-footer.php" name="viewFooters">View Description And Logo</a>

                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="logout.php">
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>