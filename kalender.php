<?php
$month= date ("m");
$year=date("Y");
$day=date("d");
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
/*
echo '<font face="arial" size="2">';
echo '<table align="center" border="0" cellpadding=5 cellspacing=5 style=""><tr><td align=center>';
echo '</td></tr></table>';
*/
echo '<table width="100%" align="center" border="0" cellpadding=1 cellspacing=1 style="border:1px solid #CCCCCC" bgcolor="#FFFFFF">
<bgcolor="#00CC3>
<th align=center bgcolor="#33CCFF"><font color=red>Min</font></th>
<th align=center bgcolor="#33CCFF">Sen</th>
<th align=center bgcolor="#33CCFF">Sel</th>
<th align=center bgcolor="#33CCFF">Rab</th>
<th align=center bgcolor="#33CCFF">Kam</th>
<th align=center bgcolor="#33CCFF">Jum</th>
<th align=center bgcolor="#33CCFF">Sab</th>
</tr>';
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:Calibri;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";}

for ($d=1;$d<=$endDate;$d++) {
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
$fontColor="#000000";
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
echo "<td style=\"font-family:Calibri;;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";

if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
echo '</table>'; 
echo "<div align='center'>";
echo "<font color=#0033FF> Date : <b>".date("d F Y ",mktime(0,0,0,$month,$day,$year))."</b></font>";
echo "</div>";
?>