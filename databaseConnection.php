<?php
#Logan Fontenot
#11/25/22
#Creates link to the MySQL database

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "smartshoes";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
?>