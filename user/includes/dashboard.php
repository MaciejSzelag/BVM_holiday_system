<div class="dash">
    <div class="dash-wrap">
        <h1 class="margin-tb-2">Dashboard</h1>
        <h3>Maciej Szelag</h3>
        <div class="listbox-container">
            <!-- for manager supervisor -->
            <div class="box bg-c-1">
                <div class="box-top">
                    <div class="b1">New requests</div>
                    <div class="b2">0</div>
                </div>
                <div class="box-bottom">
                    <a href="index.php?source=new-requests">View Details</a>
                </div>
            </div>

            <div class="box bg-c-3">
                <div class="box-top">
                    <div class="b1">Current active stuff</div>
                    <?php
                    $selectAllUsers = selectAllUsers();
                    confirmQuery($selectAllUsers);
                    $all_emploees = mysqli_num_rows($selectAllUsers);
                    ?>

                    <div class="b2"><span><?php echo $all_emploees; ?></span></div>
                </div>
                <div class="box-bottom">
                    <a href="index.php?source=all-employees">View Details</a>
                </div>
            </div>
            <!-- for manager supervisor -->
            <div class="box bg-c-4">
                <div class="box-top">
                    <div class="b1">Holiday Left</div>
                    <div class="b2">5</div>
                </div>
                <div class="box-bottom">
                    <a href="index.php?source=leave-request">Request form</a>
                </div>
            </div>

            <div class="box bg-c-2">
                <div class="box-top">
                    <div class="b1">Next holiday</div>
                    <div class="b2"><span class="date">12/02/2022</span><span>5 days</span></div>
                </div>
                <div class="box-bottom">
                    <a href="index.php?source=employee-holidays">See all holidays</a>
                </div>
            </div>
        </div>
    </div>
</div>