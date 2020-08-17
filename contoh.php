<?php
session_start();
include "koneksi.php";
?>

<form name="form" action="" method="post" enctype="multipart/form-data">
<table>

<tr>
<td>Nim</td>
<td>:</td>
<td><input name="nim" type="text" size="30"></td>
</tr>

<tr>
<td>Nama</td>
<td>:</td>
<td><input name="nama" type="text" size="30"></td>
</tr>

<tr>
<td></td>
<td></td>
<td><input name="submit" type="submit" value="submit"></td>
</tr>

</table>
</form>

<?php
if ($_POST['submit'] == "submit"){
$sql_insert= "INSERT INTO tb_contoh (nim, nama) values(
'".$_POST[nim]."',
'".$_POST[nama]."')";
$query_insert = mysql_query($sql_insert) or die (mysql_error());
}

?>