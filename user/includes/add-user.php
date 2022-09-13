<div class="request-form">
    <div class="cover"></div>
    <form action="../user/index.php?source=checkForm" method="post">
        <div class="input-group">

            <h1 class="margin-tb-3 size-2">Add a new employee</h1>
        </div>
        <div class="input-group">
            <input type="text" name="firstName" placeholder="Employee name" required>
        </div>
        <div class="input-group">
            <input type="text" name="lastName" placeholder="Employee surname" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Set password" required>
        </div>
        <div class="input-group">
            <input type="password" name="re-password" placeholder="Re-password" required>
        </div>
        <div class="input-group">
            <label for="">Set username</label>
            <div class="input-number">
                <select name="username" id="" required>
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                        $query = "SELECT * FROM users WHERE username = $i";
                        $select_username = mysqli_query($connection, $query);
                        if ($select_username->num_rows > 0) {
                    ?>
                            <option class="exist" value="<?php echo $i ?>" disabled><?php echo $i; ?></option>
                        <?php } else {
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <label for="">Number of holidays</label>
            <div class="input-number">
                <select name="annual_days" id="" required>
                    <?php
                    for ($i = 1; $i <= 32; $i++) {
                    ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="">Position</label>
            <div class="input-number">
                <select name="position" id="" required>
                    <option value="1">Employee</option>
                    <option value="2">Supervisor</option>
                    <option value="3">Manager</option>
                </select>
            </div>

        </div>


        <div class="input-group">
            <input type="submit" name="add_employee" value="Submit">
            <input type="Reset" value="Reset">
        </div>
    </form>
</div>