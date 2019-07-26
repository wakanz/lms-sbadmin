<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");







if(isset($_POST['submit']))
{

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



    header('location: ../ebook_add.php');


//die(mysqli_error($db));

$db->close();