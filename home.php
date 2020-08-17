<?php 
include "koneksi.php";
if (@$_GET['page'] == '') 
{
  ?>
<div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body">
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h2 class="box-title"><b><center>JENIS PELATIHAN YANG BISA DIIKUTI<center></b></h2>
                    </div>
                    <div class="box-body">
                      <br>
                      <?php
                        $thn = date('Y');
                        $query = mysql_query("SELECT * FROM tb_periode WHERE tahun='$thn'") or die(mysql_error());
                        $datane = mysql_fetch_array($query);
                      ?>
                      <h3>Periode Pendaftaran di Buka: <?php echo date('d F Y',  strtotime($datane['tgl_mulai'])) .' sampai '.date('d F Y',  strtotime($datane['tgl_selesai'])); ?></h3>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelatihan</th>
                          <th>Tempat</th>
                          <th>Jadwal</th>
                          <th><center>Sisa Kuota</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = mysql_query("SELECT * FROM tb_jenispelatihan left join tb_pelatihan on tb_jenispelatihan.id_pelatihan=tb_pelatihan.id_jenispelatihan WHERE kuota > 0 and tb_pelatihan.id_pelatihan is null");
                          $no = 1;
                          while($data = mysql_fetch_array($query))
                          {
                            ?>
                            <tr>
                              <td><?php echo $no; ?></td>                      
                              <td><?php echo $data['nama_pelatihan']; ?></td>
                              <td><?php echo $data['tempat']; ?></td>
                              <td><?php echo $data['jadwal']; ?></td>
                              <td><center><?php echo $data['kuota']; ?></center></td>
                            </tr>
                            <?php
                            $no++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body " style="text-align: center;">

            <?php
             $now = date('Y-m-d');
            // $now = '2019-01-21';
            $tgl_a = date('Y-m-d', strtotime('-1 days', strtotime($datane['tgl_mulai'])));
            $tgl_b = date('Y-m-d', strtotime('+1 days', strtotime($datane['tgl_selesai'])));

            if($now >= $tgl_a and $now <= $tgl_b){
              echo '<label> Silahkan Daftar Untuk Mengikuti Pelatihan</label>
            <br>
            <a href="?page=tambah_peserta" class="btn btn-success bt-lg" style="color:black">MENDAFTAR</a>';
              
            } else {
              echo "<div style='color:red'>BUKAN PERIODE PENDAFTARAN</div>";
              
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="padding:20px 0 0 0;" class="row"></div>
  <?php
}
elseif ($_GET['page'] == 'tambah_peserta') 
{
  include "admin/peserta/tambah_peserta_umum.php";
}
elseif ($_GET['page'] == 'data_user') 
{
  include "user/data_user.php";
}
elseif ($_GET['page'] == 'info') 
{
  include "info.php";
}
elseif ($_GET['page'] == 'informasi') 
{
  include "admin/artikel/data_artikel.php";
}
elseif ($_GET['page'] == 'artikel') 
{
  include "admin/artikel/data_artikel.php";
}
elseif ($_GET['page'] == 'berita') 
{
  include "admin/artikel/data_artikel.php";
}
elseif ($_GET['page'] == 'profil') 
{
  include "profil.php";
}
elseif ($_GET['page'] == 'detail_artikel') 
{
  include "detail_artikel.php";
}
elseif ($_GET['page'] == 'tata_cara') 
{
  include "tata_cara.php";
}
elseif ($_GET['page'] == 'profil_dinas') 
{
  include "profil_dinas.php";
}
elseif ($_GET['page'] == 'lokasi_map') 
{
  include "lokasi_map.php";
}
?>
</center>
</center>
</b>
</h2>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
