<?php
$id=$_GET['id'];

$sql="SELECT * FROM tb_periode WHERE id_periode='$id'";
$query=mysql_query($sql) or die(mysql_error());
$data=mysql_fetch_array($query);

if (isset($_POST['simpan'])) {
        $id_periode = $_POST['id_periode'];
        $tahun = $_POST['tahun'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
               

        $simpan = mysql_query("UPDATE tb_periode SET tahun='$tahun', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai' WHERE id_periode='$id_periode'") or die(mysql_error());

        if ($simpan) {
                echo "<div class='alert alert-success'>
                <a href='?page=data_periode' class='close' data-dismiss='alert'>
                &times;
                </a> Edit Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_periode'>";

            }else{
                echo "<div class='alert alert-success'>
                <a href='?page=data_periode' class='close' data-dismiss='alert'>
                &times;
                </a> Edit Data Gagal
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_periode'>";
            } 
}
?>
<div class="right_col" role="main">
  <section class="content">
      
       <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Periode</h3>
              </div>
  

    <!-- Main content -->
         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">ID Periode</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_periode" value="<?php echo $data['id_periode']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tahun" placeholder="tahun" value="<?php echo $data['tahun']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_mulai" placeholder="tanggal mulai" value="<?php echo $data['tgl_mulai']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Selesai</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_selesai" placeholder="tanggal selesai" value="<?php echo $data['tgl_selesai']; ?>" required>
                  </div>
                </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?page=data_periode" class="btn btn-default">Batal</a>
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