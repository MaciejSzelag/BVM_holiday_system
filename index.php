<?php
$cssPath = true;
$tabTitle = "Login";
include "includes/head.php";
?>
<div class="request-form flex-center request-100">
    <div class="cover"></div>
    <!-- <div class="form"> -->

    <form action="">
        <div class="input-group">
            <div class="log-img">
                <!-- <img src="img/user.png" alt="">
                                     -->

                <span class="material-symbols-outlined">
                    landscape
                </span>
            </div>
            <h1 class="margin-tb-3 size-2">Login</h1>
        </div>
        <div class="input-group">

            <input type="text" placeholder="Username">
        </div>
        <div class="input-group">

            <input type="password" placeholder="Password">
        </div>
        <div class="input-group">
            <input type="submit" value="Login">
        </div>
    </form>
    <!-- </div> -->
</div>
<?php include "includes/footer.php"; ?>