<?php
include '.rute.php';

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    $jarak = $_POST['jarak'];
    $harga = $_POST['harga'];

    if (isset($_GET['inlineRadio1'])) {
        $harga = 'Rp 100.000,00-'
    }
}