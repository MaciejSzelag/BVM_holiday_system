<?php

function confirmQuery($mysqliQuery)
{
    global $connection;
    if (!$mysqliQuery) {
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}
function selectAllUsers()
{
    global $connection;
    $query = "SELECT * FROM users";
    $selectAllUsers = mysqli_query($connection, $query);
    return $selectAllUsers;
}
function selectUserWhereId($userId)
{
    global $connection;
    $query = "SELECT * FROM users Where user_id = $userId";
    $selectAllUsers = mysqli_query($connection, $query);
    return $selectAllUsers;
}

function deletePosition($table_name, $column, $id)
{
    global $connection;
    $query = "DELETE FROM $table_name WHERE $column = $id ";
    $delete_query = mysqli_query($connection, $query);
    return $delete_query;
}
function countWorkinDays($date_1, $date_2)
{
    // Calculating difference between days minus wekends
    $start = new DateTime($date_1);
    $end = new DateTime($date_2);


    $end->modify('+1 day');

    $interval = $end->diff($start);
    // total days
    $days = $interval->days;
    // create an iterateable period of date (P1D equates to 1 day)
    $period = new DatePeriod($start, new DateInterval('P1D'), $end);
    foreach ($period as $dt) {
        $curr = $dt->format('D');

        // substract if Saturday or Sunday
        if ($curr == 'Sat' || $curr == 'Sun') {
            $days--;
        }
    }
    return $days;
}
