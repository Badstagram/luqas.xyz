<?php

$servername = "localhost";
$dBUsername = "root";
$dBPasswort = "";
$dBName     = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPasswort, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}