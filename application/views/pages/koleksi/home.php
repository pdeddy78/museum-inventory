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
            <?=$errors?>
                <?php
                    $attributes = array('name'=>'form_koleksi','class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart('Koleksi/Tambah', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">ID</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="id_koleksi" value="<?=$id_koleksi?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No Inventaris <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_inventaris" value="<?=set_value('no_inventaris')?>" placeholder="Nomor Inventaris" required>
                        <?=form_error('no_inventaris', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_koleksi" value="<?=set_value('nama_koleksi')?>" placeholder="Nama Koleksi" required>
                        <?=form_error('nama_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Ukuran Koleksi <span class="required">*</span></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="panjang_koleksi" placeholder="Panjang Koleksi" value="<?=set_value('panjang_koleksi')?>" required>
                        <?=form_error('panjang_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="lebar_koleksi" placeholder="Lebar Koleksi" value="<?=set_value('lebar_koleksi')?>" required>
                        <?=form_error('lebar_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="tinggi_koleksi" placeholder="Tinggi Koleksi" value="<?=set_value('tinggi_koleksi')?>" required>
                        <?=form_error('tinggi_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal Masuk <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="tanggal_masuk" value="<?=date('Y-m-d')?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Gambar <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="file" class="form-control" name="gambar_koleksi" accept="image/*" value="<?=set_value('gambar_koleksi')?>" required>
                        <?=form_error('gambar_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pembuatan <span class="required">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="tempat_pembuatan" placeholder="Tempat Pembuatan" value="<?=set_value('tempat_pembuatan')?>" required>
                        <?=form_error('tempat_pembuatan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="tahun_pembuatan" placeholder="Tahun Pembuatan" value="<?=set_value('tahun_pembuatan')?>" required>
                        <?=form_error('tahun_pembuatan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Keterangan</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="sejarah" placeholder="Keterangan atau sejarah mengenai koleksi..."><?=set_value('sejarah')?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kondisi Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_kondisi" required>
                          <option value="">Pilih Kondisi Koleksi...</option>
                              <?php foreach($kondisi as $row) { ?>
                                  <option value="<?=$row->id_kondisi?>" <?=set_select('id_kondisi', $row->id_kondisi)?>><?=$row->nama_kondisi?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_kondisi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Asal Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_asal" required>
                          <option value="">Pilih Asal Koleksi...</option>
                              <?php foreach($asal as $row) { ?>
                                  <option value="<?=$row->id_asal?>" <?=set_select('id_asal', $row->id_asal)?>><?=$row->nama_asal?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_asal', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Bahan Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_bahan" required>
                          <option value="">Pilih Bahan Koleksi...</option>
                              <?php foreach($bahan as $row) { ?>
                                  <option value="<?=$row->id_bahan?>" <?=set_select('id_bahan', $row->id_bahan)?>><?=$row->nama_bahan?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_bahan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kategori Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_kategori" required>
                          <option value="">Pilih Kategori Koleksi...</option>
                              <?php foreach($kategori as $row) { ?>
                                  <option value="<?=$row->id_kategori?>" <?=set_select('id_kategori', $row->id_kategori)?>><?=$row->nama_kategori?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_kategori', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_tempat" required>
                          <option value="">Pilih Tempat Koleksi...</option>
                              <?php foreach($tempat as $row) { ?>
                                  <option value="<?=$row->id_tempat?>" <?=set_select('id_tempat', $row->id_tempat)?>><?=$row->nama_tempat?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_tempat', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Lemari Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <div class="col-md-3"><input type="radio" name="id_lemari" id="LemariOther" checked="checked" value="0" <?=set_radio('id_lemari','Lainnya')?> onClick="javascript:radioBtnCheck()">  Lainnya</div>
                        <div class="col-md-3"><input type="radio" name="id_lemari" id="LemariEtalase" <?=set_radio('id_lemari','Etalase')?> onClick="javascript:radioBtnCheck()">  Etalase</div>
                        <div class="col-md-3"><input type="text" class="form-control" id="Etalase" name="id_lemari" placeholder="No... 1-999"></div>
                        <?=form_error('id_lemari', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Penyumbang Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="search" class="autocomplete_penyumbang form-control" id="autocomplete1" name="nama_penyumbang" value="<?=set_value('nama_penyumbang')?>" required>
                        <?=form_error('nama_penyumbang', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
          </div><!-- /.box -->