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
                    $attributes = array('name'=>'form_bahan','class'=>'form-horizontal','role'=>'form');
                    echo form_open('Master/Bahan/tambah', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_bahan" value="<?=$id_bahan?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Bahan Koleksi</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_bahan" required placeholder="Bahan Koleksi">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
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
                                <th>Bahan Koleksi</th>
                                <th>Ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dt_bahan->result() as $row) { ?>
                            <tr>
                                <td><?=$row->id_bahan?></td>
                                <td><?=$row->nama_bahan?></td>
                                <td><?=$row->created?></td>
                                <td>
                                  <a class="btn btn-mini" href="#modalEditBahan<?php echo $row->id_bahan?>" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Bahan Koleksi</th>
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

        <?php foreach ($dt_bahan->result() as $row) { ?>
          <div class="modal fade" id="modalEditBahan<?php echo $row->id_bahan?>" role="dialog">
            <div class="modal-dialog">            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit <?=$title.' '.$row->id_bahan;?></h4>
                </div>
                <div class="modal-body">
                  <?php
                    $attributes = array('name'=>'form_bahan','class'=>'form-horizontal','role'=>'form');
                    echo form_open('Master/Bahan/Update/'.$row->id_bahan, $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_bahan" value="<?=$row->id_bahan?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Bahan Koleksi</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_bahan" value="<?=$row->nama_bahan?>" required placeholder="Bahan Koleksi">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                  <input type="submit" name="update" class="btn btn-info pull-right">
                </div>
                <?=form_close()?>
              </div>              
            </div>
          </div>
        <?php } ?>
