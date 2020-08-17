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
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Pelatihan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="nama_pelatihan">
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
                    <select class="form-control" name="nama_pendamping">
                      <option>Pilih*</option>
                     <?php
                      $s_pendamping = mysql_query("SELECT * FROM tb_pendamping") or die(mysql_error());
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
                    <input type="text" class="form-control" name="tempat" placeholder="Tempat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jadwal</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="jadwal" placeholder="Jadwal" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kuota</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="kuota" placeholder="Kuota" required>
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
  $nama_pelatihan = $_POST['nama_pelatihan'];
  $nama_pendamping = $_POST['nama_pendamping'];
  $jadwal = $_POST['jadwal'];
  $tgl = date("Y-m-d", strtotime($jadwal));
  $tempat = $_POST['tempat'];
  $kuota = $_POST['kuota'];
  $query = "select max(id_pelatihan) from tb_pelatihan";
  $sql = mysql_query($query) or die(mysql_error());
  $kode = mysql_fetch_array($sql);
  if ($kode) {
    $nilaikode = substr($kode[0], 2);
    $kodenya = (int) $nilaikode;
    $kodenya = $kodenya + 1;
    $hasilkode = "MG".str_pad($kodenya, 4, "0", STR_PAD_LEFT);
  }else{
    $hasilkode = "MG0001";
  }
  
  $query = "INSERT INTO `tb_pelatihan` (`id_pelatihan`, `id_jenispelatihan`, `id_pendamping`, `tempat`, `jadwal`, `kuota`) VALUES ('$hasilkode', '$nama_pelatihan', '$nama_pendamping', '$tempat', '$tgl', '$kuota')";
  $simpan = mysql_query($query) or die(mysql_error());
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