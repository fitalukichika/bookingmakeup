<?php 
include '../../koneksi.php';
$s_pendamping = mysql_query("SELECT tb_pendamping.id_pendamping, tb_pendamping.nama_pendamping FROM `tb_pendamping` left join tb_pelatihan on tb_pendamping.id_pendamping=tb_pelatihan.id_pendamping left join tb_jenispelatihan on tb_jenispelatihan.id_jenispelatihan=tb_pelatihan.id_jenispelatihan GROUP by tb_pendamping.id_pendamping") or die(mysql_error());
while ($h_pendamping = mysql_fetch_array($s_pendamping)) {
echo "<option value='$h_pendamping[id_pendamping]'>$h_pendamping[nama_pendamping]</option>"; 
}
?>