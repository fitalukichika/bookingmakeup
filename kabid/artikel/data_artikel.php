<section class="content-header">
      <h1>
        Data Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-television" class="active"></i>Data Artikel</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Artikel</h3>
            </div>
            <!-- /.box-header -->            
            <a href="?page=tambah_artikel" class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Data</a>
              <br><br>
            <div class="box-body table-responsive">   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Artikel</th>
                  <th>Judul Artikel</th>
                  <th>Kategori</th>
                  <th>Tanggal Post</th>
                  <th>Nama Autor</th>

                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT * FROM tb_artikel natural join tb_user");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_artikel']; ?></td>
                  <td><?php echo $data['judul']; ?></td>                 
                  <td><?php echo $data['kategori']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['nama']; ?></td>

                  <td align="center">
                    <a href="?page=edit_artikel&id=<?php echo $data['id_artikel']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_artikel&id=<?php echo $data['id_artikel']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
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