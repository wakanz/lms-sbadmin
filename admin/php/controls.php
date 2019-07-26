<?php

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

global $db;

function createAuthor()
{
    global $db;
    if (isset($_POST['a-submit'])) {

        $author_name = $_POST['name'];


        $sql = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
        //echo $sql->affectedRows();

    } else {
        return "required fields are missing";
    }


    $db->close();
}

function getEdit()
{

}

function getAuthor()
{

}

function delAuthor()
{

}

function createSection()
{
    global $db;
    if (isset($_POST['s-submit'])) {

        $author_name = $_POST['name'];


        $sql = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
        //echo $sql->affectedRows();

    } else {
        return "required fields are missing";
    }


    $db->close();

}

function getSection()
{

}

function delSection()
{

}

function createBook()
{
    global $db;

    if(isset($_POST['submit']))
    {

        $book_name            =           $_POST['name'];
        $book_isbn            =           $_POST['isbn'];
        $book_description     =           $_POST['desc'];
        $publish_date         =           date('Y-m-d', strtotime(str_replace('-', '/', $_POST['p_date'])));
        $book_qty             =           $_POST['qty'];
        $book_author          =           $_POST['author'];
        $book_section         =           $_POST['section'];
        $book_location        =           $_POST['loc'];





        $sql = $db->query("INSERT INTO books (book_name,book_isbn,book_description,publish_date,book_qty,book_author,book_section,book_location) VALUES ('$book_name','$book_isbn','$book_description','$publish_date','$book_qty','$book_author','$book_section','$book_location')");
        //echo $sql->affectedRows();

    }else{
        return "required fields are missing";
    }

    $db->close();
}

function getBooks()
{

}

function delBook(){

}


?>