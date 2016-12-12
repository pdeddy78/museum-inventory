        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Koleksi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
                  <div class="box-body">
                    <table id='example' class='table table-bordered table-striped' width='100%'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Koleksi</th>
                                <th>Kategori</th>
                                <th>Asal</th>
                                <th>Ditempatkan</th>
                                <th>Diperbaharui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dt_koleksi->result() as $row) { ?>
                            <tr>
                                <td><?=$row->id_koleksi?></td>
                                <td><?=$row->nama_koleksi?></td>
                                <td><?=$row->nama_kategori?></td>
                                <td><?=$row->nama_asal?></td>
                                <td>
                                <?php if($row->id_tempat != 'DM-TK-0000') {
                                  if($row->id_lemari != '0') {
                                    echo $row->nama_tempat.', No.'.$row->id_lemari;
                                  }
                                  else {
                                    echo $row->nama_tempat.', Luar';
                                  }
                                }
                                else {
                                  echo $row->nama_tempat;
                                }
                                ?>                           
                                </td>
                                <td><?=$row->tanggal_update?></td>
                                <td>
                                  <a class="btn btn-mini" title="Lihat <?=$row->nama_koleksi?>" href="<?=base_url().'Koleksi/Lihat/'.$row->id_koleksi?>"><i class="fa fa-eye"></i></a>
                                  <a class="btn btn-mini" title="Update <?=$row->nama_koleksi?>" href="<?=base_url().'Koleksi/Update/'.$row->id_koleksi?>"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Koleksi</th>
                                <th>Kategori</th>
                                <th>Asal</th>
                                <th>Nama Penyumbang</th>
                                <th>Ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    footer
                  </div><!-- /.box-footer -->
          </div><!-- /.box -->
        </section><!-- /.content -->
