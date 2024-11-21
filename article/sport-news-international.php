<?php
 include('header.php'); 
 include('function2.php');
 
 ?>

<main class="sport">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <?php 
                   show_sport_news('sport' , 'international');
                ?>

            </div>
            <div class="row pagination">
                <div class="col-12">
                    <ul>
                        <li>
                            <a href="">1</a>
                        </li>
                        <li>
                            <a href="">2</a>
                        </li>
                        <li>
                            <a href="">3</a>
                        </li>
                    </ul>   
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>