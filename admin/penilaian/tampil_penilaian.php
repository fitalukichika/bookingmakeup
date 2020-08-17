
<?php 
include '../../koneksi.php';
$s_pembimbing = mysql_query("SELECT * FROM tb_pendaftaran where id_jenispelatihan = '".addslashes($_POST['post'])."'") or die(mysql_error());
while ($data = mysql_fetch_array($s_pendamping)) 
{
	?>
<!-- <form class="form-horizontal" method="post"> -->
	<tr>
	    <td><?php echo $data['id_peserta']; ?></td>
	    <td><?php echo $data['no_ktp']; ?></td>
	    <td><?php echo $data['nama_peserta']; ?></td>
	    <td><?php echo $data['jekel']; ?></td>
	    <td><?php echo $data['alamat']; ?></td>
	    <td><img src="../foto/user/<?php echo $data['foto']; ?>" class="img-responsive" style="width: 80px;" ></td>
	    <td><input type="number" class="form-control" min="0" name="nilai[]"></td>
	    <td><input type="hidden" class="form-control" name="id_jenispelatihan" value="<?php echo $data['id_jenispelatihan'] ?>"><input type="text" class="form-control" name="keterangan[]"></td>
	 </tr>

	<?php
}
?>
<tr>
	<td colspan="8"><center><input type="submit" class="btn btn-info" name="btnsimpan" value="Simpan1" ></center></td>
</tr>
<tr>
	
            <!-- <input type="submit" class="btn btn-info" name="btnsimpan" value="Simpan1" > -->
</tr>
<!-- </form> -->
