<?php include "includes/header.php"?>
<!--// Header \\-->
<header id="ereaders-header" class="ereaders-header-one">
    <div class="ereaders-main-header">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
<!--                    <a href="index.html" class="logo"><img src="images/logo.png" alt=""></a> -->
                </aside>
                <aside class="col-md-8">

                    <!--// Navigation \\-->
                    <a href="index.php#menu" class="menu-link active"><span></span></a>
                    <nav id="menu" class="menu navbar navbar-default">
                        <ul class="level-1 navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="ebooks.php">E-books</a></li>
                            <li><a href="books_reserved.php">Reserved Books</a></li>
                            <li><a href="books_borrowed.php">Issued Books</a></li>
                        </ul>
                    </nav>
                </aside>
                 <aside class="col-md-1">
                     <nav id="menu" class="menu navbar navbar-default">
                         <ul class="level-1 navbar-nav">
                             <li><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></li>
                         </ul>
                     </nav>
                 </aside>

            </div>
        </div>
    </div>
</header>
<!--// Header \\-->