<?php

if (isset($_GET["source"])) {
    $source = $_GET["source"];
} else {
    $source = '';
}
switch ($source) {
    case "update-form";
        include "includes/update-form.php";
        break;
    case "checkForm";
        include "../user/checkForm.php";
        break;
    case "view-employee";
        include "includes/user-details.php";
        break;
    case "view-details";
        include "includes/view-details.php";
        break;
    case "holiday-details";
        include "includes/holiday-details.php";
        break;
    case "employee-holidays";
        include "includes/employee-holidays.php";
        break;
    case "leave-request";
        include "includes/request-form.php";
        break;
    case "new-requests";
        include "includes/new-requests.php";
        break;
    case "all-employees";
        include "includes/all-employees.php";
        break;
    case "all-holidays";
        include "includes/all-holidays.php";
        break;
    case "add-user";
        include   "includes/add-user.php";
        break;
    default:
        include "includes/dashboard.php";
}
