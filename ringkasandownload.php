<?
include "koneksi.php";

$direktori = "imgFoto"; // folder tempat penyimpanan file yang boleh didownload
$namafile = $_GET['Gno_pengaduan'];

header("Content-Type: octet/stream");
header("Pragma: private"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($namafile)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($direktori.$namafile));
readfile("$direktori$namafile");
exit();
?>