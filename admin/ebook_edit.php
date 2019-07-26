<?php
include "includes/topbar.php";

if(isset($_POST['submit']))
{
    editEbook();
}
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit E-Book</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <?php

                            $id = $_GET['id'];
                            $query = "SELECT * FROM ebooks where book_id = '$id' ";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <input type="hidden" value="<?php echo $row['book_id']; ?>" name="book_id" >
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['book_name']; ?>" name="name" placeholder="Enter Name" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" value="<?php echo $row['book_isbn']; ?>" name="isbn" placeholder="Enter ISBN" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" value="<?php echo $row['book_description']; ?>" name="desc" placeholder="Enter Description" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Publish date</label>
                                <input placeholder="Selected date" type="text" id="kt_datepicker_1" value="<?php echo date('d-m-Y', strtotime(str_replace('-', '/', $row['publish_date']))); ?>" name="p_date" class="form-control datepicker" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="author">Author</label>
                                <select id="author" class="form-control" name="author" >
                                    <option selected>Select Author</option>
                                    <?php


                                    $query = "SELECT * FROM authors";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['author_id']?>"><?php echo $row['author_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Ebook File</label>
                                <input placeholder="File" type="file" name="book" class="form-control" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="section">Section</label>
                                <select id="section" class="form-control" name="section" >
                                    <option selected>Select Section</option>
                                    <?php


                                    $query = "SELECT * FROM sections";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['section_id']?>"><?php echo $row['section_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <select id="location" class="form-control" name="loc" >
                                    <option selected>Select Location.</option>
                                    <?php


                                    $query = "SELECT * FROM locations";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['location_id']?>"><?php echo $row['location_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Cover Image</label>
                                <input placeholder="Cover Image" type="file" name="image" class="form-control" >
                            </div>
                        </div>
                        <?php }}?>

                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


<?php include "includes/footer.php"?>