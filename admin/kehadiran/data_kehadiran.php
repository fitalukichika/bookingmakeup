    <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Peserta</h3>
              </div>

      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-header">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                   <h3>Pilih Pelatihan</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
               <!-- =================================  Pencarian ==================================  -->
              <div class="row">
                <form method="post">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <select class="form-control" name="jns_pelatihan">
                        <option>Pilih*</option>
                        <?php
                        $q_jns = mysql_query("SELECT * FROM tb_jenispelatihan left join tb_pelatihan on tb_jenispelatihan.id_jenispelatihan=tb_pelatihan.id_jenispelatihan GROUP BY nama_pelatihan") or die(mysql_error());
                        while ($dt_jns = mysql_fetch_array($q_jns)) {
                        ?>
                        <option value="<?php echo $dt_jns['id_pelatihan']; ?>"><?php echo $dt_jns['nama_pelatihan'] ?></option>
                        <?php
                         } 
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <input type="submit" name="btncari" value="Search" class="btn btn-info">
                    </div>
                  </div>
                </form>
              </div>
              <!-- =======================================================================================  -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Alamat</th>
                  <th>Jekel</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  //================================= Query Pencarian ==================================
                  if (isset($_POST['btncari'])) {
                    $tampilkan = "SELECT tb_pelatihan.id_pelatihan, tb_pendaftaran.id_peserta, tb_pendaftaran.nama_peserta, tb_pendaftaran.alamat, tb_pendaftaran.jekel, tb_pendaftaran.produk, tb_jenispelatihan.nama_pelatihan, tb_pendaftaran.status, tb_periode.tahun, tb_pendaftaran.foto_diri, tb_pendaftaran.tdi from tb_pendaftaran inner join tb_pelatihan on tb_pelatihan.id_pelatihan=tb_pendaftaran.id_pelatihan inner join tb_jenispelatihan on tb_pelatihan.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan inner join tb_periode on tb_pendaftaran.id_periode=tb_periode.id_periode where tb_pendaftaran.status='diterima' and tb_pendaftaran.id_pelatihan = '".$_POST['jns_pelatihan']."'";
                    $query = mysql_query($tampilkan);                    
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_peserta']; ?></td>
                  <td><?php echo $data['nama_peserta']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php if ($data['jekel'] == 'L') {
                    echo "Laki-Laki";
                  }else{
                    echo "Perempuan";
                  } ?></td>          
                  
                  <td align="center">
                    <form method="POST">
                      <input type="hidden" name="peserta" value="<?php echo $data['id_peserta']; ?>">
                      <input type="hidden" name="pelatihan" value="<?php echo $data['id_pelatihan']; ?>">
                      <button name="masuk"  class="btn btn-info">Masuk</button>
                      <button name="tidak"  class="btn btn-warning">Tidak</button>
                    </form>
                    
                  </td>
                </tr>
                  <?php
                    $no++;
                    }
                      }
                  ?>
              </table>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->
    </section>
    <?php 
      if (isset($_POST['masuk'])) {
        $peserta = $_POST['peserta'];
        $pelatihan = $_POST['pelatihan'];
        $date = date("Y-m-d");
        $lihat = mysql_query("SELECT * from tb_kehadiran where tgl = '$date' and id_peserta = '$peserta'");
        $cek = mysql_fetch_array($lihat);
          if ($cek['tgl'] == NULL) {         
            $tidak = mysql_query("INSERT INTO `tb_kehadiran` (`id_hadir`, `id_pelatihan`, `presensi`, `tgl`, `id_peserta`) VALUES (NULL, '$pelatihan', 'masuk', '$date', '$peserta')");
          }else{
              echo"<script>alert('Sudah Diabsen !');</script>";
              echo"<script></script>";
          }
        }elseif (isset($_POST['tidak'])) {
          $peserta = $_POST['peserta'];
          $pelatihan = $_POST['pelatihan'];
          $date = date("Y-m-d");
          $lihat = mysql_query("SELECT * from tb_kehadiran where tgl = '$date' and id_peserta = '$peserta'");
          $cek = mysql_num_rows($lihat);
            if ($cek == NULL) {         
              $tidak = mysql_query("INSERT INTO `tb_kehadiran` (`id_hadir`, `id_pelatihan`, `presensi`, `tgl`, `id_peserta`) VALUES (NULL, '$pelatihan', 'tidak', '$date', '$peserta')");
            }else{
              echo"<script>alert('Sudah Diabsen !');</script>";
              echo"<script>window.location='index.php?page=data_kehadiran=';</script>";
            } 
        }
     ?>