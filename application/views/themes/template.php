<!DOCTYPE html>
<html>
<?php $this->load->view('themes/header');?>
<body class="hold-transition skin-blue sidebar-mini fixed">
<?php $this->load->view('themes/nav_top');?>
<?php $this->load->view('themes/sidebar');?>
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
<?php $this->load->view('themes/breadcrumb');?>
<?php $this->load->view($main_view);?>
      </div><!-- /.content-wrapper -->
<?php $this->load->view('themes/footer');?>
</body>
</html>