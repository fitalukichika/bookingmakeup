    <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Jenis Pelatihan</h3>
              </div>

      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-header">
                <div class="x_panel">
                  <div class="x_title">
                   <h2>Data Jenis Pelatihan</h2>
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
            <a href="?page=tambah_daftarpelatihan" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a>
              <br><br>
              
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pelatihan</th>
                  <th>Nama Pelatihan</th>
                  <!--<th>Tempat</th>
                  <th>Jadwal</th>
                  <th>Sisa Kuota</th>-->
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT * FROM tb_jenispelatihan order by id_jenispelatihan ASC");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_jenispelatihan']; ?></td>
                  <td><?php echo $data['nama_pelatihan']; ?></td>
                  <!--<td><?php echo $data['tempat']; ?></td>
                  <td><?php echo $data['jadwal']; ?></td>
                  <td><?php echo $data['kuota']; ?></td>-->
                  <td align="center">
                    <a href="?page=edit_daftarpelatihan&id=<?php echo $data['id_jenispelatihan']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_daftarpelatihan&id=<?php echo $data['id_jenispelatihan']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
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
      </div>
      </div>

      </section>
 