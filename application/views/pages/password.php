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
              <h3 class="box-title">Form</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
                <?php
                    $attributes = array('name'=>'form_password','class'=>'form-horizontal','role'=>'form');
                    echo form_open('User/Password', $attributes);
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Password Lama</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" value="" required>
                        <?=form_error('password', '<span class="help-block greyText fade-in">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Password Baru</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" name="new_password" value="" required>
                        <?=form_error('new_password', '<span class="help-block greyText fade-in">', '</span>');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Konfirmasi Password Baru</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" name="new_password_conf" value="" required>
                        <?=form_error('new_password_conf', '<span class="help-block greyText fade-in">', '</span>');?>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
          </div><!-- /.box -->
