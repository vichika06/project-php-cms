<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>FEEDBACK FORM</h3>
        </div>
        <div class="bottom view-post">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                    <table class="table" border="1px">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Message</th>


                        </tr>


                        <?php
                        $sql_feedback = "SELECT * FROM feedback WHERE 1";
                        $result       = $connection->query($sql_feedback);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                                    <tr>
                                                        <td>' . $row['username'] . '</td>
                                                        <td>' . $row['email'] . '</td>
                                                        <td>' . $row['telephone'] . '</td>
                                                        <td>' . $row['address'] . '</td>
                                                        <td>' . $row['message'] . '</td>

                                                      
                                                      
                                                    </tr>

                                        
                                                        </form>
                              ';
                        }
                        ?>
                    </table>
                    <ul class="pagination">
                        <li>
                           
                        </li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <input type="hidden" class="value_remove" name="remove_id">
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
</div>
</div>
</main>
</body>

</html>