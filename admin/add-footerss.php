<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add Footers</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="descreiption"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Logo 1</label>
                        <input type="file" class="form-control" name="logo1">
                    </div>

                    <div class="form-group">
                        <label>Logo 2</label>
                        <input type="file" class="form-control" name="logo2">
                    </div>
                    
                    <div class="form-group">
                        <label>Logo 3</label>
                        <input type="file" class="form-control" name="logo3">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="footer_submit">Submit</button>
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