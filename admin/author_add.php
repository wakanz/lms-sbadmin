<?php
include "includes/topbar.php";
if(isset($_POST['submit']))
{
    addAuthor();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Author</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Author Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Author Name" required>
                            </div>
                        </div>
                            <button name="submit" type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


<?php include "includes/footer.php"?>