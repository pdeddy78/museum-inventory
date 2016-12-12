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
              <h3 class="box-title">Search Data</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
                <?php
                    $attributes = array('name'=>'form_asal','class'=>'form-horizontal','role'=>'form');
                    echo form_open('Laporan/Index', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Periode Tahun (dari - ke)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="periode1" placeholder="YYYY-MM-DD" required>
                        <?=form_error('periode1', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="periode2" placeholder="YYYY-MM-DD" required>
                        <?=form_error('periode2', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <input type="submit" name="submit" value="Cetak" class="btn btn-info pull-right">
                  </div><!-- /.box-footer -->
                </form>
          </div><!-- /.box -->
          <?php if(isset($submit)) { ?>
          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Koleksi Periode <?=$periode1?> s/d <?=$periode2?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table id='example' class='table table-bordered table-striped' width='100%'>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kategori</th>
                          <th>Nama Koleksi</th>
                          <th>Penyumbang</th>
                          <th>Tanggal Terima</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($dt_laporan->result() as $row) { ?>
                      <tr>
                          <td width="5%" align="center"><?=$no++?></td>
                          <td><?=$row->nama_kategori?></td>
                          <td><?=$row->nama_koleksi?></td>
                          <td><?=$row->nama_penyumbang?></td>
                          <td><?=$row->tanggal_masuk?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                footer
            </div><!-- /.box-footer -->
          </div><!-- /.box -->
          <?php } ?>
        </section><!-- /.content -->
