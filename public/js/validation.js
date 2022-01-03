function validateForm() {

    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var username = document.forms["login"]["username"].value;
    var email = document.forms["login"]["email"].value;

    if (!mailFormat.test(String(email).toLowerCase())) {

        alert("Enter a valid email address");
        return false

    } else if (username.length < 8) {

        alert("Username must be filled out with at least 8 characters");
        return false;

    } else return "login.php";

}