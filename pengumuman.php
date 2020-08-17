<div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body">
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h2 class="box-title"><b><center>DATA PESERTA PELATIHAN DITERIMA<center></b></h2>
                    </div>
                    <div class="box-body">
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
                        <tr bgcolor="grey" class="header">
                           <th>No</th>
                            <th>ID Peserta</th>
                            <th>Nama Peserta</th>
                            <th>Alamat</th>
                            <th>Nama Perusahaan</th>
                            <th>Produk</th>
                            <th>Nama Pelatihan</th>
                            <th>Tahun Periode</th>
                            <th style="text-align: center"></th>
                          </tr>
                        </thead>
                        <tbody>
                                  <?php
                                  include 'koneksi.php';
                          //================================= Query Pencarian ==================================
                          if (isset($_POST['btncari'])) {
                            $tampilkan = "SELECT tb_pelatihan.id_pelatihan, tb_pendaftaran.id_peserta, tb_pendaftaran.nama_peserta, tb_pendaftaran.alamat, tb_pendaftaran.nama_perusahaan, tb_pendaftaran.produk, tb_jenispelatihan.nama_pelatihan, tb_pendaftaran.status, tb_periode.tahun, tb_pendaftaran.foto_diri, tb_pendaftaran.tdi from tb_pendaftaran inner join tb_pelatihan on tb_pelatihan.id_pelatihan=tb_pendaftaran.id_pelatihan inner join tb_jenispelatihan on tb_pelatihan.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan inner join tb_periode on tb_pendaftaran.id_periode=tb_periode.id_periode where tb_pendaftaran.status='diterima' and tb_pendaftaran.id_pelatihan = '".$_POST['jns_pelatihan']."'";
                             }else{
                              $tampilkan = "SELECT tb_pelatihan.id_pelatihan, tb_pendaftaran.id_peserta, tb_pendaftaran.nama_peserta, tb_pendaftaran.alamat, tb_pendaftaran.nama_perusahaan, tb_pendaftaran.produk, tb_jenispelatihan.nama_pelatihan, tb_pendaftaran.status, tb_periode.tahun, tb_pendaftaran.foto_diri, tb_pendaftaran.tdi from tb_pendaftaran inner join tb_pelatihan on tb_pelatihan.id_pelatihan=tb_pendaftaran.id_pelatihan inner join tb_jenispelatihan on tb_pelatihan.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan inner join tb_periode on tb_pendaftaran.id_periode=tb_periode.id_periode where tb_pendaftaran.status='diterima'";
                            }
                            $query = mysql_query($tampilkan);                    
                            $no = 1;
                            while($data = mysql_fetch_array($query)){
                          ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['id_peserta']; ?></td>
                          <td><?php echo $data['nama_peserta']; ?></td>
                          <td><?php echo $data['alamat']; ?></td>
                          <td><?php echo $data['nama_perusahaan']; ?></td>
                          <td><?php echo $data['produk']; ?></td>
                          <td><?php echo $data['nama_pelatihan']; ?></td>                  
                          <td><?php echo $data['tahun']; ?></td>
                          </tr>
                  <?php
                    $no++;
                    }
                      
                  ?>
                        </tbody>
                    </div>
                  </div>
                </div>
              </div>
              </table>
            </section>
          </div>
        </div>
      </div>

      