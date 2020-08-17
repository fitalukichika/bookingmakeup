<?php
session_start();
include "logincek.php";
?>


<style type="text/css">
b {color:#000}


/*----mengatur link secara umum ----*/
a:link {color:#9F9;} /*jika link blm diakses */
a:visited {color:#9F9;} /*jika link pernah diakses */
a:hover {color:#9F9;} /*jika mouse diatas link */
a:active {color:##9F9;} /*jika link diklik */


</style>


<form name="frmlogin" method="post" action="loginsubmit.php">
  <table width="150" border="0">
       <tr>
         <td>User</td>
         <td><input name="txtUsername" type="text"></td>
       </tr>
   
       <tr>
         <td height="41">Password</td>
         <td><input name="txtPassword" type="password"></td>
       </tr>
   
       <tr>
          <td></td>
          <td><input name="btnLogin" type="submit" value="Login"></td>
       </tr>
   </table>	
</form>





