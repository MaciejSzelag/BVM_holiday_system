<div class="confirmation-wrap">
    <div class="con-wrap">

        <?php
        if (isset($_POST["add_employee"])) {
            $user_firstName = $_POST["firstName"];
            $user_lastName = $_POST["lastName"];
            $password = $_POST["password"];
            $re_password = $_POST["re-password"];
            $username = $_POST["username"];
            $annual_days = $_POST["annual_days"];
            $user_position = $_POST["position"];


            $user_firstName = mysqli_real_escape_string($connection, $user_firstName);
            $user_lastName = mysqli_real_escape_string($connection, $user_lastName);
            $password = mysqli_real_escape_string($connection, $password);
            $re_password = mysqli_real_escape_string($connection, $re_password);
            $username = mysqli_real_escape_string($connection, $username);
            $annual_days = mysqli_real_escape_string($connection, $annual_days);
            $user_position = mysqli_real_escape_string($connection, $user_position);



            if ($password === $re_password) {
                $query = "SELECT randSalt FROM users";
                $select_randSalt = mysqli_query($connection, $query);

                $user_row = mysqli_fetch_array($select_randSalt);
                $salt = $user_row["randSalt"];
                $password = crypt($password, $query);
                if (!$select_randSalt) {
                    die("QUERY FAILED ." . mysqli_error($connection));
                }

                if (!empty($user_firstName) && !empty($user_lastName) && !empty($password) && !empty($re_password) && !empty($username)) {
                    $query = "SELECT randSalt FROM users WHERE username = '$username'";
                    $select_username = mysqli_query($connection, $query);
                    if ($select_username->num_rows > 0) {

                        echo "<h1>Username exist. You have to choose another one</h1> ";
                    } else {
                        $query = "INSERT INTO users(user_FirstName, user_lastName, username, user_password, user_position, 	user_annual_days) VALUES('$user_firstName','$user_lastName','$username','$password','$user_position', '$annual_days')";
                        $insert_new_record = mysqli_query($connection, $query);
                        if (!$insert_new_record) {
                            die("QUERY FAILED ." . mysqli_error($connection));
                        } else {
                            $message = "Employee has been added successfully";
                            $btn_1 = "index.php?source=add-user";
                            $btn_2 = "../user/";
                            include  "includes/confirmation.php";
                        }
                    }
                }
            }
        }
        ?>
   

    </div>

</div>