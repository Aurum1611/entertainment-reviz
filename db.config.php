<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create and Connect
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} // else echo "Connected successfully";

function runQuery($conn, $sql)
{
    try {
        return $conn->query($sql);
    } catch (Exception $e) {
        echo '<script>alert(' . $e->getMessage() . ');</script>';
    }
}

runQuery($conn, 'CREATE DATABASE entertain;');
runQuery($conn, 'USE entertain;');


$sql = "create table Users (userid int not null primary key auto_increment,
            username varchar(255) not null, password varchar(255) not null, email varchar(255) not null);";
runQuery($conn, $sql);

$sql = "create table Bookmarks (srno int primary key auto_increment, uid int not null, 
            uname varchar(255) not null, postid varchar(255) not null);";
runQuery($conn, $sql);


// Controller
// Update and Search

function insertUser($conn, $userid, $username, $password, $email)
{
    $sql = "INSERT INTO Users (userid, username, password, email) VALUES ($userid, $username, $password, $email)";
    return runQuery($conn, $sql);
}

function updateUser($conn, $userid, $username, $password, $email)
{
    $sql = "UPDATE Users password = $password WHERE username = $username AND email = $email;";
    return runQuery($conn, $sql);
}

function findUser($conn, $userid, $username, $password, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND password = $password
            AND email = $email;";
    $result = runQuery($conn, $sql);
    return $result;
}

function insertBookmark($conn, $uid, $uname, $postid)
{
    $sql = "INSERT INTO Bookmarks (uid, uname, postid) VALUES ($uid, $uname, $postid);";
    return runQuery($conn, $sql);
}

function findBookmark($conn, $uid, $uname, $postid)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = runQuery($conn, $sql);
    return $result;
}

// Controller
// View Delete

function viewUser($conn, $userid, $username, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND email = $email;";
    $result = runQuery($conn, $sql);
    return $result;
}

function deleteUser($conn, $username, $email, $password)
{
    $sql = "DELETE FROM Users WHERE username = $username AND email = $email AND password = $password;";
    return runQuery($conn, $sql);
}

function viewBookmarks($conn, $uid, $uname)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = runQuery($conn, $sql);
    return $result;
}

function deleteBookmark($conn, $uid, $uname, $postid)
{
    $sql = "DELETE FROM Bookmarks WHERE uid = $uid AND uname = $uname AND postid = $postid;";
    return runQuery($conn, $sql);
}

$conn->close();

?>