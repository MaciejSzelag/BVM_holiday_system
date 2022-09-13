<?php
function btnBack($userId)
{
    echo         '<a href="index.php?source=view-employee&user_id=' . $userId  . '">Back</a>';
}
?>

<?php
if (isset($_GET["update-days-id"])) {
    $userId = $_GET["update-days-id"];
    $user = selectUserWhereId($userId);

    $row = mysqli_fetch_assoc($user);
    $user_id = $row["user_id"];
    $name = $row["user_firstName"];
    $surname = $row["user_lastName"];
    $actualNumberOfHolidays = $row["user_annual_days"];

?>
    <div class="request-form">
        <div class="cover"></div>
        <form action="" method="post">
            <div class="input-group">
                <h1 class="margin-tb-3 size-2">Update holidays</h1>
            </div>
            <div class="input-group">
                <input type="text" name="firstName" value="<?php echo  $name . ' ' . $surname; ?>" readonly>
            </div>
            <div class="input-group">
                <label for="">Number of holidays</label>
                <div class="input-number">
                    <select name="annual_days" id="" required>
                        <option value="">Set a new value</option>
                        <option value=""><?php echo  $actualNumberOfHolidays; ?></option>
                        <?php
                        for ($i = 1; $i <= 32; $i++) {
                        ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <input type="submit" name="update_days" value="Save">
                <?php btnBack($userId); ?>
            </div>
        </form>
    </div>
<?php } ?>

<?php function updateUserOneValue($updatedColumn, $updated_value, $userId)
{
    global $connection;
    $query = "UPDATE users SET $updatedColumn = '$updated_value' WHERE user_id = $userId ";
    $update_query = mysqli_query($connection, $query);
    confirmQuery($update_query);
    // header("location: index.php?source=view-employee&user_id=$userId");
}

?>
<?php
if (isset($_POST["update_days"])) {
    $updated_value = $_POST["annual_days"];
    updateUserOneValue("user_annual_days", $updated_value, $userId);

    $message = "A new annual entitlement has been changed successfully";
    $btn_1 = "index.php?source=view-employee&user_id=" . $userId;
    $btn_2 = "../user/";
    include  "includes/confirmation.php";
}



?>

<?php
if (isset($_GET["update-login-id"])) {
    $userId = $_GET["update-login-id"];
    $user = selectUserWhereId($userId);
    $row = mysqli_fetch_assoc($user);
    $user_id = $row["user_id"];
    $name = $row["user_firstName"];
    $surname = $row["user_lastName"];
    $actualNumberOfHolidays = $row["user_annual_days"];

?>
    <div class="request-form">
        <div class="cover"></div>
        <form action="" method="post">
            <div class="input-group">
                <h1 class="margin-tb-3 size-2">Change login</h1>
            </div>
            <div class="input-group">
                <input type="text" value="<?php echo  $name . ' ' . $surname; ?>" readonly>
            </div>
            <div class="input-group">
                <label for="">Set a new login</label>
                <div class="input-number">
                    <select name="username" required>
                        <?php
                        for ($i = 1; $i <= 50; $i++) {
                            $query = "SELECT * FROM users WHERE username = $i";
                            $select_username = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($select_username);
                            $name = $row["user_firstName"];
                            $surname = $row["user_lastName"];
                            if ($select_username->num_rows > 0) {
                        ?>
                                <option class="exist" value="<?php echo $i ?>" disabled><?php echo $i . " - " . $name  . " " .  $surname; ?></option>
                            <?php } else {
                            ?>
                                <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <input type="submit" name="update_login" value="Save">
                <?php btnBack($userId); ?>
            </div>
        </form>
    </div>
<?php } ?>


<?php
if (isset($_POST["update_login"])) {
    $updated_value = $_POST["username"];
    updateUserOneValue("username", $updated_value, $userId);

    $message = "A new login has been changed successfully";
    $btn_1 = "index.php?source=view-employee&user_id=" . $userId;
    $btn_2 = "../user/";
    include  "includes/confirmation.php";
}
?>
<?php
if (isset($_GET["set-password-id"])) {
    $userId = $_GET["set-password-id"];
    $user = selectUserWhereId($userId);
    $row = mysqli_fetch_assoc($user);
    $user_id = $row["user_id"];
    $name = $row["user_firstName"];
    $surname = $row["user_lastName"];


?>
    <div class="request-form">
        <div class="cover"></div>
        <form action="" method="post">
            <div class="input-group">
                <h1 class="margin-tb-3 size-2">Set a new password for</h1>
            </div>
            <div class="input-group">
                <input type="text" name="firstName" value="<?php echo  $name . ' ' . $surname; ?>" readonly>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="set a new password" required>
            </div>
            <div class="input-group">
                <input type="password" name="re-password" placeholder="Repeat a new password" required>
            </div>
            <div class="input-group">
                <input type="submit" name="save-password" value="Save">
                <?php btnBack($userId); ?>
            </div>
        </form>
    </div>
<?php } ?>


<?php
if (isset($_POST["save-password"])) {
    $password = $_POST["password"];
    $re_password = $_POST["re-password"];
    $password = mysqli_real_escape_string($connection, $password);
    $re_password = mysqli_real_escape_string($connection, $re_password);
    if ($password === $re_password) {
        $query = "SELECT randSalt FROM users";
        $select_randSalt = mysqli_query($connection, $query);

        $user_row = mysqli_fetch_array($select_randSalt);
        $salt = $user_row["randSalt"];
        $password = crypt($password, $query);
        if (!$select_randSalt) {
            die("QUERY FAILED ." . mysqli_error($connection));
        }

        if (!empty($password) && !empty($re_password)) {
            $query = "SELECT randSalt FROM users WHERE user_id =  $userId";
            $select_username = mysqli_query($connection, $query);

            $query = "UPDATE users SET user_password = '$password' WHERE user_id = $userId";
            $insert_new_record = mysqli_query($connection, $query);
            if (!$insert_new_record) {
                die("QUERY FAILED ." . mysqli_error($connection));
            } else {
                $message = "Password has been changed successfully";
                $btn_1 = "index.php?source=view-employee&user_id=" . $userId;
                $btn_2 = "../user/";
                include  "includes/confirmation.php";
            }
        }
    }
}
?>