<?php
include('sidebar.php');
$get_id_update = $_GET['id'];

$sql_update_footer = "SELECT * FROM `about_us` WHERE id = '$get_id_update' ";
$result = $connection->query($sql_update_footer);
$row = mysqli_fetch_assoc($result);
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Update Footers</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="updescreiption"> <?php echo $row['descreiption']; ?> </textarea>
                    </div>

                    <div class="form-group">
                        <label>Logo 1</label>
                         <input type="file" class="form-control" name="uplogo1" >
                         <input type="hidden" class="form-control" name="oldlogo1" value=" <?php echo $row['logo1']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Logo 2</label>
                        <input type="file" class="form-control" name="uplogo2" >
                        <input type="hidden" class="form-control" name="oldlogo2" value=" <?php echo $row['logo2']; ?> ">

                    </div>

                    <div class="form-group">
                        <label>Logo 3</label>
                        <input type="file" class="form-control" name="uplogo3">
                        <input type="hidden" class="form-control" name="oldlogo3" value=" <?php echo $row['logo3']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="footer_submit-up">update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
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