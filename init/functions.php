<?php
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            BOOKS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

// Book Add
function addBook()
{
global $db;
    if(isset($_POST['addbook'])) {
    $book_name = $_POST['name'];
    $book_isbn = $_POST['isbn'];
    $book_description = $_POST['desc'];
    $publish_date = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['p_date'])));
    $book_qty = $_POST['qty'];
    $book_author = $_POST['author'];
    $book_section = $_POST['section'];
    $book_location = $_POST['loc'];
    $target = ROOT_PATH . "assets/upload/cover/";
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $newname = $target . $newfilename;
    $img_type = pathinfo($newname, PATHINFO_EXTENSION);
    if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
        $message = "Please ensure you are entering an image";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
            $sql = $db->query("INSERT INTO books (book_name,book_isbn,book_description,publish_date,book_qty,book_image,book_author,book_section,book_location) VALUES ('$book_name','$book_isbn','$book_description','$publish_date','$book_qty','$newfilename','$book_author','$book_section','$book_location')");

                if ($sql)
                {
                    echo '<div class="alert alert-success" role="alert">Book Added Successfully.</div>';
                }

        }
    }

    }
}

// Book Edit
function editBook()
{
    global $db;
    if (isset($_POST['submit'])) {
        $id = $_POST['book_id'];
        $book_name = $_POST['name'];
        $book_isbn = $_POST['isbn'];
        $book_description = $_POST['desc'];
        $publish_date = $_POST['p_date'];
        $book_qty = $_POST['qty'];
        $book_author = $_POST['author'];
        $book_section = $_POST['section'];
        $book_location = $_POST['loc'];
        $target = ROOT_PATH . "assets/upload/cover/";
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $newname = $target . $newfilename;
        $img_type = pathinfo($newname, PATHINFO_EXTENSION);
        if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
            $message = "Please ensure you are entering an image";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
                $sql = $db->query("UPDATE books set book_name='$book_name',book_isbn='$book_isbn',book_description='$book_description',publish_date='$publish_date',book_qty='$book_qty',book_image='$$newfilename',book_author='$book_author',book_section='$book_section',book_location='$book_location' WHERE book_id='$id'");

                if ($sql)
                {
                    echo '<div class="alert alert-success" role="alert">Book Edited Successfully.</div>';
                }else
                {
                    echo '<div class="alert alert-success" role="alert">Error Editing Book.</div>';
                }
            }
        }

    }
}


// Book Delete
function delBook(){
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM books where book_id='$id'");


    echo '<div class="alert alert-success" role="alert">Book Deleted Successfully.</div>';

}

function bookReserve()
{
 if (isset($_GET['bid']))
 {
     global $db;
     $book_id = $_GET['bid'];
     $user_id = $_SESSION['id'];


     $sql = $db->query("INSERT INTO reserved (book_id,book_type,user_id,r_date,status) VALUES ('$book_id',1,'$user_id',now(), '0')");
     $Id = $db->insert_id;
     $sql .= $db->query("INSERT INTO borrow (book_id,book_type,user_id,reserve_id,status) VALUES ('$book_id',1,'$user_id', '$Id', '2')");

     if ($sql == TRUE) {

         $books = $db->query("SELECT * FROM books WHERE book_id = '$book_id'");

         while ($row = mysqli_fetch_assoc($books)) {
             $n = ucfirst($_SESSION['name'] . ' ' . 'Reserved' . ' ' . $row['book_name']);
             $sql = $db->query("INSERT INTO notifications (user_id,notification) VALUES ('$user_id', '$n')");
         }
         echo '<div class="alert alert-success" role="alert">Book Reserved Successfully.</div>';
     }
 }
}

function userdelReserved()
{
    global $db;
    if (isset($_GET['bid']))
    {
        $id = $_GET['id'];

        $sql = $db->query("DELETE FROM reserved where reserve_id='$id'");
        $sql .= $db->query("DELETE FROM borrow where reserve_id='$id'");
    }
}

function ebookReserve()
{
    if (isset($_GET['bid']))
    {
        global $db;
        $book_id = $_GET['id'];
        $user_id = $_SESSION['id'];


        $sql = $db->query("INSERT INTO reserved (book_id,book_type,user_id,r_date,status) VALUES ('$book_id',1,'$user_id',now(), '0')");
        $Id = $db->insert_id;
        $sql .= $db->query("INSERT INTO borrow (book_id,book_type,user_id,reserve_id,status) VALUES ('$book_id',1,'$user_id', '$Id', '2')");

        if ($sql == TRUE) {

            $books = $db->query("SELECT * FROM ebooks WHERE book_id = '$book_id'");

            while ($row = mysqli_fetch_assoc($books)) {
                $n = ucfirst($_SESSION['name'] . ' ' . 'Reserved' . ' ' . $row['book_name']);
                $sql = $db->query("INSERT INTO notifications (user_id,notification) VALUES ('$user_id', '$n')");
            }
            echo '<div class="alert alert-success" role="alert">E-Book Reserved Successfully.</div>';
        }
    }
}

function delEbookReserved()
{
    global $db;
    if (isset($_GET['bid']))
    {
        $id = $_GET['bid'];

        $sql = $db->query("DELETE FROM reserved where reserve_id='$id'");
        $sql .= $db->query("DELETE FROM borrow where reserve_id='$id'");
    }
}



/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            E-BOOKs
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


// E-Book Add
function addEbook()
{
    global $db;
    if(isset($_POST['submit'])) {
        $book_name = $_POST['name'];
        $book_isbn = $_POST['isbn'];
        $book_description = $_POST['desc'];
        $publish_date = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['p_date'])));
        $book_author = $_POST['author'];
        $book_section = $_POST['section'];
        $book_location = $_POST['loc'];
        $target = ROOT_PATH . "assets/upload/cover/";
        $target2 = ROOT_PATH . "assets/upload/ebook/";
        $imgname = explode(".", $_FILES["image"]["name"]);
        explode(".", $_FILES["image"]["name"]);
        $bookname = explode(".", $_FILES["book"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($imgname);
        $newfilename1 = round(microtime(true)) . '.' . end($bookname);
        $newname = $target . $newfilename;
        $newname2 = $target2 . $newfilename1;
        $img_type = pathinfo($newname, PATHINFO_EXTENSION);
        $book_type = pathinfo($newname2, PATHINFO_EXTENSION);
        if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
            $message = "Please ensure you are entering an image";
        } else {
            if ($book_type != 'pdf') {
                $message = "books must be uploaded in pdf format";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
                    if (move_uploaded_file($_FILES["book"]["tmp_name"], $newname2)) ;
                    {
                        $sql = $db->query("INSERT INTO ebooks (book_name,book_isbn,book_description,publish_date,ebook_image,ebook_file,book_author,book_section,book_location) VALUES ('$book_name','$book_isbn','$book_description','$publish_date','$newfilename','$newfilename1','$book_author','$book_section','$book_location')");

                        if ($sql){
                            echo '<div class="alert alert-success" role="alert">E-Book Added Successfully.</div>';
                        }
                    }
                }

            }
        }
    }
}

// E-Book Edit
function editEbook()
{
    global $db;
    //Handle file upload
    if(isset($_POST['submit'])) {
        $book_name = $_POST['name'];
        $book_isbn = $_POST['isbn'];
        $book_description = $_POST['desc'];
        $publish_date = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['p_date'])));
        $book_author = $_POST['author'];
        $book_section = $_POST['section'];
        $book_location = $_POST['loc'];
        $target = ROOT_PATH . "assets/upload/cover/";
        $target2 = ROOT_PATH . "assets/upload/ebook/";
        $imgname = explode(".", $_FILES["file"]["name"]);
        $newimgname = round(microtime(true)) . '.' . end($imgname);
        $bookname = explode(".", $_FILES["file"]["name"]);
        $newbookname = round(microtime(true)) . '.' . end($bookname);
        $newname = $target . $newimgname;
        $newname2 = $target2 . $newbookname;
        $img_type = pathinfo($newname, PATHINFO_EXTENSION);
        $book_type = pathinfo($newname2, PATHINFO_EXTENSION);
        if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
            $message = "Please ensure you are entering an image";
        } else {
            if ($book_type != 'pdf') {
                $message = "books must be uploaded in pdf format";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
                    if (move_uploaded_file($_FILES["book"]["tmp_name"], $newname2)) ;
                    {
                        $sql = $db->query("UPDATE  ebooks SET book_name = '$book_name',book_isbn = '$book_isbn',book_description = '$book_description',publish_date = '$publish_date',ebook_image = '$newimgname',ebook_file = '$newbookname',book_author = '$book_author',book_section = '$book_section',book_location = '$book_location'");

                    }
                }

            }
            echo '<div class="alert alert-success" role="alert">E-Book Edited Successfully.</div>';
        }
    }
    header('location: book_list.php');
    }


// Book Delete
function delEbook(){
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM ebooks where ebook_id='$id'");

    if($sql)
    {
        echo '<div class="alert alert-success" role="alert">E-Book Deleted Successfully.</div>';
    }

}

function reserveEbook(){
    global $db;
    $book_id = $_GET['id'];
    $user_id = $_SESSION['id'];


    $sql = $db->query("INSERT INTO reserved (book_id,book_type,user_id,r_date,status) VALUES ('$book_id',2,'$user_id',now(), '0')");
    $Id = $db->insert_id;
    $sql .= $db->query("INSERT INTO borrow (book_id,book_type,user_id,reserve_id,status) VALUES ('$book_id',2,'$user_id', '$Id', '2')");

    if($sql)
    {
        echo '<div class="alert alert-success" role="alert">E-Book Reserved Successfully.</div>';
    }
}

function delReservedBook(){
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM reserved where reserve_id='$id'");
    $sql .= $db->query("DELETE FROM borrow where reserve_id='$id'");
    if($sql)
    {
        echo '<div class="alert alert-success" role="alert">Reserved E-Book Deleted Successfully.</div>';
    }
}


/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            AUTHOR
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


function addAuthor()
{
    global $db;
    if(isset($_POST['submit'])) {
        $author_name = $_POST['name'];


        $sql = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
        if ($sql)
        {
            echo '<div class="alert alert-success" role="alert">Author Added Successfully.</div>';
        }
    }

}

function editAuthor()
{
    global $db;
    $id = $_POST['author_id'];

    $author_name            =           $_POST['name'];

    $sql = $db->query("UPDATE authors set author_name='$author_name' where author_id='$id'");
    if ($sql)
    {
        echo '<div class="alert alert-success" role="alert">Author Edited Successfully.</div>';
        header('location: author_list.php');
    }
}

function delAuthor()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM authors where author_id='$id'");
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


function addLocation()
{
    global $db;
    $location_name = $_POST['name'];


    $sql = $db->query("INSERT INTO locations (location_name) VALUES ('$location_name')");

}

function editLocation()
{
    global $db;
    $id = $_POST['location_id'];

    $location_name            =           $_POST['name'];

    $sql = $db->query("UPDATE locations set location_name='$location_name' where location_id='$id'");
}

function delLocation()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM locations where location_id='$id'");
}


/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            SECTION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function addSection()
{
    global $db;
    $section_name = $_POST['name'];

    $sql = $db->query("INSERT INTO sections (section_name) VALUES ('$section_name')");

}

function editSection()
{
    global $db;
    $id = $_POST['section_id'];

    $section_name            =           $_POST['name'];

    $sql = $db->query("UPDATE sections set section_name='$section_name' where section_id='$id'");
}

function delSection()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM sections where section_id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            FINE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function setFine()
{
    global $db;
    $fine = $_POST['fine'];

    $sql = $db->query("UPDATE settings SET fine = '$fine'");
}

function payFine()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("UPDATE fines set status = 0 where borrow_id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            BLOG
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function addPost()
{
    if (isset($_POST['submit'])) {
        global $db;

        //$id = $_POST['id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content = $_POST ['content'];
        $posted_by = $_POST['by'];

        $target = ROOT_PATH . "assets/upload/posts/";
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $newname = $target . $newfilename;
        $img_type = pathinfo($newname, PATHINFO_EXTENSION);
        if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
            $message = "Please ensure you are entering an image";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
                $sql = $db->query("INSERT INTO posts ( title, category, image, content, posted_by, date) VALUES('$title', '$category', '$newfilename', '$content', '$posted_by', now())");

                if ($sql)
                {
                    echo '<div class="alert alert-success" role="alert">Post Added Successfully.</div>';
                }else
                {
                    echo '<div class="alert alert-success" role="alert">Error Adding Post.</div>';
                }
            }
        }


    }
}
function delPost()
{
    global $db;

    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM posts where id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Categories
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function addCategory()
{
    global $db;
    $category_name = $_POST['name'];

    $sql = $db->query("INSERT INTO categories (category_name) VALUES ('$category_name')");

}

function editCategory()
{
    global $db;
    $id = $_POST['category_id'];

    $category_name            =           $_POST['name'];

    $sql = $db->query("UPDATE categories set category_name='$category_name' where category_id='$id'");
}

function delCategory()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM categories where category_id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


