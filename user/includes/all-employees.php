<h1 class="margin-tb-2r">All Employees</h1>
<div class="list-container">


    <div class="list-table">
        <table class="table-collapse">
            <tr>
                <th class="id">Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>More</th>
            </tr>
            <?php
            $selectAllUsers = selectAllUsers();
            confirmQuery($selectAllUsers);
            if ($selectAllUsers->num_rows == 0) {

                echo "<tr><td colspan='4'>No employees yet</th></tr>";
            }
            while ($row = mysqli_fetch_assoc($selectAllUsers)) {
                $user_id = $row["user_id"];
                $user_firstName = $row["user_firstName"];
                $user_lastName = $row["user_lastName"];

            ?>
                <tr>
                    <td><?php echo $user_id; ?></th>
                    <td><?php echo $user_firstName; ?></th>
                    <td><?php echo $user_lastName; ?></th>

                    <td><a href="index.php?source=view-employee&user_id=<?php echo $user_id; ?>">View details</a></td>
                </tr>




            <?php } ?>
        </table>
    </div>

</div>