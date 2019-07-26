<?php include "includes/navbar.php"?>
<!--// Main Content \\-->
<div class="ereaders-main-content">

    <!--// Main Section \\-->
    <div class="ereaders-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ereaders-books ereaders-book-grid">
                        <ul class="row">
                        <?php
                        $query = "SELECT * FROM books";
                        $result = $db->query($query);

                        /* associative array */
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                            <li class="col-md-3">
                                <figure>
                                    <a href="<?php echo USER_PATH; ?>book_view.php?id=<?php echo $row['book_id']; ?>">
                                        <img src="<?php echo BASE_URL; ?>assets/upload/cover/<?php echo $row["book_image"]; ?>" class="img-gthumb" alt=""></a>
                                </figure>
                                <div class="ereaders-book-grid-text">
                                    <h2><a href="<?php echo USER_PATH; ?>book.php?id=<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></a></h2><br>
                                    <small>By: <?php echo $row['book_author']; ?></small>
                                    <a href="<?php echo USER_PATH; ?>book_view.php?id=<?php echo $row['book_id']; ?>" class="ereaders-simple-btn ereaders-bgcolor">Reserve Book</a>
                                </div>
                            </li>

                            <?php }
                        } ?>
                        </ul>
                    </div>
                    <!--// Pagination \\-->
                    <div class="ereaders-pagination">
                        <ul class="page-numbers">
                            <li><a class="previous page-numbers" href="404.html"><span aria-label="Next"><i class="icon ereaders-arrow-point-to-right"></i></span></a></li>
                            <li><span class="page-numbers current">01</span></li>
                            <li><a class="page-numbers" href="404.html">02</a></li>
                            <li><a class="page-numbers" href="404.html">03</a></li>
                            <li><a class="page-numbers" href="404.html">04</a></li>
                            <li><a class="next page-numbers" href="404.html"><span aria-label="Next"><i class="icon ereaders-arrow-point-to-right"></i></span></a></li>
                        </ul>
                    </div>
                    <!--// Pagination \\-->
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

</div>
<!--// Main Content \\-->

<?php include "includes/footer.php"?>