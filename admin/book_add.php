<?php
include "includes/topbar.php";
if(isset($_POST['addbook']))
{
    addBook();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="card shadow mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Books</h6>
                    <a href="book_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Book</a>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Book Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Book Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="isbn">Book ISBN</label>
                                <input type="text" class="form-control" name="isbn" placeholder="Enter Book ISBN" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="description">Book Description</label>
                                <input type="text" class="form-control" name="desc" placeholder="Enter Book Description" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="p_date">Publish date</label>
                                <input placeholder="Selected date" type="text" id="datepicker" name="p_date" class="form-control datepicker" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="copies">Number of Copies</label>
                                <input type="text" class="form-control" name="qty" placeholder="Enter Number of Copies" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author">Book Author</label>
                                <select id="author" class="form-control" name="author" required>
                                    <option selected>Select Book Author</option>
                                    <?php


                                    $query = "SELECT * FROM authors";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['author_name']?>"><?php echo $row['author_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="section">Book Section</label>
                                <select id="section" class="form-control" name="section" required>
                                    <option selected>Select Book Section</option>
                                    <?php


                                    $query = "SELECT * FROM sections";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['section_name']?>"><?php echo $row['section_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">Book Location</label>
                                <select id="location" class="form-control" name="loc" required>
                                    <option selected>Select Book Location.</option>
                                    <?php


                                    $query = "SELECT * FROM locations";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['location_name']?>"><?php echo $row['location_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputState">Book Cover Image</label>
                                <input placeholder="Cover Image" type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        <button name="addbook" type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<script>
    $(document).ready(function){
        $('#addbook').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    //Add Book is successful
                    if (jsonData.success == "1")
                    {
                        alert('Book Added Successfully')
                    }
                }
            })
        })
    }
</script>


<?php include "includes/footer.php"?>