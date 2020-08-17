    <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Periode</h3>
              </div>

      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-header">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Periode</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
    <!-- Main content -->

            <!-- /.box-header -->         
            <a href="?page=tambah_periode" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a>
              <br><br>
            <div class="box-body table-responsive">   
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Periode</th>
                  <th>Tahun Periode</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT * FROM tb_periode");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_periode']; ?></td>
                  <td><?php echo $data['tahun']; ?></td>
                  <td><?php echo $data['tgl_mulai'] ?></td>                  
                  <td><?php echo $data['tgl_selesai']; ?></td>
                  <td align="center">
                    <a href="?page=edit_periode&id=<?php echo $data['id_periode']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_periode&id=<?php echo $data['id_periode']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
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

    </section>