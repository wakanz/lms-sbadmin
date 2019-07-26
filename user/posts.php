<?php include "includes/navbar.php"?>

    <!--// Main Content \\-->
    <div class="ereaders-main-content">
<!--// Main Section \\-->
<div class="ereaders-main-section ">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="ereaders-blog ereaders-blog-grid">
                    <ul class="row">
                    <?php
                    $query = "SELECT * FROM posts";
                    $result = $db->query($query);

                    /* associative array */
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                        <li class="col-md-6">
                            <div class="ereaders-blog-grid-wrap">
                                <figure>
                                    <a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>">
                                        <img class="post-thumb" src="<?php echo BASE_URL;?>assets/upload/posts/<?php echo $row["image"]; ?>" alt="">
                                    </a>
                                </figure>
                                <div class="ereaders-blog-grid-text">
                                    <span>Business</span>
                                    <h2><a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
                                    <ul class="ereaders-blog-option">
                                        <li><?php echo $row['date']; ?></li>
                                    </ul>
                                    <p><?php echo substr($row['content'], 0, 100); ?> </p>
                                    <a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>" class="ereaders-readmore-btn">Read more <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <?php }} ?>
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
            <!--// Sidebar \\-->
            <aside class="col-md-3">

                <!--// Widget Search \\-->
                <div class="widget widget_search">
                    <form>
                        <input value="Search" onblur="if(this.value == '') { this.value ='Search'; }" onfocus="if(this.value =='Search') { this.value = ''; }" tabindex="0" type="text">
                        <label><input type="submit" value=""></label>
                    </form>
                </div>
                <!--// Widget Search \\-->

                <!--// Widget Cetagories \\-->
                <div class="widget widget_cetagories widget_border">
                    <h2 class="ereaders-widget-title">Categories</h2>
                    <ul>
                        <?php
                            $query = "SELECT * FROM categories ORDER BY category_id DESC LIMIT 5";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                        <li><a href="categories.php"><?php echo $row['category_name']; ?><span>19</span></a></li>
                                <?php }} ?>
                    </ul>

                </div>
                <!--// Widget Cetagories \\-->

                <!--// Widget Popular Post \\-->
                <div class="widget widget_popular_post widget_border">
                    <h2 class="ereaders-widget-title">Popular Post</h2>
                    <ul>
                        <li>
                            <h6><a href="blog-detail.html">How to write an eBook in 2015 and make</a></h6>
                            <time datetime="2008-02-14 20:00">November 23, 2017</time>
                        </li>
                        <li>
                            <h6><a href="blog-detail.html">The 30 Best Places To Be If You Love Books Mark</a></h6>
                            <time datetime="2008-02-14 20:00">November 23, 2017</time>
                        </li>
                        <li>
                            <h6><a href="blog-detail.html">The Old Butcher’s Bookshop, a rare books store</a></h6>
                            <time datetime="2008-02-14 20:00">November 23, 2017</time>
                        </li>
                    </ul>
                </div>
                <!--// Widget Popular Post \\-->

                <!--// Widget Recent Comments \\-->
                <div class="widget widget_recent_comments widget_border">
                    <h2 class="ereaders-widget-title">Recent Comments</h2>
                    <ul>
                        <li>
                            <h6><a href="blog-detail.html">English breakfast tea with tasty donut</a></h6>
                            <span>By<a href="404.html"> @johnmarlon</a></span>
                        </li>
                        <li>
                            <h6><a href="blog-detail.html">Two smart kids reading magazine before sleeping.</a></h6>
                            <span>By<a href="404.html"> @sarahjoy</a></span>
                        </li>
                        <li>
                            <h6><a href="blog-detail.html">We helpyou create clean mod interior design.</a></h6>
                            <span>By<a href="404.html"> @jason_jk</a></span>
                        </li>
                    </ul>
                </div>
                <!--// Widget Recent Comments \\-->

                <!--// Widget archives \\-->
                <div class="widget widget_cetagories widget_border">
                    <h2 class="ereaders-widget-title">archives</h2>
                    <ul>
                        <li><a href="404.html">August 2017</a></li>
                        <li><a href="404.html">November 2017</a></li>
                        <li><a href="404.html">December 2017</a></li>
                        <li><a href="404.html">January 2018</a></li>
                        <li><a href="404.html">March 2018</a></li>
                    </ul>
                </div>
                <!--// Widget archives \\-->

                <!--// Widget Top Tags \\-->
                <div class="widget widget_tags widget_border">
                    <h2 class="ereaders-widget-title">Top Tags</h2>
                    <a href="404.html">Business</a>
                    <a href="404.html">Domain</a>
                    <a href="404.html">keywords</a>
                    <a href="404.html">SEA</a>
                    <a href="404.html">Search Engine</a>
                    <a href="404.html">Work</a>
                    <a href="404.html">SEm</a>
                    <a href="404.html">Trnds</a>
                    <a href="404.html">SEA</a>
                </div>
                <!--// Widget Top Tags \\-->

            </aside>
            <!--// Sidebar \\-->
        </div>
    </div>
</div>
<!--// Main Section \\-->
    </div>
    <!--// Main Content \\-->

<?php include "includes/footer.php"?>