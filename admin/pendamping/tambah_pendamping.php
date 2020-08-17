<?php
if (isset($_POST['simpan'])) {
        $id_pendamping = $_POST['id_pendamping'];
        $nik = $_POST['nik'];
        $nama_pendamping = $_POST['nama_pendamping'];
        $jekel = $_POST['jekel'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $sumber     = $_FILES['foto']['tmp_name'];
        $target     =  '../foto/user/';
        $foto  = $_FILES["foto"]["name"];

        $pindah     = move_uploaded_file($sumber, $target.$foto);
        $sql = "INSERT INTO tb_pendamping VALUES('$id_pendamping','$nik','$nama_pendamping','$jekel','$alamat','$no_hp','$foto')";
        $simpan = mysql_query($sql) or die(mysql_error());
        if ($simpan) {
                echo "<div class='alert alert-success'>
                <a href='?page=data_pendamping' class='close' data-dismiss='alert'>
                &times;
                </a> Simpan Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_pendamping'>";

            }else{
                echo "<div class='alert alert-warning'>
                <a href='?page=data_pendamping' class='close' data-dismiss='alert'>
                &times;
                </a> Simpan Data Berhasil
                </div>";

                echo "<meta http-equiv='refresh' content='1; url=?page=data_pendamping'>";
            }
         
}

                    $query = "select max(id_pendamping) from tb_pendamping";
                    $sql = mysql_query($query) or die(mysql_error());
                    $kode = mysql_fetch_array($sql);
                    if ($kode) {
                      $nilaikode = substr($kode[0], 2);
                      $kodenya = (int) $nilaikode;
                      $kodenya = $kodenya + 1;
                      $hasilkode = "PB".str_pad($kodenya, 4, "0", STR_PAD_LEFT);
                    }else{
                      $hasilkode = "PB0001";
                    }
?>

<script language="javascript">
    function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
   
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }
</script>
<div class="right_col" role="main">
<section class="content-header">
      <div class="">
         <div class="page-title">
         <div class="title_left">
      <h3>Tambah Pendamping</h3>
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID pendamping</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_pendamping" value="<?php echo $hasilkode ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nik</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik" placeholder="Nik pendamping" onkeypress="return hanyaAngka(event, false)" maxlength="16" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama pendamping</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pendamping" placeholder="Nama pendamping" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jekel">
                      <option>Pilih</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Telepon </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hp" placeholder="Nomer HP" onkeypress="return hanyaAngka(event, false)" maxlength="12" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
                    <input type="file" id="exampleInputFile" name="foto" required>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?page=data_pendamping" class="btn btn-default">Batal</a>
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