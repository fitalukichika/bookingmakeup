<?php 
include '../../koneksi.php';
$s_pembimbing = mysql_query("SELECT tb_pembimbing.id_pembimbing, tb_pembimbing.nama_pembimbing FROM `tb_pembimbing` left join tb_magang on tb_magang.id_pembimbing=tb_pembimbing.id_pembimbing left join tb_jenismagang on tb_jenismagang.id_magang=tb_magang.id_magang where tb_jenismagang.jadwal > '".addslashes($_POST['post'])."' + INTERVAL 1 day or tb_jenismagang.jadwal < '".addslashes($_POST['post'])."' - INTERVAL 1 day or tb_jenismagang.id_magang is null GROUP by tb_pembimbing.id_pembimbing") or die(mysql_error());
while ($h_pembimbing = mysql_fetch_array($s_pembimbing)) {
echo "<option value='$h_pembimbing[id_pembimbing]'>$h_pembimbing[nama_pembimbing]</option>"; 
}
?>