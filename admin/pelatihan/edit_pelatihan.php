<?php
$query = mysql_query("SELECT * from tb_pelatihan where id_pelatihan = '".$_GET['id']."'");
$data = mysql_fetch_array($query);  
  ?>
 <div class="right_col" role="main">
<section class="content-header">
     <div class="">
            <div class="page-title">
              <div class="title_left">
      <h3> Tambah Pelatihan</h3>
      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

            <div class="box-header with-border">
             <div class="x_panel">
                  <div class="x_title">
                    <h2>Silahkan isi data dengan benar</h2>
             <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Pelatihan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pelatihan" required="">
                      <option>Pilih*</option>
                     <?php
                      $s_pelatihan = mysql_query("SELECT * FROM tb_jenispelatihan") or die(mysql_error());
                      while ($h_pelatihan = mysql_fetch_array($s_pelatihan)) {
                      echo "<option value='$h_pelatihan[id_jenispelatihan]'>$h_pelatihan[nama_pelatihan]</option>"; 
                    }
                    ?>
                   </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Nama Pendamping</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pendamping" required="">
                      <option>Pilih*</option>
                     <?php
                      $s_pendamping = mysql_query("SELECT * from tb_pendamping") or die(mysql_error());
                      while ($h_pendamping = mysql_fetch_array($s_pendamping)) {
                      echo "<option value='$h_pendamping[id_pendamping]'>$h_pendamping[nama_pendamping]</option>"; 
                    }
                    ?>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat" value="<?php echo $data['tempat']; ?>" placeholder="Tempat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jadwal</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="jadwal"  value="<?php echo $data['jadwal']; ?>" placeholder="Jadwal" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kuota</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="kuota"  value="<?php echo $data['kuota']; ?>" placeholder="Kuota" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?page=data_pelatihan" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right" name="simpan" >Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<?php
if (isset($_POST['simpan'])) 
{
  $id_pelatihan = $_GET['id'];
  $nama_pelatihan = $_POST['pelatihan'];
  $nama_pendamping = $_POST['pendamping'];
  $jadwal = $_POST['jadwal'];
  $tgl_jadwal = date("Y-m-d", strtotime($jadwal));
  $tempat = $_POST['tempat'];
  $kuota = $_POST['kuota'];
  
  $update = "UPDATE `tb_pelatihan` SET `id_jenispelatihan` = '".addslashes($nama_pelatihan)."', `id_pendamping` = '".addslashes($nama_pendamping)."', `tempat`= '".addslashes($tempat)."', `jadwal` = '".addslashes($jadwal)."', `kuota` = '".addslashes($kuota)."' WHERE `tb_pelatihan`.`id_pelatihan` = '$id_pelatihan'";

  $simpan = mysql_query($update) or die(mysql_error());
  if ($simpan) 
  {
    echo "<div class='alert alert-success'>
      <a href='?page=data_pelatihan' class='close' data-dismiss='alert'>
      &times;
      </a> Simpan Data Berhasil
      </div>";

    echo "<meta http-equiv='refresh' content='1; url=?page=data_pelatihan'>";

  }else
  {
    echo "<div class='alert alert-warning'>
      <a href='?page=data_pelatihan' class='close' data-dismiss='alert'>
      &times;
      </a> Simpan Data Berhasil
      </div>";

    echo "<meta http-equiv='refresh' content='1; url=?page=data_pelatihan'>";
  }
}

?>