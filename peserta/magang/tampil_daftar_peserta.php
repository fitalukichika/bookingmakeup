<?php 
include '../../koneksi.php';
$s_pembimbing = mysql_query("SELECT * FROM tb_pendaftaran where id_magang = '".addslashes($_POST['post'])."'") or die(mysql_error());
while ($data = mysql_fetch_array($s_pembimbing)) 
{
	?>
	<tr>
	    <td><?php echo $data['id_peserta']; ?></td>
	    <td><?php echo $data['no_ktp']; ?></td>
	    <td><?php echo $data['nama_peserta']; ?></td>
	    <td><?php echo $data['jekel']; ?></td>
	    <td><?php echo $data['alamat']; ?></td>
	    <td><?php echo $data['usaha']; ?></td>
	    <td><?php echo $data['hasil_produk']; ?></td>
	    <td><?php echo $data['no_telp']; ?></td>
	    <td><img src="../foto/user/<?php echo $data['foto']; ?>" class="img-responsive" style="width: 80px;" ></td>
	    <td><img src="../foto/file/<?php echo $data['sk_desa']; ?>" class="img-responsive" style="width: 80px;" ></td>
	 </tr>
	<?php
}
?>