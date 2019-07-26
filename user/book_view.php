<?php
include "includes/navbar.php";
if (isset($_GET['bid']))
{
    bookReserve();

}
?>

<!--// Main Content \\-->
	<div class="ereaders-main-content ereaders-content-padding">

		<!--// Main Section \\-->
		<div class="ereaders-main-section">
			<div class="container">
				<div class="row">
                    <?php
                    $user = $_SESSION['id'];
                    $id = '';
                    if( isset( $_GET['id'])) {
                        $id = $_GET['id'];
                    }         // Collecting data from query string

                    $query = $db->query("select * from books where book_id= '$id'");

                    /* associative array */
                    if ($query->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {

                            ?>
					<div class="col-md-12">
						<div class="ereaders-book-wrap">
							<div class="row">
								<div class="col-md-5">
									<img src="<?php echo BASE_URL;?>assets/upload/cover/<?php echo $row["book_image"]; ?>" alt="" class="img-thumb">
								</div>
								<div class="col-md-7">
									<div class="ereaders-detail-thumb-text">
										<h2> <?php echo $row['book_name']; ?></h2>
										<span>By: <?php echo $row['book_author']; ?></span>
										<div class="clearfix"></div>
										<p><?php echo substr($row['book_description'], 0, 100); ?></p>
										<ul class="ereaders-detail-option">
											<li>
												<h6>Availability:</h6>
												<span><?php echo $row['book_qty']; ?></span>
											</li>
											<li>
												<h6>Section:</h6>
												<span><?php echo $row['book_section']; ?></span>
											</li>
											<li>
												<h6>ISBN:</h6>
												<span> <?php echo $row['book_isbn']; ?></span>
											</li>
										</ul>

		                    			<a href="?bid=<?php echo $row['book_id']; ?>" class="ereaders-detail-btn">Reserve <i class="icon ereaders-shopping-bag"></i></a>
									</div>
								</div>
							</div>
						</div>
						<h2 class="ereaders-section-heading">Book Description</h2>
						<div class="ereaders-rich-editor">
							<p><?php echo $row['book_description']; ?></p>
						</div>
						<h2 class="ereaders-section-heading">Book Detail</h2>
						<div class="ereaders-book-detail">
							<ul>
								<li>
									<h6>Book Title</h6>
									<p><?php echo $row['book_name']; ?></p>
								</li>
								<li>
									<h6>Author</h6>
									<p><?php echo $row['book_author']; ?></p>
								</li>
								<li>
									<h6>Book Section</h6>
									<p><?php echo $row['book_section']; ?></p>
								</li>
								<li>
									<h6>Date Published</h6>
									<p><?php echo $row['publish_date']; ?></p>
								</li>
								<li>
									<h6>Book Location</h6>
									<p><?php echo $row['book_location']; ?></p>
								</li>
							</ul>
						</div>

                        <h2 class="ereaders-section-heading">Related books</h2>
                        <div class="ereaders-books ereaders-book-grid ereaders-book-related">
							<ul class="row">
                            <?php
                            $count = 0;
                            $sec = $row['book_section'];
                            $loc = $row['book_location'];
                            $query = "SELECT * FROM books WHERE book_section = '$sec' AND book_location = '$loc' ";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                                    if($count > 4) {break;}
                                    ?>
								<li class="col-md-3">
									<figure>
										<a href="<?php echo USER_PATH; ?>ebook_view.php?id=<?php echo $row['book_id']; ?>"><img src="<?php echo BASE_URL; ?>assets/upload/cover/<?php echo $row["book_image"]; ?>" alt=""></a>
									</figure>
									<div class="ereaders-book-grid-text">
										<h2><a href="<?php echo USER_PATH; ?>ebook_view.php?id=<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></a></h2>
										<small>By: <?php echo $row['book_author']; ?></small>
										<a href="<?php echo USER_PATH; ?>ebook_view.php?id=<?php echo $row['book_id']; ?>" class="ereaders-simple-btn ereaders-bgcolor">Reserve</a>
									</div>
								</li>
                                    <?php } } ?>

							</ul>
						</div>
					</div>
                    <?php
                    }}
                    ?>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

	</div>
	<!--// Main Content \\-->


	<?php include "includes/footer.php"; ?>