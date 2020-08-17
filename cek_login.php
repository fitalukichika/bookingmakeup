
<?php
include "koneksi.php";
  session_start();
  
  
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
        $login = $_POST['login']; 
  
  
  
  
  //ADMIN CLOUD
  if($login) { // jika login di klik
      if($username == "" || $password == "" ) { // dan jika text user dan pass masih kosong
    ?> 
        <!-- muncul peringatan dari javascript -->
        <script type="text/javascript">alert("Username atau password masih kosong"); window.location.href="login.php"</script> 
        <?php
        } 
        //jika tidak kosong
      else { 
        $query=mysql_query("SELECT * FROM tb_user WHERE  username='$username' and password='$password'") or die(mysql_error());
        $data = mysql_fetch_array($query);
        $cek=mysql_num_rows($query);
        if($cek >= 1) {
            if($data['status'] == "petugas") {
             $_SESSION['id_user'] = $data['id_user'];
              // maka menuju ke halaman index.php
              header("location: admin/index.php");
            //dan jika levelnya operator
            } elseif($data['status'] == "kabid") {
             $_SESSION['id_user'] = $data['id_user'];
              // maka menuju ke halaman index.php
              header("location: kabid/index.php");
            } 
        }elseif ($cek < 1) {
          $query1=mysql_query("SELECT * FROM tb_pendaftaran WHERE  username='$username' and password='$password'") or die(mysql_error());
          $data1 = mysql_fetch_array($query1);
          $cek1=mysql_num_rows($query1);
          if($cek1 >= 1) {
            $_SESSION['id_user'] = $data1['id_peserta'];
              // maka menuju ke halaman index.php
              header("location: peserta/index.php");
          }else {
            ?> 
            <!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
            <script type="text/javascript">alert("Login Gagal ."); window.location.href="login.php"</script> 
          <?php
        }
        }

      
      }
    }
?>
