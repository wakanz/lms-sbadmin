<?php

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$day = 0;

"SELECT * FROM borrow";


$result = $db->query($query);

/* associative array */
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $d = strtotime($row['due_date']);
        $c = strtotime(date("Y-m-d"));
        $diff = $c - $d;

        if ($diff >= 0) {
            $day = $day + floor($diff / (60 * 60 * 24));
        } //Days

        $fine = $day * 100;
    }
}


function fines()
{
    global $db;

    $fines = "SELECT * FROM settings";


    $result = $db->query($fines);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $do_not_take_fine = 0;
            $borrow_id = $row{'borrow_id'};
            $date_in = strtotime($row{'date_in'});
            $due_date = strtotime($row{'due_date'});

            $days_diff = $date_in - $due_date;
            $days_past_due_date = floor($days_diff / (60 * 60 * 24));

            if ($days_past_due_date > 0 || $row{'date_in'} == '0000-00-00') {
                //book is returned after due date, charge fine
                //Fine Computation :-
                $current_date = time();
                $future_due_diff = $current_date - $due_date;
                $future_due = floor($future_due_diff / (60 * 60 * 24));

                if ($days_past_due_date > 0 || $row{'date_in'} == '0000-00-00') {
                    //book is returned after due date, charge fine
                    //Fine Computation :-
                    $current_date = time();
                    $future_due_diff = $current_date - $due_date;
                    $future_due = floor($future_due_diff / (60 * 60 * 24));


                    if ($row{'date_in'} == '0000-00-00' && $future_due > 0) {
                        // if book is not returned till today's date, and due date has passed
                        $diff = $current_date - $due_date;
                    } elseif ($row{'date_in'} != '0000-00-00') {
                        // if book is returned but delayed from its due date
                        $diff = $date_in - $due_date;
                    } else {
                        //if book is not returned till today, but due date has still not passed
                        //do nothing
                        $do_not_take_fine++;
                    }

                    $paid = 0;
                    $date_diff = floor($diff / (60 * 60 * 24));
                    $fine_amt = $date_diff * 0.25;
                    $result = $db->query("SELECT * FROM fines WHERE borrow_id = $borrow_id");
                    // checking if this loan id is already there in fines table
                    if ($row1 = mysqli_fetch_array($result)) {
                        // Already paid the fine. do nothing
                        // if not paid fine then update the fine table with new fine_amt
                        if ($row1{'status'} == 0 && $do_not_take_fine == 0) {
                            $result3 = $db->query("UPDATE fine SET fine_ammount = $fine_amt WHERE borrow_id = $borrow_id");
                        }
                    } else {
                        // this loan id is not present in fines table, it's a new entry, so use insert command
                        if ($do_not_take_fine == 0)
                            $result3 = $db->query("INSERT INTO fines VALUES($borrow_id, $fine_amt, $paid);");
                    }
                }
                // else Borrower has returned by the due date so no charge is to be fined on the borrower.
            }
            echo "<br><br><br><br> Fines table is updated successfully !!!";
        }









        }
    }












?>