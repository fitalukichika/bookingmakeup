<?php
if (isset($_POST['simpan'])) 
{
  $id_peserta = $_POST['id_peserta'];
  $nama_peserta = $_POST['nama_peserta'];
  $tempat = $_POST['tempat'];
  $tgl_lahir = $_POST['tgl_lahir']
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $produk = $_POST['produk'];
  $nilai_investasi = $_POST['nilai_investasi'];
  $jml_tenaga = $_POST['jml_tenaga'];
  $daerah_pasar = $_POST['daerah_pasar'];

  $sumber     = $_FILES['TDI']['tmp_name'];
  $target     =  '../foto/file/';
  $nama_foto  = $id_peserta.'_tdi_'.$_FILES["TDI"]["name"];
  $pindah     = move_uploaded_file($sumber, $target.$nama_foto);

  $sumber1     = $_FILES['PIRT']['tmp_name'];
  $target1     =  '../foto/file/';
  $nama_foto1  = $id_peserta.'_pirt_'.$_FILES["PIRT"]["name"];
  $pindah1     = move_uploaded_file($sumber1, $target1.$nama_foto1);

  $nama_pelatihan = $_POST['nama_pelatihan'];
  $harapan = $_POST['harapan'];

  $sumber2     = $_FILES['foto_diri']['tmp_name'];
  $target2     =  '../foto/user/';
  $nama_foto2  = $id_peserta.'_ft_'.$_FILES["foto_diri"]["name"];
  $pindah2     = move_uploaded_file($sumber2, $target2.$nama_foto2);

  $sumber3     = $_FILES['fc_ktp']['tmp_name'];
  $target3     =  '../foto/file/';
  $nama_foto3  = $id_peserta.'_ktp_'.$_FILES["fc_ktp"]["name"];
  $pindah3     = move_uploaded_file($sumber3, $target3.$nama_foto3);

  $sumber4     = $_FILES['foto_produk1']['tmp_name'];
  $target4     =  '../foto/file/';
  $nama_foto4  = $id_peserta.'_produk1_'.$_FILES["foto_produk1"]["name"];
  $pindah4     = move_uploaded_file($sumber4, $target4.$nama_foto4);

  $sumber5     = $_FILES['foto_produk2']['tmp_name'];
  $target5     =  '../foto/file/';
  $nama_foto5  = $id_peserta.'_produk2_'.$_FILES["foto_produk2"]["name"];
  $pindah5     = move_uploaded_file($sumber5, $target5.$nama_foto5);

  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  $tahun     = $_POST['tahun'];

  $lihat = mysql_query("SELECT * from tb_pendaftaran where no_ktp = '$no_ktp'");
  $cek = mysql_num_rows($lihat);
  if ($cek >= 1) {
    echo "NIK Sudah Terdaftar";
  }else{
    $query = "INSERT INTO tb_pendaftaran VALUES('".addslashes($id_peserta)."','".addslashes($nama_peserta)."','".addslashes($tempat)."','".addslashes($tgl_lahir)."','".addslashes($alamat)."','".addslashes($no_hp)."','".addslashes($nama_perusahaan)."','".addslashes($produk)."','".addslashes($nilai_investasi)."','".addslashes($jml_tenaga)."','".addslashes($daerah_pasar)."','".addslashes($nama_foto)."','".addslashes($nama_foto1)."','".addslashes($nama_pelatihan)."','".addslashes($harapan)."','".addslashes($nama_foto2)."','".addslashes($nama_foto3)."','".addslashes($nama_foto4)."','".addslashes($nama_foto5)."','".addslashes($username)."','".addslashes($password)."','Calon','".addslashes($tahun)."')";
  $update_kuota=mysql_query("UPDATE tb_jenispelatihan SET kuota=kuota-1 WHERE id_jenispelatihan='$nama_pelatihan'") or die(mysql_error());
  $simpan = mysql_query($query) or die(mysql_error());
  if ($simpan) 
  {
    echo "<div class='alert alert-success'>
      <a href='?page=data_peserta' class='close' data-dismiss='alert'>
      &times;
      </a> Simpan Data Berhasil
      </div>";

    echo "<meta http-equiv='refresh' content='1; url=?page=data_peserta'>";
  }else
  {
    echo "<div class='alert alert-warning'>
      <a href='?page=data_peserta' class='close' data-dismiss='alert'>
      &times;
      </a> Simpan Data Berhasil
      </div>";

    echo "<meta http-equiv='refresh' content='1; url=?page=data_peserta'>";
  }
  }
  
}

$query = "select max(id_peserta) from tb_pendaftaran";
$sql = mysql_query($query) or die(mysql_error());
$kode = mysql_fetch_array($sql);
if ($kode) 
{
  $nilaikode = substr($kode[0], 1);
  $kodenya = (int) $nilaikode;
  $kodenya = $kodenya + 1;
  $hasilkode = "P".str_pad($kodenya, 4, "0", STR_PAD_LEFT);
}else
{
  $hasilkode = "P0001";
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

<section class="content-header">
  <h1>
    Tambah Peserta
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-television" class="active"></i> Data peserta</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Silahkan isi data dengan benar</h3>
        </div>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">ID Peserta</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="id_peserta" value="<?php echo $hasilkode ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_peserta" placeholder="Nama Peserta" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Tempat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_peserta" placeholder="Tempat Lahir" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="control-label col-sm-2">Tanggal</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="tgl_lahir" 
              id="TanggalLahir" placeholder="Tanggal Lahir"/>
             </div>
              </div> 
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat" required></textarea>
              </div>
            </div>   
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">No. Telepon </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_hp" placeholder="Nomer Telepon" onkeypress="return hanyaAngka(event, false)" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Perusahaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Produk</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="produk" placeholder="Hasil Produk" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nilai Investasi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nilai_investasi" placeholder="Nilai Investasi" onkeypress="return hanyaAngka(event, false)" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Tenaga Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="jml_tenaga" placeholder="Jumlah Tenaga Kerja" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Daerah Pasar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="daerah_pasar" placeholder="Daerah Pasar" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Scan TDI</label>
              <div class="col-sm-10">
                <input type="file"  name="TDI" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Scan PIRT</label>
              <div class="col-sm-10">
                <input type="file"  name="PIRT" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Pelatihan</label>
              <div class="col-sm-10">
                <select class="form-control" name="nama_pelatihan">
                  <option>Pilih*</option>
                  <?php
                    $s_magang = mysql_query("SELECT tb_jenispelatihan.id_jenispelatihan, tb_jenispelatihan.nama_pelatihan FROM tb_jenispelatihan left join tb_pelatihan on tb_jenispelatihan.id_jenispelatihan=tb_pelatihan.id_jenispelatihan WHERE kuota > 0 and tb_pelatihan.id_pelatihan is null") or die(mysql_error());
                    while ($h_pelatihan = mysql_fetch_array($s_pelatihan)) {
                    echo "<option value='$h_pelatihan[id_jenispelatihan]'>$h_pelatihan[nama_pelatihan]</option>"; 
                  }
                  ?>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Harapan</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="harapan" required></textarea>
              </div>
            </div>   
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Foto Peserta</label>
              <div class="col-sm-10">
                <input type="file"  name="foto_diri" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Scan KTP</label>
              <div class="col-sm-10">
                <input type="file"  name="fc_ktp" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Foto Produk 1</label>
              <div class="col-sm-10">
                <input type="file"  name="foto_produk1" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Foto Produk 2</label>
              <div class="col-sm-10">
                <input type="file"  name="foto_produk2" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username" placeholder="username" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="password" placeholder="password" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tahun Periode</label>
              <div class="col-sm-2">
                <select class="form-control" name="tahun" readonly>
                  <?php
                    $s_periode = mysql_query("SELECT id_periode,tahun FROM tb_periode") or die(mysql_error());
                    while ($h_periode = mysql_fetch_array($s_periode)) {
                    echo "<option value='$h_periode[id_periode]'>$h_periode[tahun]</option>"; 
                  }
                  ?>
                </select>
              </div>
            </div>
            </div>
          <div class="box-footer">
            <a href="?page=data_peserta" class="btn btn-danger btn-lg">Batal</a>
            <button type="submit" class="btn btn-info pull-right btn-lg" name="simpan" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
 <script src="bootstrap-3.3.7-dist/js/bootstrap-datepicker.js"></script>  <!-- link file ini untuk menggunakan datepicker pada tanggal -->
            
        <script> 
            $('#TanggalLahir').datepicker({
                 format: 'yyyy-mm-dd',
                 autoclose: true,
                 todayHighlight: true
            })
        </script> <!-- script untuk menampilkan datepicker ketika tanggal menggunakan id=datepicker -->   
          