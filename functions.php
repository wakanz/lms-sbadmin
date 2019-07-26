<?php
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            BOOKS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

// Book Add
function addBook()
{
global $db;

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


        }
    }
        echo "Book Successfully Added";

}

// Book Edit
function editBook()
{
    global $db;
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
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $newname = $target . $newfilename;
    $img_type = pathinfo($newname, PATHINFO_EXTENSION);
    if ($img_type != 'jpg' && $img_type != 'JPG' && $img_type != 'png' && $img_type != 'PNG') {
        $message = "Please ensure you are entering an image";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
            $sql = $db->query("UPDATE books set book_name='$book_name',book_isbn='$book_isbn',book_description='$book_description',publish_date='$publish_date',book_qty='$book_qty',book_image='$$newfilename',book_author='$book_author',book_section='$book_section',book_location='$book_location' where book_id='$id'");

            if ($sql) {
                $message = "Book Edited Successfully.";
            } else {
                $message = "upload failed1";
            }
        } else {
            $message = "upload failed";
        }
    }
}


// Book Delete
function delBook(){
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM books where book_id='$id'");

    if($sql)
    {
        echo
        "
           Hello
        ";
    }

}



/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            E-BOOKs
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


// Book Add
function addEbook()
{
    global $db;
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

            if ($sql) {
                $message = "Book Added Successfully";
            } else {
                $message = "upload failed1";
            }
        } else {
            $message = "upload failed";
        }
    }
}

// E-Book Edit
function editEbook()
{
    global $db;
    //Handle file upload

        $book_name            =           $_POST['name'];
        $book_isbn            =           $_POST['isbn'];
        $book_description     =           $_POST['desc'];
        $publish_date         =           date('Y-m-d', strtotime(str_replace('-', '/', $_POST['p_date'])));
        $book_author          =           $_POST['author'];
        $book_section         =           $_POST['section'];
        $book_location        =           $_POST['loc'];
        $target = ROOT_PATH ."assets/upload/cover/";
        $target2 = ROOT_PATH ."assets/upload/ebook/";
        $imgname = explode(".", $_FILES["file"]["name"]);
        $newimgname = round(microtime(true)) . '.' . end($imgname);
        $bookname = explode(".", $_FILES["file"]["name"]);
        $newbookname = round(microtime(true)) . '.' . end($bookname);
        $newname = $target.$newimgname;
        $newname2 = $target2.$newbookname;
        $img_type = pathinfo($newname,PATHINFO_EXTENSION);
        $book_type = pathinfo($newname2,PATHINFO_EXTENSION);
        if($img_type!='jpg' && $img_type!='JPG' && $img_type!='png' && $img_type!='PNG'){
            $message="Please ensure you are entering an image";
        }else{
            if($book_type != 'pdf'){
                $message="books must be uploaded in pdf format";
            }else{
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname)) {
                    if(move_uploaded_file($_FILES["book"]["tmp_name"], $newname2));{
                        //$sql = "INSERT INTO books (Title, Author, pathtopdf, pathtoimage) VALUES ('$title', '$author', '$bookname', '$imgname')";
                        $sql = $db->query("INSERT INTO ebooks (book_name,book_isbn,book_description,publish_date,ebook_image,ebook_file,book_author,book_section,book_location) VALUES ('$book_name','$book_isbn','$book_description','$publish_date','$newimgname','$newbookname','$book_author','$book_section','$book_location')");
                        if($sql){
                            $message = "upload successful";
                        }else{
                            $message = "upload failed1";
                        }
                    }
                }else{
                    $message = "upload failed";
                }

            }
        }
    }


// Book Delete
function delEbook(){
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM ebooks where ebook_id='$id'");

    if($sql)
    {
        echo
        "
           Hello
        ";
    }

}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            AUTHOR
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


function authorAdd()
{
    global $db;
    $author_name = $_POST['name'];


    $sql = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
    //echo $sql->affectedRows();

}

function authorEdit()
{
    global $db;
    $id = $_POST['author_id'];

    $author_name            =           $_POST['name'];

    $sql = $db->query("UPDATE authors set author_name='$author_name' where author_id='$id'");
    //echo $sql->affectedRows();
}

function authorDel()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM authors where author_id='$id'");
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


function locAdd()
{
    global $db;
    $location_name = $_POST['name'];


    $sql = $db->query("INSERT INTO locations (location_name) VALUES ('$location_name')");

}

function locEdit()
{
    global $db;
    $id = $_POST['location_id'];

    $location_name            =           $_POST['name'];

    $sql = $db->query("UPDATE locations set location_name='$location_name' where location_id='$id'");
}

function locDel()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM locations where location_id='$id'");
}


/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            SECTION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function secAdd()
{
    global $db;
    $section_name = $_POST['name'];

    $sql = $db->query("INSERT INTO sections (section_name) VALUES ('$section_name')");

}

function secEdit()
{
    global $db;
    $id = $_POST['section_id'];

    $section_name            =           $_POST['name'];

    $sql = $db->query("UPDATE sections set section_name='$section_name' where section_id='$id'");
}

function secDel()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("DELETE FROM sections where section_id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            FINE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function fineSet()
{
    global $db;
    $fine = $_POST['fine'];

    $sql = $db->query("UPDATE settings SET fine = '$fine'");
}

function finePay()
{
    global $db;
    $id = $_GET['id'];

    $sql = $db->query("UPDATE fines set status = 0 where borrow_id='$id'");
}
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
HEADER
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            LOCATION
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


