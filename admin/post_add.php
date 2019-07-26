<?php
include "includes/topbar.php";
if(isset($_POST['submit']))
{
    addPost();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">



                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="hidden" value="<?php echo $_SESSION['name'];?>" name="by">
                                <input type="text" class="form-control" name="title" placeholder="Title" required>
                            </div>

                        <div class="form-group">
                            <label for="name">Categories</label>
                            <select id="section" class="form-control" name="category" required>
                                <option selected>Select Book Category</option>
                                <?php


                                $query = "SELECT * FROM categories";
                                $result = $db->query($query);


                                /* associative array */
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        ?>



                                        <option value="<?php echo $row['category_name']?>"><?php echo $row['category_name'] ;?></option>
                                        <?php
                                    } }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Post Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Content</label>
                            <textarea  class="form-control" name="content" id="summernote"></textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->




<?php include "includes/footer.php"?>