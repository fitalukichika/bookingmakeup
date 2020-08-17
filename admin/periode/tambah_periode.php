<?php
if (isset($_POST['simpan'])) {
        $id_periode = $_POST['id_periode'];
        $tahun = $_POST['tahun'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $sql = "INSERT INTO tb_periode VALUES('$id_periode','$tahun','$tgl_mulai','$tgl_selesai')";
        $simpan = mysql_query($sql) or die(mysql_error());
        if ($simpan) {
                echo "<div class='alert alert-success'>
                <a href='?page=data_periode' class='close' data-dismiss='alert'>
                &times;
                </a> Simpan Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_periode'>";

            }else{
                echo "<div class='alert alert-warning'>
                <a href='?page=data_periode' class='close' data-dismiss='alert'>
                &times;
                </a> Simpan Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_periode'>";
            }
         
}

                    $query = "select max(id_periode) from tb_periode";
                    $sql = mysql_query($query) or die(mysql_error());
                    $kode = mysql_fetch_array($sql);
                    if ($kode) {
                      $nilaikode = substr($kode[0], 3);
                      $kodenya = (int) $nilaikode;
                      $kodenya = $kodenya + 1;
                      $hasilkode = "PER".str_pad($kodenya, 4, "0", STR_PAD_LEFT);
                    }else{
                      $hasilkode = "PER0001";
                    }
?>
      <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah Periode</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

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
                    <input type="text" class="form-control" name="id_periode" value="<?php echo $hasilkode ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tahun Periode</label>
                  <div class="col-sm-10">
                    <input type="year" class="form-control" name="tahun" placeholder="tahun periode" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_mulai" placeholder="tanggal mulai" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Selesai</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_selesai" placeholder="tanggal Selesai" required>
                  </div>
                </div>                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?page=data_periode" class="btn btn-default">Batal</a>
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
      </div>
      </div>
      </div>
      </section>
     
