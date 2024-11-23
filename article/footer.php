    <footer>
        <div class="container">
            <div class="logo">
                <a href="">
                    <img width="150px" height="150px" src="../admin/assets/image/<?php echo show_logo('footer'); ?>" alt="">
                </a>
            </div>
            <?php
            global $connection;
            $sql_footer = "SELECT * FROM about_us ";
            $result       = $connection->query($sql_footer);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                                <div class="about">
                                        <div  class="description">
                                        ' . $row['descreiption'] . '
                                            <!-- Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. -->
                                        </div>
                                    </div>
                                    <div class="connect">
                                        <ul>
                                            <li>
                                                <a href=""><img src=" ../admin/assets/image/' . $row['logo1'] . '" alt="Logo 1" width="50"></a>
                                            </li>
                                            <li>
                                                <a href=""><img src=" ../admin/assets/image/' . $row['logo2'] . '" alt="Logo 2" width="50"></a>
                                            </li>
                                            <li>
                                                <a href=""><img src=" ../admin/assets/image/' . $row['logo3'] . '" alt="Logo 3" width="50"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                        
                              ';
            }
            ?>

    </footer>
    </body>
    <!-- @slick slider -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- @theme js -->
    <script src="assets/script/theme.js"></script>
    <!-- @funcy box -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>