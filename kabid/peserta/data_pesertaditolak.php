<section class="content-header">
      <h1>
        Data Peserta
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-television" class="active"></i> Data Peserta Ditolak</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Peserta Ditolak</h3>
            </div>
            <!-- /.box-header -->

              <a href="?page=data_pesertacalon" class="btn bg-navy btn-flat margin"><span class="fa fa-mail-reply (alias)""></span> Data Calon Peserta</a>
              <br><br>
            <div class="box-body  table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Alamat</th>
                  <th>Usaha</th>
                  <th>Hasil Produk</th>
                  <th>Nama Magang</th>
                  <th>Status</th>
                  <th>Tahun Periode</th>
                  <th>File Foto Peserta</th>
                  <th>SCAN Surat Keterangan Desa</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysql_query("SELECT * FROM tb_pendaftaran,tb_periode,tb_jenismagang WHERE tb_pendaftaran.id_magang=tb_jenismagang.id_magang and tb_pendaftaran.id_periode=tb_periode.id_periode and tb_pendaftaran.status='ditolak'");
                    $no = 1;
                    while($data = mysql_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_peserta']; ?></td>
                  <td><?php echo $data['nama_peserta']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['usaha']; ?></td>
                  <td><?php echo $data['hasil_produk']; ?></td>
                  <td><?php echo $data['nama_magang']; ?></td>                  
                  <td><?php echo $data['status']; ?></td>
                  <td><?php echo $data['tahun']; ?></td>

                  <td><a target=_blank" href="../foto/user/<?php echo $data['foto']; ?>"><img src="../foto/user/<?php echo $data['foto']; ?>" class="img-responsive" style="width: 80px;" ></td>
                  <td><a target=_blank" href="../foto/file/<?php echo $data['sk_desa']; ?>"><img src="../foto/file/<?php echo $data['sk_desa']; ?>" class="img-responsive" style="width: 80px;" ></td>                  
                  
                  <td align="center">
                    <a href="?page=data_pesertadetail&id=<?php echo $data['id_peserta']; ?>" class="btn btn-warning"><span class="fa fa-hospital-o"></span> Detail</a>
                    <a href="?page=edit_pesertaditolak&id=<?php echo $data['id_peserta']; ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="?page=hapus_peserta&id=<?php echo $data['id_peserta']; ?>&idm=<?php echo $data['id_magang']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini?');"><span class="fa fa-trash-o"></span> Hapus</a>
                    
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