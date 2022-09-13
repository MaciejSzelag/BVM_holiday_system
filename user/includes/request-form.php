<?php
if (isset($_POST["submit-request"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $day_from = $_POST["day-from"];
    $month_from = $_POST["month-from"];
    $year_from = $_POST["year-from"];
    $day_to = $_POST["day-to"];
    $month_to = $_POST["month-to"];
    $year_to = $_POST["year-to"];
    $dateForm = $day_from . $month_from . $year_from;
    $dateto = $day_to . $month_to . $year_to;
    if (!isset($_POST["paid"]) && !isset($_POST["unpaid"])) {
        $message = "You have to choose one option";
    } else {



        if (isset($_POST["paid"])) {
            $ifPaid =  $_POST["paid"];
        } else if (isset($_POST["unpaid"])) {
            $ifPaid = $_POST["unpaid"];
        }
        // echo strtotime($dateForm);
        // echo strtotime($dateto);
        echo   countWorkinDays($dateForm, $dateto);
    }
}
?>

<div class="request-form">
    <form action="" method="post">
        <div class="input-group">

            <h1 class="margin-tb-3 size-2">New Leave Request</h1>
        </div>
        <div class="input-group">
            <input type="text" name="firstName" placeholder="Your name" required>
        </div>
        <div class="input-group">
            <input type="text" name="lastName" placeholder="Surname" required>
        </div>
        <div class="input-group">
            <label for="">From</label>
            <div class="input-number">
                <select name="day-from" id="" required>
                    <?php
                    for ($day = 1; $day <= 31; $day++) {
                    ?>
                        <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                    <?php } ?>
                </select>
                <select name="month-from" id="" required>

                    <?php
                    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                    foreach ($months as $month) {
                        echo "<option value=" . $month . ">" . $month . "</option>";
                    }
                    ?>

                </select>
                <select name="year-from" id="" required>
                    <?php
                    $current_year = date("Y");
                    for ($year = $current_year; $year <= $current_year + 1; $year++) {
                    ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php
                    } ?>
                </select>
            </div>

        </div>
        <div class="input-group">
            <label for="">To</label>
            <div class="input-number">
                <select name="day-to" id="" required>
                    <?php
                    for ($day = 1; $day <= 31; $day++) {
                    ?>
                        <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                    <?php } ?>
                </select>
                <select name="month-to" id="" required>

                    <?php
                    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                    foreach ($months as $month) {
                        echo "<option value=" . $month . ">" . $month . "</option>";
                    }
                    ?>
                </select>
                <select name="year-to" id="" required>
                    <?php
                    $current_year = date("Y");
                    for ($year = $current_year; $year <= $current_year + 1; $year++) {
                    ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php
                    } ?>
                </select>
            </div>

        </div>
        <div class="input-group">
            <?php
            if (isset($message)) {
            ?>
                <span class="warning"><?php echo  $message; ?></span>
            <?php } ?>
            <div class="input-number">
                <div class="input-group">
                    <?php
                    if (isset($message)) {
                    ?>
                        <label for="" class="warning">Paid</label>
                    <?php } else { ?>
                        <label for="" class="">Paid</label>
                    <?php } ?>
                    <input type="checkbox" name="paid" value="Paid">
                </div>
                <div class="input-group">
                    <?php
                    if (isset($message)) {
                    ?>
                        <label for="" class="warning">Unpaid</label>
                    <?php } else { ?>
                        <label for="" class="">Unpaid</label>
                    <?php } ?>
                    <input type="checkbox" name="unpaid" value="Unpaid">
                </div>
            </div>

        </div>
        <div class="input-group">
            <input type="submit" name="submit-request" value="Submit">
            <input type="Reset" value="Reset">
        </div>
    </form>
</div>