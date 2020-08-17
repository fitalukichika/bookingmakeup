<?php
// error_reporting(1);
//require "../koneksi.php";

$id  = $_GET["id"];

$query  = "SELECT * FROM tb_pendaftaran, tb_jenispelatihan, tb_periode WHERE tb_pendaftaran.id_peserta='$id'";
$result = mysql_query($query);
$data   = mysql_fetch_array($result);
/*
$query1  = "SELECT * FROM tb_pendaftaran, tb_magang WHERE tb_pendaftaran.id_peserta=tb_magang.id_peserta AND tb_pendaftaran.id_peserta='$id'";
$result1 = mysql_query($query1);
$data1   = mysql_fetch_array($result1);
*/

//set sudah dibaca = Y kalau sudah dibaca
//$update = mysql_query("UPDATE pesan SET status='Baru' WHERE id=$no");


?>

<!-- START BREADCRUMB -->
<div class="right_col" role="main">
<ul class="content-header">
      <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h5> Data Peserta </h5>
              </div>
    </ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-5">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <br>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">ID Peserta :</td>
                                        <td><?php  echo $data['id_peserta']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">No KTP :</td>
                                        <td><?php  echo $data['no_ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Nama Peserta :</td>
                                        <td><?php  echo $data['nama_peserta']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Jenis Kelamin:</td>
                                        <td><?php  echo $data['jekel']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Alamat :</td>
                                        <td><?php echo $data['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">No. Telp :</td>
                                        <td><?php  echo $data['no_hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Nama Perusahaan :</td>
                                        <td><?php  echo $data['nama_perusahaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Produk :</td>
                                        <td><?php  echo $data['produk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Nama Pelatihan :</td>
                                        <td><?php  echo $data['nama_pelatihan']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Username :</td>
                                        <td><?php  echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Password :</td>
                                        <td><?php  echo $data['password']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Status :</td>
                                        <td><?php  echo $data['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="info text-right" style="width:150px;">Periode :</td>
                                        <td><?php  echo $data['tahun']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-3"> 
            <div class="panel panel-default">
                <div class="panel-body">
                        <center><label>FOTO PESERTA</label></center><center><a target=_blank" href="../foto/user/<?php echo $data['foto_diri']; ?>"><img src="../foto/user/<?php echo $data["foto_diri"];?>"<img src="../foto/user/<?php echo $data['foto_diri']; ?>" class="img-responsive" alt="Nature Image 1"/>
                    </center>                                      
                </div>
            </div>
        </div>
        <div class="col-md-3"> 
            <div class="panel panel-default">
                <div class="panel-body">
                        <label>Scan TDI</label><center><a target=_blank" href="../foto/tdi/<?php echo $data['tdi']; ?>"><img src="../foto/tdi/<?php echo $data["tdi"];?>"<img src="../foto/tdi/<?php echo $data['tdi']; ?>"  class="img-responsive" alt="Nature Image 1"/>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END PAGE CONTENT WRAPPER -->  