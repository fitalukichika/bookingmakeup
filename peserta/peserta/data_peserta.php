<div class="right_col" role="main">
<section class="content-header">
      <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3> Data Peserta </h3>
              </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-xs-12">
            <div class="box-header">
              <div class="x_panel">
                  <div class="x_title">
                   <h2>Data Peserta</h2>
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

              <!-- <a href="?page=tambah_peserta" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a> -->
              <br><br>

              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Nama Perusahaan</th>
                  <th>Produk</th>
                  <th>Nama Pelatihan</th>
                  <th>Status</th>
                  <th>Tahun Periode</th>
                  <th>Foto Peserta</th>
                  <th>SCAN tdi</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $tampilkan = "SELECT tb_pelatihan.id_pelatihan, tb_pendaftaran.id_peserta,tb_pendaftaran.no_hp, tb_pendaftaran.nama_peserta, tb_pendaftaran.alamat, tb_pendaftaran.nama_perusahaan, tb_pendaftaran.produk, tb_jenispelatihan.nama_pelatihan, tb_pendaftaran.status, tb_periode.tahun, tb_pendaftaran.foto_diri, tb_pendaftaran.tdi from tb_pendaftaran inner join tb_pelatihan on tb_pelatihan.id_pelatihan=tb_pendaftaran.id_pelatihan inner join tb_jenispelatihan on tb_pelatihan.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan inner join tb_periode on tb_pendaftaran.id_periode=tb_periode.id_periode where tb_pendaftaran.id_peserta='".$_SESSION['id_user']."'";
                    $no = 1;
                    $query = mysql_query($tampilkan);
                          if ($query === FALSE) {
                            die(mysql_error());
                          }
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_peserta']; ?></td>
                  <td><?php echo $data['nama_peserta']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['no_hp']; ?></td>
                  <td><?php echo $data['nama_perusahaan']; ?></td>
                  <td><?php echo $data['produk']; ?></td>
                  <td><?php echo $data['nama_pelatihan']; ?></td>                  
                  <td><?php echo $data['status']; ?></td>
                  <td><?php echo $data['tahun']; ?></td>

                  <td><a target=_blank" href="../foto/user/<?php echo $data['foto_diri']; ?>"><img src="../foto/user/<?php echo $data['foto_diri']; ?>" class="img-responsive" style="width: 80px;" ></td>
                  <td><a target=_blank" href="../foto/tdi/<?php echo $data['tdi']; ?>"><img src="../foto/tdi/<?php echo $data['tdi']; ?>" class="img-responsive" style="width: 80px;" ></td>

                  <td align="center">
                    <a href="?page=data_pesertadetail&id=<?php echo $data['id_peserta']; ?>" class="btn btn-warning"><span class="fa fa-hospital-o"></span> Detail</a>
                    <a href="?page=edit_peserta&id=<?php echo $data['id_peserta']; ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
                      
                  </td>
                          
                </tr>

                  <?php
                    $no++;
                    }
                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>