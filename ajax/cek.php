<?php
//error_reporting(0);
include ("../koneksi.php");
$act = $_GET['act'];

switch($act)
{
case "cekKtpPemilik":
	$no_ktp = mysql_real_escape_string($_GET['no_ktp']);
	echo mysql_num_rows(mysql_query("select * from tb_pendaftaran where no_ktp='$no_ktp'"));
	break;
case "cekUsername":
	$username = mysql_real_escape_string($_GET['username']);
	echo mysql_num_rows(mysql_query("select * from tb_pendaftaran where username='$username'"));
	break;
}
?>