        <!-- Main content -->
        <section class="content">
      <?php $flash_pesan = $this->session->flashdata('pesan')?>
      <?php if (! empty($flash_pesan)) : ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-info-circle"></i> <?php echo $flash_pesan; ?>
        </div>
      <?php endif ?>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
                <?php
                    $attributes = array('name'=>'form_penyumbang','class'=>'form-horizontal','role'=>'form');
                    echo form_open('Master/Penyumbang/tambah', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_penyumbang" value="<?=$id_penyumbang?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Penyumbang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_penyumbang" required placeholder="Nama Penyumbang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Asal Penyumbang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kota_penyumbang" required placeholder="Asal Penyumbang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jabatan/Pekerjaan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan_pekerjaan" required placeholder="Pekerjaan">
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
          </div><!-- /.box -->
          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Master Data</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
                  <div class="box-body">
                    <table id='example' class='table table-bordered table-striped' width='100%'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Penyumbang</th>
                                <th>Asal</th>
                                <th>Pekerjaan</th>
                                <th>Ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dt_penyumbang->result() as $row) { ?>
                            <tr>
                                <td><?=$row->id_penyumbang?></td>
                                <td><?=$row->nama_penyumbang?></td>
                                <td><?=$row->kota_penyumbang?></td>
                                <td><?=$row->jabatan_pekerjaan?></td>
                                <td><?=$row->created?></td>
                                <td>
                                  <a class="btn btn-mini" href="#modalEditPenyumbang<?php echo $row->id_penyumbang?>" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Penyumbang</th>
                                <th>Asal</th>
                                <th>Pekerjaan</th>
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

        <?php foreach ($dt_penyumbang->result() as $row) { ?>
          <div class="modal fade" id="modalEditPenyumbang<?php echo $row->id_penyumbang?>" role="dialog">
            <div class="modal-dialog">            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit <?=$title.' '.$row->id_penyumbang;?></h4>
                </div>
                <div class="modal-body">
                  <?php
                    $attributes = array('name'=>'form_penyumbang','class'=>'form-horizontal','role'=>'form');
                    echo form_open('Master/Penyumbang/Update/'.$row->id_penyumbang, $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_penyumbang" value="<?=$row->id_penyumbang?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Penyumbang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_penyumbang" value="<?=$row->nama_penyumbang?>" required placeholder="Nama Penyumbang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Asal Penyumbang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kota_penyumbang" value="<?=$row->kota_penyumbang?>" required placeholder="Asal Penyumbang">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jabatan/Pekerjaan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan_pekerjaan" value="<?=$row->jabatan_pekerjaan?>" required placeholder="Pekerjaan">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="update" class="btn btn-info pull-right">
                </div>
                <?=form_close()?>
              </div>              
            </div>
          </div>
        <?php } ?>
