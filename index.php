<?php

/*
* Author: Neeyat Lotlikar
* File: index.php 
*/

// Database and other initializations

include "db.config.php";

?>

<!-- Main Page View -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assist/styles/style.css">

    <title>Home</title>

</head>

<body>

    <?php

    include "partials/nav-bar.html";
    echo "<br><br><br>";

    for ($i = 0; $i < 3; $i++) {
        include "partials/repeat-content.html";
    }

    ?>

</body>

</html>