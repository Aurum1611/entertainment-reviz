<!DOCTYPE html>
<html version="5.0">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/styles/style.css">
    <title>Contacts Page</title>

    <script src="../public/js/validation.js"></script>

</head>

<body>
    <?php

    include "partials/nav-bar.php";
    echo "<br><br><br><br>";
    echo "
    <script>
        elements = document.getElementsByClassName('nav-link');
        var element = elements[0];
        element.classList.remove('active');
        elements[4].classList.add('active');
    </script>  
    ";

    try {
        // Load XML file
        $xml = new DOMDocument;
        $xml->load('../contacts.xml');

        // Load XSL file
        $xsl = new DOMDocument;
        $xsl->load('../public/styles/contacts.xsl');

        // Configure the transformer
        $proc = new XSLTProcessor;

        // Attach the xsl rules
        $proc->importStyleSheet($xsl);

        echo $proc->transformToXML($xml);
    } catch (Error $e) {
        echo '<script>console.log("' . $e->getMessage() . '");</script>';

        $x = $xml->documentElement;
        foreach ($x->childNodes as $item) {
            if ($item->nodeName === '#text') continue;
            else
                echo '<h3 style="text-align: center">' . ucwords($item->nodeName) . ": "
                    . $item->nodeValue . "</h3><br>";
        }
    }

    include "partials/footer.html"

    ?>
</body>

</html>