<?php 
    include('sidebar.php');
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All New Logo</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table  class="table align-middle" border="1px">
                                        <tr>
                                            <th>ID</th>
                                            <th>Status</th>
                                            <th>Thumbnail</th>                                        
                                            <th>Actions</th>
                                        </tr>
                                        

                                        <?php 
                                            $sql = "SELECT * FROM logo WHERE 1";
                                            $result = $connection ->query($sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                $id=$row['id'];
                                                echo '
                                                    <tr>
                                                            <td>'.$row['id'].'</td>
                                                            <td>'.$row['status'].'</td>
                                                            <td>

                                                            <img width=100px; height=100px; src="./assets/image/'.$row['thumbnail'].' " >
                                                            

                                                            </td>
                                                            <td width="150px">
                                                                <form action="" method="post">
                                                                <a href="update_logo.php?id='.$id.'" class="btn btn-primary" name="update-logo">Update</a> 
                                                                <button type="submit" remove-id="1" name="confirm_remove" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    Remove
                                                                </button>
                                                                <input type="hidden" name="remove_Id" value="'.$id.'">
                                                                </form>
                                                            </td>
                                                    </tr>
                                                   
                                                ';
                                            }
                                

                                        
                                        
                                        ?>

<!--update_logo // query string use get method to get id,, -->
                                        
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
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
                                                        <input type="text" class="value_remove" value=" .'<?php $row['id'] ?>'. " > 
                                                        <button type="submit"   class="btn btn-danger">Yes</button>
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