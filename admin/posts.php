<?php include "includes/topbar.php";

if (isset($_GET['id']))
{
    delPost();

}
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
                <a href="post_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Publish Date</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        $query = "SELECT * FROM posts";
                        $result = $db->query($query);

                        /* associative array */
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>

                                <tr>
                                <tr>
                                    <td><?php echo '<img id="my" height="100" width="150"src="'.BASE_URL.'assets/upload/posts/'.$row["image"].'" />'; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo substr($row['content'], 0, 100); ?> ...</td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['posted_by']; ?></td>
                                    <td>
                                        <a href="<?php echo ADMIN_PATH; ?>post_edit.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="?id=<?php echo $row['id']; ?>" class="del" title="Delete"><i class="far fa-trash-alt"></i></a>
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