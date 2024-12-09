<?php
$servername = "localhost"; // server database
$username = "root"; //nama pengguna di database
$password = ""; // sandi kosong
$dbname = "makeup_store"; //nama database

$conn = new mysqli($servername, $username, $password, $dbname); //membuat koneksi


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); //memeriksa koneksi
} 
?>