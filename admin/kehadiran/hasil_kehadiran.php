<?php
if (isset($_POST['simpan']) and @$_POST['penilaian'] and @$_POST['id_pelatihan'] ) 
{
  $query = "DELETE FROM tb_penilaian WHERE id_pelatihan='".addslashes($_POST['id_pelatihan'])."' and tgl='".date('Y-m-d')."'";
  $query_hapus = mysql_query($query) or die(mysql_error());

  $simpan = 0;

  foreach ($_POST['penilaian'] as $key => $value) 
  {
    $peserta = explode('|', $value);
    $sql = "INSERT INTO tb_penilaian VALUES('','$_POST[id_pelatihan]','".date('Y-m-d')."','$peserta[0]')";
    // pr($sql);
    $out = mysql_query($sql) or die(mysql_error());
    // pr($out);
    $simpan = 1;
  }
  if ($simpan) 
  {
    echo "<div class='alert alert-success'>
    <a href='?page=data_kehadiran' class='close' data-dismiss='alert'>
    &times;
    </a> Simpan Data Berhasil
    </div>";

    echo "<meta http-equiv='refresh' content='1; url=?page=tambah_kehadiran&id=".@$_GET['id']."'";

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
                  <h3> Kelola Kehadiran <?php echo $nama_pelatihan; ?> </h3>
              </div>
   </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
             <div class="col-xs-12">
            <div class="box-header">
             <div class="x_panel">
                  <div class="x_title">
                   <h2> Hasil Kehadiran </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post">
            <div class="box-body">
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="?page=data_kehadiran" class="btn btn-default">Kembali</a>
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
            <table class="table table-hover table-bordered table-striped" style="padding: 10px">
              <thead>
                <tr>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">ID Peserta</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">No KTP</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">Nama Peserta</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">Absensi</th>
                </tr>
              </thead>
              <tbody class="tampil_daftar_peserta">
                <?php 
                $s_pendamping = mysql_query ("SELECT * FROM tb_pendaftaran A, tb_jenispelatihan B, tb_penilaian C WHERE A.id_jenispelatihan=B.id_jenispelatihan AND C.id_jenispelatihan=B.id_jenispelatihan AND C.id_peserta=A.id_peserta AND C.id_jenispelatihan = '".addslashes($_GET['id'])."'") or die(mysql_error());
                while ($data = mysql_fetch_array($s_pendamping)) 
                {
                  ?>
                  <tr>
                    <td><?php echo $data['id_peserta']; ?></td>
                    <td><?php echo $data['no_ktp']; ?></td>
                    <td><?php echo $data['nama_peserta']; ?></td>
                    <td><?php echo $data['absensi']; ?></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
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