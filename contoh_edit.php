<?php
session_start();
include "koneksi.php";

if (! $_GET['Gnim']== "") {
$sql= mysql_query ("SELECT * FROM tb_contoh where nim='".$_GET['Gnim']."'")
or die (mysql_error());
$data= mysql_fetch_array($sql);
}
?>

<form name=edit action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>nama</td>
<td>:</td>
<td> <input name="nama" type="text" size="30" value="<?php echo $data['nama']; ?>"></td>
</tr>

<tr>
<td>nim</td>
<td>:</td>
<td><input name="nim" type="text" size="30" value="<?php echo $data['nim']; ?>"></td>
</tr>
</table>
</form>