<?php include "includes/navbar.php"; ?>
<!--// Main Content \\-->
<div class="ereaders-main-content">

    <!--// Main Section \\-->
    <div class="ereaders-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    $user = $_SESSION['id'];
                    $id=$_GET['id'];        // Collecting data from query string
                    if(!is_numeric($id)){ // Checking data it is a number or not
                        echo "Data Error";
                        exit;
                    }

                    $query = $db->query("select * from posts where id= '$id'");

                    /* associative array */
                    if ($query->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>
                    <figure>
                        <a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>">
                            <img class="p-image" src="<?php echo BASE_URL;?>assets/upload/posts/<?php echo $row["image"]; ?>" alt="">
                        </a>
                    </figure>
                    <div class="ereaders-blog-grid-text">
                        <span><?php echo $row['category'];?></span>
                        <h2><?php echo $row['title'];?></h2> <br>
                    <div class="ereaders-rich-editor">
                        <p><?php echo $row['content'];?> </p>
                         </div>
                    </div>




                    <h2 class="ereaders-section-heading">Related Blog Post</h2>
                    <div class="ereaders-blog ereaders-related-blog">
                        <ul class="row">
                            <?php
                            $count = 0;
                            $cat = $row['category'];
                            $query = "SELECT * FROM posts WHERE category = '$cat'";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                            $count++;
                            if($count > 3) {break;}
                            ?>
                            <li class="col-md-4">
                                <figure><a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASE_URL;?>assets/upload/posts/<?php echo $row["image"]; ?>" alt=""></a></figure>
                                <div class="ereaders-related-blog-text">
                                    <h5><a href="<?php echo USER_PATH; ?>post_view.php?id=<?php echo $row['id']; ?>"><?php echo $row["title"]; ?></a></h5>
                                    <ul class="ereaders-blog-option">
                                        <li><?php $row["title"]; ?></li>
                                        <li> Comments 32</li>
                                    </ul>
                                    <p><?php echo substr($row['content'], 0, 100); ?> </p>
                                </div>
                            </li>
                            <?php }} }}?>
                        </ul>
                    </div>
                    <div class="comments-area">
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://lms-6.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                    </div>
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
                        <h2 class="ereaders-widget-title">Cetagories</h2>
                        <ul>
                            <li><a href="404.html">Business<span>19</span></a></li>
                            <li><a href="404.html">Technology<span>21</span></a></li>
                            <li><a href="404.html">Web Design<span>07</span></a></li>
                            <li><a href="404.html">Inspiration<span>13</span></a></li>
                            <li><a href="404.html">Photoshop<span>05</span></a></li>
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
<?php include "includes/footer.php"; ?>
