<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php
$tabTitle = "Dashboard | Session";
include "../includes/head.php";
?>
<?php include "includes/nav.php"; ?>
<div class="wrap">
    <div class="container">
        <?php
        include "Routes/user_routes.php";
        ?>
    </div>
</div>
<script src="js/nav.js"></script>
</body>

</html>