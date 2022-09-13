<?php
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $selectUserWhereId = selectUserWhereId($user_id);
    confirmQuery($selectUserWhereId);
    $row = mysqli_fetch_assoc($selectUserWhereId);
    $user_id = $row["user_id"];
    $user_firstName = $row["user_firstName"];
    $user_lastName = $row["user_lastName"];
    $username = $row["username"];
    $user_role = $row["user_position"];
    $user_annual_days = $row["user_annual_days"];

?>
    <div class="pop-confirm">
        <div class="delete-position-wrap">
            <p>Are you sure?</p>
            <div class="btn-group"> <button class="btn-warning"><a href="index.php?source=view-employee&delete_user_id=<?php echo $user_id; ?>">Confirm</a></button> <button class="btn" id="cancel">Cancel</button></div>


        </div>
    </div>
    <h1 class="margin-tb-2">Employee's details</h1>

    <div class="list-container">

        <div class="list-table">
            <table class="table-2">



                <tr>
                    <th>Position</th>
                    <td><?php switch ($user_role) {
                            case "1";
                                echo "Operator";
                                break;
                            case "2";
                                echo "Supervisor";
                                break;
                            case "3";
                                echo "Manager";
                                break;
                        } ?></td>
                </tr>
                <tr>
                    <th>Name </th>
                    <td><?php echo $user_firstName; ?></td>
                </tr>
                <tr>
                    <th>Surname </th>
                    <td><?php echo $user_lastName; ?></td>
                </tr>
                <tr>
                    <th>Login</th>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <th>Holiday Annual Entitlement:</th>
                    <td><?php echo $user_annual_days; ?></td>
                </tr>
                <!-- for managment -->
                <tr>
                    <td colspan="2"><a href="index.php?source=update-form&set-password-id=<?php echo $user_id; ?>">Set a new password</a></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="index.php?source=update-form&update-login-id=<?php echo $user_id; ?>">Change login</a></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="index.php?source=update-form&update-days-id=<?php echo $user_id; ?>">Update Annual Entitlement</a></td>
                </tr>
                <tr>
                    <td colspan=" 2" id="delete-user" class="warning">Delete employee</td>
                </tr>
                <!-- for managment -->

            </table>
        </div>

    </div> <?php   } ?>





<?php
if (isset($_GET["delete_user_id"])) {
    $user_id = $_GET['delete_user_id'];
    deletePosition("users", "user_id", $user_id);

    $message = "Employee has been deleted";
    $btn_1 = "index.php?source=all-employees";
    $btn_2 = "index.php/";
    include  "includes/confirmation.php";
}
?>
<script src="js/script.js"></script>