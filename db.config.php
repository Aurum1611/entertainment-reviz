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

function runQuery($sql)
{
    try {
        return $GLOBALS['conn']->query($sql);
    } catch (Exception $e) {
        echo '<script>alert(' . $e->getMessage() . ');</script>';
    }
}

runQuery('CREATE DATABASE entertain;');
runQuery('USE entertain;');


$sql = "create table Users (userid int not null primary key auto_increment,
            username varchar(255) not null, password varchar(255) not null, email varchar(255) not null);";
runQuery($sql);

$sql = "create table Bookmarks (srno int primary key auto_increment, uid int not null, 
            uname varchar(255) not null, postid varchar(255) not null);";
runQuery($sql);


// Controller
// Update and Search

function insertUser($userid, $username, $password, $email)
{
    $sql = "INSERT INTO Users (userid, username, password, email) VALUES ($userid, $username, $password, $email)";
    return runQuery($sql);
}

function updateUser($username, $password, $email)
{
    $sql = "UPDATE Users password = $password WHERE username = $username AND email = $email;";
    return runQuery($sql);
}

function findUser($userid, $username, $password, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND password = $password
            AND email = $email;";
    $result = runQuery($sql);
    return $result;
}

function insertBookmark($uid, $uname, $postid)
{
    $sql = "INSERT INTO Bookmarks (uid, uname, postid) VALUES ($uid, $uname, $postid);";
    return runQuery($sql);
}

function findBookmark($uid, $uname, $postid)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = runQuery($sql);
    return $result;
}

// Controller
// View Delete

function viewUser($userid, $username, $email)
{
    $sql = "SELECT * FROM Users WHERE userid = $userid AND username = $username AND email = $email;";
    $result = runQuery($sql);
    return $result;
}

function deleteUser($username, $email, $password)
{
    $sql = "DELETE FROM Users WHERE username = $username AND email = $email AND password = $password;";
    return runQuery($sql);
}

function viewBookmarks($uid, $uname)
{
    $sql = "SELECT * FROM Bookmarks WHERE uid = $uid AND uname = $uname;";
    $result = runQuery($sql);
    return $result;
}

function deleteBookmark($uid, $uname, $postid)
{
    $sql = "DELETE FROM Bookmarks WHERE uid = $uid AND uname = $uname AND postid = $postid;";
    return runQuery($sql);
}

?>