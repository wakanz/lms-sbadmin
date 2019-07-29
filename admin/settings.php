<?php
include "includes/topbar.php";

if(isset($_POST['submit']))
{
    editSettings();
}
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <?php

                            $query = "SELECT * FROM settings";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                    <div class="form-group col-md-6">
                                        <label for="name">App Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['site_name']; ?>" name="name" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Set Daily Fine</label>
                                        <input type="text" class="form-control" value="<?php echo $row['fine']; ?>" name="fine" >
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