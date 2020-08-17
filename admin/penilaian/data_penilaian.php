<div class="right_col" role="main">
<section class="content-header">

       <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3> Data Penilaian </h3>
              </div>
   </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
             <div class="col-xs-12">
            <div class="box-header">
             <div class="x_panel">
                  <div class="x_title">
                   <h2>Data Penilaian</h2>
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
            <!-- <a href="?page=tambah_penilaian" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a> -->
              
           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pelatihan</th>
                  <th>Nama Pelatihan</th>
                  <th>Lokasi Pelatihan</th>
                  <th>Jumlah Peserta</th>

                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT *, COUNT(id_peserta) as jumlah FROM tb_pelatihan NATURAL JOIN tb_jenispelatihan LEFT JOIN tb_pendaftaran on tb_pendaftaran.id_jenispelatihan=tb_jenispelatihan.id_jenispelatihan WHERE 1 GROUP by tb_jenispelatihan.id_jenispelatihan");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){

                  ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_jenispelatihan']; ?></td>
                  <td><?php echo $data['nama_pelatihan']; ?></td>
                  <td><?php echo $data['tempat']; ?></td>
                  <td><?php echo $data['jumlah']; ?></td>
                  <td align="center">
                    <a href="?page=tambah_penilaian&id=<?php echo $data['id_jenispelatihan']; ?>" class="btn btn-dark btn-flat margin"><span class="fa fa-pencil"></span> Kelola Penilaian</a>

                    <a href="?page=hasil_penilaian&id=<?php echo $data['id_jenispelatihan']; ?>" class="btn btn-success"><span class="fa fa-suitcase"></span> Hasil Penilaian</a>
                    <!-- <a href="?page=hapus_penilaian&id=<?php echo $data['id_penilaian']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a> -->
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