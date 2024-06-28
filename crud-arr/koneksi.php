<?php 

$host="localhost";
$user="root";
$password="";
$db="data_arr";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon) {
    die("Koneksi Gagal:".mysqli_connect_error());
}
