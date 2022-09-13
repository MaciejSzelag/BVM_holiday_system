<?php
if (isset($_POST["update_days"])) {

    $userId = $_POST["update-days-id"];

    $id =  $userId;
    $updated_value = $_POST["annual_days"];
    $query = "UPDATE users SET user_annual_days = '$updated_value' WHERE user_id = $id ";
    $update_query = mysqli_query($connection, $query);
    confirmQuery($update_query);
}
