<!DOCTYPE html>
<html>
<head>
	<title>kama</title>
</head>
<body>
<form method="POST">
	<input type="text" name="nama" >
	<button name="simpan">Simpan</button>
</form>
<?php
require_once '../../koneksi.php';  
	if (isset($_POST['simpan'])) {
		$nama = $_POST['nama'];
   	$date = date("Y-m-d");
		$tidak = mysql_query("INSERT INTO `tb_kehadiran` (`id_hadir`, `id_pelatihan`, `presensi`, `tgl`, `id_peserta`) VALUES (NULL, 'MG0007', '$nama', '$date', 'P0001')");
	}
 ?>
</body>
</html>