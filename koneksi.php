<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "db_dinasku";


mysql_connect($host,$username,$password) or die ("koneksi gagal");
mysql_select_db($db) or  die ("Database tidak ditemukan");

// function pr($value='')
// {
// 	echo "<pre>";
// 	print_r($value);
// 	echo "</pre>";
// }
?>