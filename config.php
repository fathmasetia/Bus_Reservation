<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "bus_reservation";

$conn = ,ysqli_connect($host, $username, $password, $databse);

if ($conn->connect_error){
    die ("Database gagal terkoneksi: " .$conn->connect_error);
}
?>