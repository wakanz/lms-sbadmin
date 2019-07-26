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
    $imgname = basename($_FILES["image"]["name"]);
    $bookname = basename($_FILES["book"]["name"]);
    $newname = $target.basename($_FILES["image"]["name"]);
    $newname2 = $target2.basename($_FILES["book"]["name"]);
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
                    $sql = $db->query("UPDATE  ebooks SET book_name = '$book_name',book_isbn = '$book_isbn',book_description = '$book_description',publish_date = '$publish_date',ebook_image = '$imgname',ebook_file = '$bookname',book_author = '$book_author',book_section = '$book_section',book_location = '$book_location'");

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
else{
    $message="";
    $title="";
}


header('location: ../ebook_list.php');


//die(mysqli_error($db));

$db->close();
