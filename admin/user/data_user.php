    <div class="right_col" role="main">
  <section class="content">
    
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data User</h3>
              </div>

      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-header">
                <div class="x_panel">
                  <div class="x_title">
                   <h2>Data User</h2>
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
              <!--<a href="?page=tambah_user" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a>-->              
              <a href="?page=tambah_admin" class="btn btn-warning btn-flat margin"><span class="fa fa-user"></span> Buat User Petugas</a>
              <br><br>
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID User</th>
                  <th>NIK</th>
                  <th>NAMA</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT * FROM tb_user");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_user']; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['jekel']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['no_hp']; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['password']; ?></td>
                  <td><?php echo $data['status']; ?></td>
                  <td><img src="../foto/user/<?php echo $data['foto']; ?>" class="img-responsive" style="width: 80px;" ></td>
                  <td align="center">
                    <a href="?page=edit_user&id=<?php echo $data['id_user']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_user&id=<?php echo $data['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
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