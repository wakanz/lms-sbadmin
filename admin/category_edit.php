<?php
include "includes/topbar.php";

if(isset($_POST['submit']))
{
    editCategory();
}
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <?php

                            $id = $_GET['id'];
                            $query = "SELECT * FROM categories where category_id = '$id' ";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                    <input type="hidden" value="<?php echo $row['category_id']; ?>" name="category_id" >
                                    <div class="form-group col-md-6">
                                        <label for="name">Category Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['category_name']; ?>" name="name" >
                                    </div>
                                <?php }}?>
                        </div>



                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


<?php include "includes/footer.php"?>