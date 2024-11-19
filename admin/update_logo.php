<?php 
    include'sidebar.php';
    $get_id = $_GET['id'];

    $sql    = "SELECT * FROM logo WHERE id = '$get_id' ";
    $result = $connection->query($sql);
    $row    = mysqli_fetch_assoc($result);
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label>Status</label> 
                                        <select class="form-select" name="update_status">
                                        <option value="header" <?php if($row['status'] == 'header') echo 'selected' ?>>Header</option> 
                                        <option value="footer" <?php if($row['status'] == 'footer') echo 'selected' ?>>Footer</option>
                                        <!-- selected use to show like active -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control" name="update_thumbnail" >
                                        <input type="hidden" name="old_image" value="<?php echo $row['thumbnail'] ?>">
                                    </div>
                                
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="cornfirm_update">Cornfirm update</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
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