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
                    foreach ($dt_koleksi as $row) {
                    $attributes = array('name'=>'form_koleksi','class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart('Koleksi/Update/'.$row->id_koleksi, $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">ID</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="id_koleksi" value="<?=$row->id_koleksi?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No Inventaris <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_inventaris" value="<?=$row->no_inventaris?>" placeholder="Nomor Inventaris">
                        <?=form_error('no_inventaris', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_koleksi" value="<?=$row->nama_koleksi?>" placeholder="Nama Koleksi">
                        <?=form_error('nama_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Ukuran Koleksi <span class="required">*</span></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="panjang_koleksi" placeholder="Panjang Koleksi" value="<?=$row->panjang_koleksi?>">
                        <?=form_error('panjang_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="lebar_koleksi" placeholder="Lebar Koleksi" value="<?=$row->lebar_koleksi?>">
                        <?=form_error('lebar_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="tinggi_koleksi" placeholder="Tinggi Koleksi" value="<?=$row->tinggi_koleksi?>">
                        <?=form_error('tinggi_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal Masuk <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="tanggal_masuk" value="<?=$row->tanggal_masuk?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Gambar <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="file" class="form-control" name="gambar_koleksi" accept="image/*" value="<?=$row->gambar_koleksi?>">
                        <?=form_error('gambar_koleksi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pembuatan <span class="required">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="tempat_pembuatan" placeholder="Tempat Pembuatan" value="<?=$row->tempat_pembuatan?>">
                        <?=form_error('tempat_pembuatan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="tahun_pembuatan" placeholder="Tahun Pembuatan" value="<?=$row->tahun_pembuatan?>">
                        <?=form_error('tahun_pembuatan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Keterangan</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="sejarah" placeholder="Keterangan atau sejarah mengenai koleksi..."><?=$row->sejarah?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kondisi Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_kondisi" value="<?=$row->id_kondisi?>">
                          <option value="">Update Kondisi Koleksi...</option>
                              <?php foreach($kondisi as $row2) { ?>
                                  <option value="<?=$row2->id_kondisi?>" <?=set_select('id_kondisi', $row->id_kondisi)?>><?=$row2->nama_kondisi?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_kondisi', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Asal Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_asal" value="<?=$row->id_asal?>">
                          <option value="">Update Asal Koleksi...</option>
                              <?php foreach($asal as $row3) { ?>
                                  <option value="<?=$row3->id_asal?>" <?=set_select('id_asal', $row3->id_asal)?>><?=$row3->nama_asal?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_asal', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Bahan Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_bahan" value="<?=$row->id_bahan?>">
                          <option value="">Update Bahan Koleksi...</option>
                              <?php foreach($bahan as $row4) { ?>
                                  <option value="<?=$row4->id_bahan?>" <?=set_select('id_bahan', $row4->id_bahan)?>><?=$row4->nama_bahan?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_bahan', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kategori Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_kategori" value="<?=$row->id_kategori?>">
                          <option value="">Update Kategori Koleksi...</option>
                              <?php foreach($kategori as $row5) { ?>
                                  <option value="<?=$row5->id_kategori?>" <?=set_select('id_kategori', $row5->id_kategori)?>><?=$row5->nama_kategori?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_kategori', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <select class="form-control" name="id_tempat" value="<?=$row->id_tempat?>">
                          <option value="">Update Tempat Koleksi...</option>
                              <?php foreach($tempat as $row6) { ?>
                                  <option value="<?=$row6->id_tempat?>" <?=set_select('id_tempat', $row6->id_tempat)?>><?=$row6->nama_tempat?></option>
                              <?php } ?>
                        </select>
                        <?=form_error('id_tempat', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Lemari Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <div class="col-md-3"><input type="radio" name="id_lemari" id="LemariOther" <?php if($row->id_lemari=='0') { ?> checked="checked" <?php } ?> value="0" <?=set_radio('id_lemari','Lainnya')?> onClick="javascript:radioBtnCheck()">  Lainnya</div>
                        <div class="col-md-3"><input type="radio" name="id_lemari" id="LemariEtalase" <?=set_radio('id_lemari','Etalase')?> onClick="javascript:radioBtnCheck()">  Etalase</div>
                        <div class="col-md-3"><input type="text" class="form-control" id="Etalase" name="id_lemari" value="<?=$row->id_lemari?>" placeholder="No... 1-999"></div>
                        <?=form_error('id_lemari', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Penyumbang Koleksi <span class="required">*</span></label>
                      <div class="col-sm-6">
                        <input type="search" class="autocomplete_penyumbang form-control" id="autocomplete1" name="nama_penyumbang" value="<?=set_value('nama_penyumbang')?>">
                        <?=form_error('nama_penyumbang', '<span class="help-block greyText">', '</span>');?>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button onclick="history.go(-1);" class="btn btn-default">Back</button>
                    <input type="submit" name="update" class="btn btn-info pull-right">
                  </div><!-- /.box-footer -->
                <?=form_close(); } ?>
          </div><!-- /.box -->