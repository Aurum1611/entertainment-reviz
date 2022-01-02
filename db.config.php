<?php

$fileCreds = fopen("credentials.json", "r") or die("Unable to open file!");
$dbCred = json_decode(fread($fileCreds, filesize("credentials.json")));
fclose($fileCreds);

// Create and Connect
$conn = new mysqli($dbCreds->servername, $dbCreds->username, $dbCreds->password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} // else echo "Connected successfully";

$sql = "CREATE DATABASE entertain; USE entertain;";
$conn->query($sql);

$sql = "create table Users (userid int not null auto_increment primary key,
username varchar(255) not null, password varchar(255) not null, email varchar(255) not null);";
$conn->query($sql);

$sql = "create table Bookmarks (bmno int auto_increment, uid int not null, uname varchar(255) not null, 
postid varchar(255) not null);";
$conn->query($sql);


// Controller
// Update and Search

function insertUser($conn, $userid, $username, $password, $email)
{
    $sql = "INSERT INTO Users (userid, username, password, email) VALUES ($userid, $username, $password, $email)";
    return $conn->query($sql);
}

function updateUser($conn, $userid, $username, $password, $email)
{
    $sql = "UPDATE Users password = $password WHERE username = $username AND email = $email;";
    return $conn->query($sql);
}

function findUser($conn, $userid, $username, $password, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND password = $password
            AND email = $email;";
    $result = $conn->query($sql);
    return $result;
}

function insertBookmark($conn, $uid, $uname, $postid)
{
    $sql = "INSERT INTO Bookmarks (uid, uname, postid) VALUES ($uid, $uname, $postid);";
    return $conn->query($sql);
}

function findBookmark($conn, $uid, $uname, $postid)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = $conn->query($sql);
    return $result;
}

// Controller
// View Delete

function viewUser($conn, $userid, $username, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND email = $email;";
    $result = $conn->query($sql);
    return $result;
}

function deleteUser($conn, $username, $email, $password)
{
    $sql = "DELETE FROM Users WHERE username = $username AND email = $email AND password = $password;";
    return $conn->query($sql);
}

function viewBookmarks($conn, $uid, $uname)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = $conn->query($sql);
    return $result;
}

function deleteBookmark($conn, $uid, $uname, $postid)
{
    $sql = "DELETE FROM Bookmarks WHERE uid = $uid AND uname = $uname AND postid = $postid;";
    return $conn->query($sql);
}

$conn->close();

?>