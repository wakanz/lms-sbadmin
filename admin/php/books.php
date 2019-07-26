<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$action = $_POST["action"];
if(!empty($action)) {
    switch($action) {
//        case "add":
//            $query = "INSERT INTO comment(message) VALUES('".$_POST["txtmessage"]."')";
//            $insert_id = $db_handle->insert($query);
//            if($insert_id){
//                echo '<div class="message-box"  id="message_' . $insert_id . '">
//						<div>
//						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $insert_id . ')">Edit</button>
//<button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $insert_id . ')">Delete</button>
//						</div>
//						<div class="message-content">' . $_POST["txtmessage"] . '</div></div>';
//            }
//            break;
//
//        case "edit":
//            $query = "UPDATE comment set message = '".$_POST["txtmessage"]."' WHERE  id=".$_POST["message_id"];
//            $result = $db_handle->execute($query);
//            if($result){
//                echo $_POST["txtmessage"];
//            }
//            break;

        case "delete":
            $id = $_GET['id'];

            $sql = $db->query("DELETE FROM books where book_id='$id'");
            break;
    }
}