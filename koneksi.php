<?php

$host ="localhost";
$user ="id21904762_markzackyburght";
$pass = "@Zacky1212";
$db = "id21904762_perpustakaanzacky";

if (!isset($_SESSION)) {
    session_start();
}
$koneksi = mysqli_connect($host,$user,$pass,$db);

?>