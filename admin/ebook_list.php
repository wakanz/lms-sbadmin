<?php include "includes/topbar.php";

if (isset($_GET['id']))
{
    delBook();

}
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">All E-books</h6>
                <a href="ebook_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add E-book</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>ISBN</th>
                            <th>Description</th>
                            <th>file</th>
                            <th>Author</th>
                            <th>Section</th>
                            <th>Publish Date</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        $query = "SELECT * FROM ebooks";
                        $result = $db->query($query);

                        /* associative array */
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>

                                <tr>
                                <tr>
                                    <td><?php echo '<img id="my" height="150" width="150"src="'.BASE_URL.'assets/upload/cover/'.$row["ebook_image"].'" />'; ?></td>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['book_isbn']; ?></td>
                                    <td><?php echo substr($row['book_description'], 0, 100); ?></td>
                                    <td><a href="<?php echo BASE_URL; ?>assets/upload/ebook/<?php echo $row['ebook_file']; ?>">Download</a></td>
                                    <td><?php echo $row['book_author']; ?></td>
                                    <td><?php echo $row['book_section']; ?></td>
                                    <td><?php echo $row['publish_date']; ?></td>
                                    <td><?php echo $row['book_location']; ?></td>
                                    <td>
                                        <a href="<?php echo ADMIN_PATH; ?>ebook_edit.php?id=<?php echo $row['book_id']; ?>" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="?id=<?php echo $row['book_id']; ?>" class="del" title="Delete"><i class="far fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


<?php include "includes/footer.php"?>