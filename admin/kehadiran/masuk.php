<?php
$id = $_GET['id'];
$lihat = mysql_query("SELECT * FROM tb_pendaftaran where id_peserta = '$id'");
$pelatihan = $data['id_pelatihan'];
$date = date("Y-m-d");
$masuk = mysql_query("INSERT INTO `tb_kehadiran` (`id_hadir`, `id_pelatihan`, `presensi`, `tgl`, `id_peserta`, `pelatihan`) VALUES (NULL, '$pelatihan', 'tidak', '$date', '$id', '$pelatihan')");

//     echo "<div class='alert alert-success'>
//     <a href='?page=data_kehadiran' class='close' data-dismiss='alert'>
//     &times;
//     </a> Load
//     </div>";
?>