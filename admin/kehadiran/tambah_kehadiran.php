<?php
if (isset($_POST['simpan']) and @$_POST['kehadiran'] and @$_POST['id_pelatihan'] ) 
{
  $query = "DELETE FROM tb_kehadiran WHERE id_pelatihan='".addslashes($_POST['id_pelatihan'])."' and tgl='".date('Y-m-d')."'";
  $query_hapus = mysql_query($query) or die(mysql_error());

  $simpan = 0;

  foreach ($_POST['kehadiran'] as $key => $value) 
  {
    $peserta = explode('|', $value);
    $sql = "INSERT INTO tb_kehadiran VALUES('','$_POST[id_pelatihan]','".date('Y-m-d')."','$peserta[0]')";
    // pr($sql);
    $out = mysql_query($sql) or die(mysql_error());
    // pr($out);
    $simpan = 1;
  }
  if ($simpan) 
  {
    echo "<div class='alert alert-success'>
    <a href='?page=data_pelatihan' class='close' data-dismiss='alert'>
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
                  <h3> Kelola Kehadiran Pelatihan <?php echo $nama_pelatihan; ?> </h3>
              </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box-header with-border">
            <div class="x_panel">
                  <div class="x_title">
                   <h2>Tambah Kehadiran</h2>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pendamping</label>
                <div class="col-sm-10">
                  <input type="hidden" name="id_pelatihan" value="<?php echo $id_pelatihan; ?>">
                  <input type="text" name="" id="input" class="form-control" value="<?php echo $nama_pendamping; ?>" readonly="readonly" required="required" pattern="" title="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                  <select name="" id="input" class="form-control" required="required" readonly="readonly">
                    <option value=""><?php echo date('d M Y'); ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Peserta</label>
                <div class="col-sm-10">
                  <div class="checkbox">
                    <?php 
                    $s_pendamping = mysql_query("SELECT * FROM tb_pendaftaran natural join tb_pelatihan where id_jenispelatihan = '".addslashes($_GET['id'])."' and status='diterima'") or die(mysql_error());
                    while ($data = mysql_fetch_array($s_pendamping)) 
                    {
                      ?>
                        <div class="row" style="padding-left: 20px">
                          <label>
                            <input type="checkbox" name="kehadiran[]" value="<?php echo $data['id_peserta'].'|'.$data['id_pelatihan']; ?>" checked="checked">
                            <?php echo $data['id_peserta'].' | '.$data['no_ktp'].' | '.$data['nama_peserta']; ?>
                          </label>
                        </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="?page=data_kehadiran" class="btn btn-default">Kembali</a>
              <button type="submit" class="btn btn-info pull-right" name="simpan" >Simpan</button>
            </div>
            <!-- /.box-footer -->
          </form>
          <div class="text-center">
            <h4>Daftar Kehadiran</h4>
          </div>
          <?php 
          $tgl_kehadiran = array();
          $s_pre = mysql_query("SELECT date_format(tgl,'%d') as hari, date_format(tgl,'%M') as bulan, date_format(tgl,'%Y') as tahun, GROUP_concat(id_peserta) as peserta FROM tb_kehadiran natural join tb_pelatihan natural join tb_jenispelatihan natural join tb_pendaftaran WHERE id_jenispelatihan='".addslashes(@$_GET['id'])."' and tb_pendaftaran.status='diterima' GROUP by tgl") or die(mysql_error());
          while ($h_pre = mysql_fetch_array($s_pre)) 
          {
            $list_peserta = array();
            foreach (explode(',', $h_pre['peserta']) as $key => $value) 
            {
              $list_peserta[$value] = 1;
            }
            $tgl_kehadiran[$h_pre['tahun']][$h_pre['bulan']][$h_pre['hari']] = $list_peserta;
          }
          $r_tb_header = array(
            'tahun' => '',
            'bulan' => '',
            'hari' => ''
          );
          foreach ($tgl_kehadiran as $key => $value) 
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
          // pr($tgl_kehadiran);
          // pr($r_tb_header);
          ?>
          <div class="table-responsive" >
            <table class="table table-hover table table-striped table-bordered dt-responsive nowrap" style="padding: 10px">
              <thead>
                <tr>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">ID Peserta</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">No KTP</th>
                  <th style="vertical-align: middle; " class="text-center" rowspan="3">Nama Peserta</th>
                  <?php echo $r_tb_header['tahun']; ?>
                </tr>
                <tr>
                  <?php echo $r_tb_header['bulan']; ?>
                </tr>
                <tr>
                  <?php echo $r_tb_header['hari']; ?>
                </tr>
                <tr>
                </tr>
              </thead>
              <tbody class="tampil_daftar_peserta">
                <?php 
                $s_pendamping = mysql_query("SELECT * FROM tb_pendaftaran natural join tb_pelatihan where id_jenispelatihan = '".addslashes($_GET['id'])."' AND status='diterima'") or die(mysql_error());
                while ($data = mysql_fetch_array($s_pendamping)) 
                {
                  ?>
                  <tr>
                    <td><?php echo $data['id_peserta']; ?></td>
                    <td><?php echo $data['no_ktp']; ?></td>
                    <td><?php echo $data['nama_peserta']; ?></td>
                    <?php
                    foreach ($tgl_kehadiran as $key => $value) 
                    {
                      foreach ($value as $key1 => $value1) 
                      {
                        foreach ($value1 as $key2 => $value2) 
                        {
                          $is_masuk = (array_key_exists($data['id_peserta'], $value2)) ? 'v' : '-' ;
                          echo '<td class="text-center">'.$is_masuk.'</td>';
                        }
                      }
                    }
                    ?>
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