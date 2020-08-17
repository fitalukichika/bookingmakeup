<?php
/*if (isset($_POST['simpan']) and @$_POST['penilaian'] and @$_POST['id_pemagangan'] ) 
{
  $query = "DELETE FROM tb_penilaian WHERE id_pemagangan='".addslashes($_POST['id_pemagangan'])."' and tgl='".date('Y-m-d')."'";
  $query_hapus = mysql_query($query) or die(mysql_error());

  $simpan = 0;

  foreach ($_POST['penilaian'] as $key => $value) 
  {
    $peserta = explode('|', $value);
    $sql = "INSERT INTO tb_penilaian VALUES('','$_POST[id_pemagangan]','".date('Y-m-d')."','$peserta[0]')";
    // pr($sql);
    $out = mysql_query($sql) or die(mysql_error());
    // pr($out);
    $simpan = 1;
  }*/
  if (isset($_POST['simpan'])) {

    $jml = count($_POST['id_peserta']);
    for ($i=0; $i < $jml; $i++) { 
    $query = mysql_query("SELECT * FROM tb_kehadiran A, tb_pelatihan B, tb_pelatihan C WHERE A.id_pelatihan=b.id_pelatihan AND B.id_jenispelatihan=C.id_jenispelatihan AND (A.id_peserta='".$_POST['id_peserta'][$i]."' AND C.id_jenispelatihan='".$_GET['id']."')") or die(mysql_error());
    $kehadiran = mysql_num_rows($query);
    $nilai_akhir = (($kehadiran*10)+$_POST['nilai'][$i])/2;
    if ($nilai_akhir >= 85 and $nilai_akhir <= 100) {
      $keterangan = "Sangat Bagus";
    }elseif ($nilai_akhir >= 70 and $nilai_akhir <= 84) {
      $keterangan = "Bagus";
    }elseif ($nilai_akhir >= 50 and $nilai_akhir <= 69) {
      $keterangan = "Kurang Bagus";
    }else{
      $keterangan = "Tidak Bagus";
    }


    $simpan = mysql_query("INSERT INTO tb_penilaian VALUES (NULL, '".$_GET['id']."','".$_POST['id_peserta'][$i]."','".$_SESSION['id_user']."','".$_POST['nilai'][$i]."','$kehadiran','$nilai_akhir','$keterangan')") or die(mysql_error()); 
    } 
      if ($simpan) 
      {
        echo "<div class='alert alert-success'>
        <a href='?page=data_penilaian' class='close' data-dismiss='alert'>
        &times;
        </a> Simpan Data Berhasil
        </div>";

        echo "<meta http-equiv='refresh' content='1; url=?page=data_penilaian'";

      }  
  }

if (@$_GET['id']) 
{
  $s_pendamping = mysql_query("SELECT id_pendamping, nama_pendamping,tempat,jadwal,nama_pelatihan,id_pelatihan FROM tb_pendamping NATURAL join tb_pelatihan natural join tb_jenispelatihan WHERE id_jenispelatihan='".addslashes($_GET['id'])."' GROUP by id_jenispelatihan") or die(mysql_error());
  while ($h_pendamping = mysql_fetch_array($s_pendamping)) 
  {
    $id_pendamping = $h_pendamping['id_pendamping'];
    $nama_pendamping = $h_pendamping['nama_pendamping'];
    $tempat = $h_pendamping['tempat'];
    $jadwal = $h_pendamping['jadwal'];
    $nama_pelatihan = $h_pendamping['nama_pelatihan'];
    $id_pelatihan = $h_pendamping['id_pelatihan'];
  }
  ?>
<div class="right_col" role="main">
<section class="content-header">
     <div class="">
            <div class="page-title">
              <div class="title_left">
      <h3> Tambah Jenis Pelatihan <?php echo $nama_pelatihan; ?> </h3>
      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

            <div class="box-header with-border">
             <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Penilaian</h2>
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
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="?page=data_penilaian" class="btn btn-default">Kembali</a><!-- 
              <button type="submit" class="btn btn-info pull-right" name="simpan" >Simpan</button> -->
            </div>
            <!-- /.box-footer -->
          </form>
          <div class="text-center">
            <h4>Daftar Peserta</h4>
          </div>
          <?php 
          $tgl_penilaian = array();
          $s_pre = mysql_query("SELECT date_format(tgl,'%d') as hari, date_format(tgl,'%M') as bulan, date_format(tgl,'%Y') as tahun, GROUP_concat(id_peserta) as peserta FROM tb_kehadiran natural join tb_pelatihan natural join tb_jenispelatihan WHERE id_jenispelatihan='".addslashes(@$_GET['id'])."' GROUP by tgl") or die(mysql_error());
          while ($h_pre = mysql_fetch_array($s_pre)) 
          {
            $list_peserta = array();
            foreach (explode(',', $h_pre['peserta']) as $key => $value) 
            {
              $list_peserta[$value] = 1;
            }
            $tgl_penilaian[$h_pre['tahun']][$h_pre['bulan']][$h_pre['hari']] = $list_peserta;
          }
          $r_tb_header = array(
            'tahun' => '',
            'bulan' => '',
            'hari' => ''
          );
          foreach ($tgl_penilaian as $key => $value) 
          {
            $r_tahun = 0;
            foreach ($value as $key1 => $value1) 
            {
              $r_bulan = 0;
              foreach ($value1 as $key2 => $value2) 
              {
                $r_tahun++;
                $r_bulan++;
                $r_tb_header['hari'] .= '<th class="text-center">'.$key2.'</th>';
              }
              $r_tb_header['bulan'] .= '<th class="text-center" colspan="'.$r_bulan.'">'.$key1.'</th>';
            }
            $r_tb_header['tahun'] .= '<th class="text-center" colspan="'.$r_tahun.'">'.$key.'</th>';
          }
          // pr($tgl_presensi);
          // pr($r_tb_header);
          ?>
          <div class="table-responsive" >
            <form method="post" action="">
            <table class="table table-hover table-bordered table-striped" style="padding: 10px">
              <thead>
                <tr>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">ID Peserta</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">No KTP</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">Nama Peserta</th>
                  <th class="form-group" width="20%">Nilai Peserta</th>
                </tr>
              </thead>
              <tbody class="tampil_daftar_peserta">
                <?php 
                $s_pendamping = mysql_query("select tb_pendaftaran.id_peserta, tb_pendaftaran.no_ktp, tb_pendaftaran.nama_peserta, tb_penilaian.nilai from tb_pendaftaran left join tb_penilaian on tb_pendaftaran.id_peserta=tb_penilaian.id_peserta  INNER JOIN tb_jenispelatihan on tb_pendaftaran.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan where tb_jenispelatihan.id_jenispelatihan='".addslashes($_GET['id'])."' AND tb_pendaftaran.status='diterima'") or die(mysql_error());
                while ($data = mysql_fetch_array($s_pendamping)) 
                {
                  ?>
                  <tr>
                    <td><?php echo $data['id_peserta']; ?><input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $data['id_peserta']; ?>"></td>
                    <td><?php echo $data['no_ktp']; ?></td>
                    <td><?php echo $data['nama_peserta']; ?></td>
                    <td><div><input type="text" class="form-control" name="nilai[]" value="<?php echo $data['nilai']; ?>"></div></td>
                  </tr>
                  <?php
                }
                ?>
                  <tr>
                    <td colspan="8"><center><input type="submit" class="btn btn-info" name="simpan" value="SIMPAN" ></center></td>
                  </tr>
              </tbody>
            </table>
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <?php
}
?>