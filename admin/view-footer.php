<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>View Footers</h3>
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
                            <th>Description</th>
                            <th>Logo 1</th>
                            <th>Logo 2</th>
                            <th>Logo 3</th>

                        </tr>


                        <?php
                        global $connection;
                        $sql_footer = "SELECT * FROM about_us ";
                        $result       = $connection->query($sql_footer);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                                     <tr>
                                                        <td>' . $row['descreiption'] . '</td>
                                                        <td><img src=" ./assets/image/' . $row['logo1'] . '" alt="Logo 1" width="50"></td>
                                                        <td><img src=" ./assets/image/' . $row['logo2'] . '" alt="Logo 2" width="50"></td>
                                                        <td><img src=" ./assets/image/' . $row['logo3'] . '" alt="Logo 3" width="50"></td>
                                                        <td>
                                                            <a href="update-footer.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>
                                                        </td>
                                                    </tr>
                                        
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