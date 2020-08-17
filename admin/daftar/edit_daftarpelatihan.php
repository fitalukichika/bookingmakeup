<?php
$id=$_GET['id'];

$sql="SELECT * FROM tb_jenispelatihan WHERE id_jenispelatihan='$id'";
$query=mysql_query($sql) or die(mysql_error());
$data=mysql_fetch_array($query);

if (isset($_POST['simpan'])) {
        $id_jenispelatihan = $_POST['id_jenispelatihan'];
        $nama_pelatihan = $_POST['nama_pelatihan'];

        $simpan = mysql_query("UPDATE tb_jenispelatihan SET nama_pelatihan='$nama_pelatihan' WHERE id_jenispelatihan='$id_jenispelatihan'") or die(mysql_error());

        if ($simpan) {
                echo "<div class='alert alert-success'>
                <a href='?page=data_daftarpelatihan' class='close' data-dismiss='alert'>
                &times;
                </a> Edit Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_daftarpelatihan'>";

            }else{
                echo "<div class='alert alert-success'>
                <a href='?page=data_daftarpelatihan' class='close' data-dismiss='alert'>
                &times;
                </a> Edit Data Gagal
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_daftarpelatihan'>";
            } 
}
?>
<div class="right_col" role="main">
<section class="content-header">
    <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Periode</h3>
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
                  <div class="x_content"></div>
        
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID Jenis Pelatihan</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_jenispelatihan" value="<?php echo $data['id_jenispelatihan']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Pelatihan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pelatihan" placeholder="nama_pelatihan" value="<?php echo $data['nama_pelatihan']; ?>" required>
                  </div>
                </div>
                <!--<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat" placeholder="tempat" value="<?php echo $data['tempat']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jadwal</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="jadwal" placeholder="jadwal" value="<?php echo $data['jadwal']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kuota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kuota" placeholder="kuota" value="<?php echo $data['kuota']; ?>" required>
                  </div>
                </div>-->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?page=data_daftarpelatihan" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right" name="simpan">Simpan</button>
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