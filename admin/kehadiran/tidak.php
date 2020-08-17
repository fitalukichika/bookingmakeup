if ($r['gudang']== 'disetujui' || $r['kasubag']== 'disetujui' || $r['sekretaris']== 'disetujui') {     
                                echo '<a href=?page=hapus-permintaan&id=addslashes('.$r['keterangan'].') class="btn btn-primary btn-large">Hapus</a>';
                              }
                              else{
                                echo '<button type="button" class="btn btn-default waves-effect" disabled="disabled">Hapus</button>';
                              }