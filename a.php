<?php

/*$data = ['aku','dia'];
echo $data[1];*/
/*include "koneksi.php";
$q_kepala = mysql_query("SELECT nama from tb_user WHERE status in ('kadin','kabid')") or die(mysql_error());
$i = 0;
$result = Array();
while ($data = mysql_fetch_array($q_kepala)) {
	$result[$i++] = $data[0];
}
echo $result[0];*/
$tgl = date('Y-m-d');
echo $tgl;
echo "<br>";
$tgl2 = date('Y-m-d',strtotime('-2 days', strtotime($tgl)));
echo $tgl2;
?>