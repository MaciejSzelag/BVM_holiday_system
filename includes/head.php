<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $tabTitle;
            echo  $tabTitle;
            ?></title>
    <link rel="stylesheet" <?php if (!isset($cssPath)) {
                                echo 'href="../css/style.css"';
                            } else {
                                echo 'href="css/style.css"';
                            }; ?>>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>