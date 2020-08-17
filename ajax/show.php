<?php
include ("../koneksi.php");
$act = $_GET['act'];


switch($act)
{
  case"showPeserta":
  $id = mysql_real_escape_string($_GET['id']);
  $s_pesertas = mysql_query("select * from tb_pendaftaran where id_jenispelatihan='$id'");
  $jml = mysql_num_rows($s_pesertas)
  ?>
  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <?php
                      while ($h_peserta=mysql_fetch_array($s_pesertas)) {
                    ?>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="id_peserta[]" class="minimal-red" value="<?php echo $h_peserta['id_peserta']; ?>">
                        </label>
                        <?php
                          echo $h_peserta['nama_peserta'];
                        ?>
                      </div>
                    <?php
                      }
                    ?>
                    </div>
                  </div>
  <?php
  break;
  
}
?>