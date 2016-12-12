<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="pdeddy78">
    <meta name="description" content="Inventory Museum">
    <title><?=$title?> | <?=$this->config->item('app_name')?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/cover.jpg" width="100%"></a>
        <!--b>Inventory </b>Museum-->
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
          <?php
            $attributes = array('name'=>'form_login','role'=>'form');
            echo form_open('Auth/login', $attributes);
          ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" required placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?=form_error('username', '<span class="help-block">', '</span>');?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" required placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?=form_error('password', '<span class="help-block">', '</span>');?>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="submit" id="submit" value="Sign In" class="btn btn-primary btn-block btn-flat">
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>