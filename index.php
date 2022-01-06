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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="public/styles/style.css">

    <title>Home</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <?php

    include "views/partials/nav-bar.html";
    echo "<br><br><br>";
    
	$myfile = fopen("apikeys.json", "r") or die("Unable to open file!");
	$apiKey = json_decode(fread($myfile, filesize("apikeys.json")))->books;
	fclose($myfile);


	function repeat_content($apiKey, $id)
	{
		$response = json_decode(file_get_contents("https://www.googleapis.com/books/v1/volumes/$id?key=$apiKey"));

		$volumeInfo = $response->volumeInfo;
		$imageLinks = $volumeInfo->imageLinks;

		echo "
		<div class=\"card mb-3\" style=\" margin:10px;\">
			<div class=\"row g-0\">
				<div class=\"col-md-4\">
					<img src=\"$imageLinks->thumbnail\" class=\"img-fluid rounded-start\" alt=\"...\">
				</div>
				<div class=\"col-md-8\">
					<div class=\"card-body\">
						<h5 class=\"card-title\">$volumeInfo->title</h5>
						<p class=\"card-text\">$volumeInfo->description</p>
						<a href=\"./views/detailed-content.php\" class=\"btn btn-primary\">Show More</a>
					</div>
				</div>
			</div>
		</div>
		";
	}

	repeat_content($apiKey, 'zyTCAlFPjgYC');
	// Adding ajax for dynamic refreshing

	$search = json_decode(file_get_contents("https://www.googleapis.com/books/v1/volumes?q=history&key=$apiKey"));
	for ($i = 0; $i < $search->totalItems % 20; $i++) {
		repeat_content($apiKey, $search->items[$i]->id);
	}
    
    ?>

</body>

</html>