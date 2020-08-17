
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 class="title2">DOWNLOAD</h1>
<table width="73%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <th width="9%">No</th>
    <th width="45%">Proses Pengaduan</th>
    <th width="46%">Dokumen</th>
  </tr>
  	<?
  	$query = mysql_query("SELECT file_link  FROM tb_file ");
	$no = 1;
	while($data=mysql_fetch_array($query)) {
		if ($data['file_link']=='') {
			$file = "Dokumen Belum Ada";
		} else {
			$file = "<a href='file/$data[file_link]'>Download</a>";				
		}
	?>
  <tr>
    <td align="center"><? echo "$no"; ?></td>
    <td>Pengaduan Perselisihan</td>
    <td align="center"><? echo "$file"; ?></td>
  </tr>
  <?
	  $no++;
	}
  ?>
  
</table>
</body>
</html>