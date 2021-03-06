<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href=".">
            <h2>Entertainment Reviz</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href=".">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/flix.php">TV Shows & Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/sports.php">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/contacts.php">Contact Us</a>
                </li>
            </ul>
            <form class="d-flex navbar-form navbar-left" action="./views/search.php">
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keywords" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="nav-link mx-4 btn btn-outline-primary" href="./views/login.html">Sign In/Sign Up</a>
        </div>
    </div>
</nav>

<?php
if (str_contains(getcwd(), 'views'))
    echo "
    <script>
    let elements = document.getElementsByClassName('nav-link');
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        var path = element.getAttribute('href');
        var pathArr = path.split('/');
        element.setAttribute('href', pathArr[pathArr.length - 1]);
        if(pathArr[pathArr.length-1]=='.')
            element.setAttribute('href', '../');
        console.log(elements[i]);
    }
    </script>";
?>