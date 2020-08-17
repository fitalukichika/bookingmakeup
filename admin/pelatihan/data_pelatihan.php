    <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Pelatihan</h3>
              </div>

      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-header">
                <div class="x_panel">
                  <div class="x_title">
                   <h2>Data Pelatihan</h2>
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
              <a href="?page=tambah_pelatihan" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a>
              <br><br>
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pelatihan</th>
                  <th>ID Jenis Pelatihan</th>
                  <th>Nama Pelatihan</th>
                  <th>Tempat</th>
                  <th>Jadwal</th>
                  <th>Sisa Kuota</th>
                  <th>Nama Pendamping</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $tampilkan = "SELECT tb_jenispelatihan.id_jenispelatihan, tb_pelatihan.id_pelatihan, tb_jenispelatihan.nama_pelatihan, tb_pelatihan.tempat, tb_pelatihan.jadwal, tb_pelatihan.kuota, tb_pendamping.nama_pendamping from tb_jenispelatihan inner join tb_pelatihan on tb_jenispelatihan.id_jenispelatihan=tb_pelatihan.id_jenispelatihan inner join tb_pendamping on tb_pendamping.id_pendamping=tb_pelatihan.id_pendamping order by id_pelatihan ASC";
                    $no = 1;
                    $query = mysql_query($tampilkan);
                          if ($query === FALSE) {
                            die(mysql_error());
                          }
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_pelatihan']; ?></td>
                  <td><?php echo $data['id_jenispelatihan']; ?></td>
                  <td><?php echo $data['nama_pelatihan']; ?></td>
                  <td><?php echo $data['tempat']; ?></td>
                  <td><?php echo $data['jadwal']; ?></td>
                  <td><?php echo $data['kuota']; ?></td>
                  <td><?php echo $data['nama_pendamping']; ?></td>
                  <td align="center">
                    <a href="?page=edit_pelatihan&id=<?php echo $data['id_pelatihan'];?>" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_pelatihan&id=<?php echo $data['id_pelatihan']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
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