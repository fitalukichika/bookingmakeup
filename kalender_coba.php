<html>
<head>
<title> Kalender</title>
<style>
table.tblkal {border-collapse:collapse;font-size:12pt;
color:black;font-family:verdana}
a.tgl{color:#000;text-decoration:none}
td.nhari{color:white}
</style>
</head>
<body>
<?php

mysql_connect("localhost","root","");
mysql_select_db("kk");

$day[0] = "Sunday";
$day[1] = "Monday";
$day[2] = "Tuesday";
$day[3] = "Wednesday";
$day[4] = "Thursday";
$day[5] = "Friday";
$day[6] = "Saturday";

$day["Sunday"] = 0;
$day["Monday"] = 1;
$day["Tuesday"] = 2;
$day["Wednesday"] = 3;
$day["Thursday"] = 4;
$day["Friday"] = 5;
$day["Saturday"] = 6;

$bulan = date("n");
$thisbulan = date("F");
$bulanini = date("m");
$tanggal = date("j");
$hariini = date("l");
$hari = $day[$hariini];
$tahun = date("Y");

$query = mysql_query("select * from kalender where month(tanggal)=$bulanini");
{
    $tglevent[] = $e['tanggal'];
    $judulacara[] = $e['acara']." jam : ".$e['waktu'];
}
switch($bulan){
    case 1 : $jhari = 31; break;
    case 2 :
        $sisa = $tahun%4;
        if(!$sisa){
            $jhari = 29;
        }else{
            $jhari = 28;
        }
    break;
    case 3 : $jhari = 31; break;
    case 4 : $jhari = 30; break;
    case 5 : $jhari = 31; break;
    case 6 : $jhari = 30; break;
    case 7 : $jhari = 31; break;
    case 8 : $jhari = 31; break;
    case 9 : $jhari = 30; break;
    case 10 : $jhari = 31; break;
    case 11 : $jhari = 30; break;
    case 12 : $jhari = 31; break;
}

//kode untuk mencari hari pada tanggal 1
//---------------------
$t1 = 1-($tanggal%7);
$tanggal1 = $t1+$hari;
if($tanggal1<0){
    $tanggal1=$tanggal1+7;
}
$hari1 = $day[$tanggal1];
if($tanggal1==0 || $tanggal1==1 || $tanggal1==2 || $tanggal1==3 || $tanggal1==4){
    $jbaris = 5;
}else{
    $jbaris = 6;
}
//----------------------
?>
<table width="247" height="51" border=1
cellpadding=2 cellspacing=1 bordercolor="#ababab" class=tblkal>
<tr><td bgcolor="#999966"colspan=7><font color=white><b>KALENDER</B>
(<?php echo "$thisbulan-$tahun";?>)</td></tr>
<tr>
    <td width="13%" valign="middle" bgcolor="#663300" class=nhari><b>S</b></td>
    <td width="13%" valign="middle" bgcolor="#CCCC99" class=nhari><b>M</b></td>
    <td width="13%" valign="middle" bgcolor="#CCCC99" class=nhari><b>T</b></td>
    <td width="13%" valign="middle" bgcolor="#CCCC99" class=nhari><b>W</b></td>
    <td width="13%" valign="middle" bgcolor="#CCCC99" class=nhari><b>T</b></td>
    <td width="14%" valign="middle" bgcolor="#CCCC99" class=nhari><b>F</b></td>
    <td width="14%" valign="middle" bgcolor="#CCCC99" class=nhari><b>S</b></td>


</tr>
<?php
//kode untuk menampilkan tanggal dalam bentuk tabel
//-------------------------------------------------
$dayi = 0;
$dayx = 1;
for($i=0;$i<$jbaris;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){
        if($j==0){
                $bgcolor="maroon";
            }else{
                $bgcolor="#fff";
        }
        if($dayi>=$day[$hari1]&&$dayx<=$jhari){
            if($dayx<10){
                $dayx2 = "0".$dayx;
            }else{
                $dayx2 = $dayx;
            }
            $date = "$tahun-$bulanini-$dayx2";
            $k=0;
            $class = "normal";
            $title = "";
            while($k<count($tglevent)){
                if($date==$tglevent[$k]){
                    $class = "event";
                    $bgcolor = "lightblue";
                    $title = $judulacara[$k];
                    break;
                }
                $k++;
            }
            if($dayx==$tanggal){
                echo "<td bgcolor=$bgcolor><b><a title=\"$title\"
                class=tgl href=kalender_coba.php?tgl=$date>$dayx</a></b></td>";
            }else{
                echo "<td bgcolor=$bgcolor><a title=\"$title\"
                class=tgl href=kalender_coba.php?tgl=$date>$dayx</a></td>";
            }
            $dayx++;
        }else{
            echo "<td bgcolor=$bgcolor> </td>";
        }
        $dayi++;
    }
    echo "</tr>";
}
//----------------------------------------------:)
?>
</table>
<hr>
<?php
$tgl = $_GET['tgl'];
$acara = mysql_query("select * from kalender where tanggal='$tgl'");

    

?> 
