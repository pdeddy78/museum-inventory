	  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </div>
        <strong>Copyright &copy; 2015 <a href="#"><?=$this->config->item('app_name')?></a>.</strong> All rights reserved.
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/js/demo.js"></script>    
    <script>
      $(function () {
        $('#example').DataTable( {
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
          },
          "scrollX": true
        });
      });
    </script>
    <script type="text/javascript">
        var site = "<?=site_url();?>";
        $(function(){
           $('.autocomplete_penyumbang').autocomplete({
                serviceUrl: site+'/Autocomplete/search',
            });
        });
    </script>
    <script type="text/javascript">
      function radioBtnCheck()
      {
        if (document.getElementById('LemariOther').checked) 
        {
          document.getElementById('Etalase').style.display='none';
        }
        else if (document.getElementById('LemariEtalase').checked) 
        {
          document.getElementById('Etalase').style.display='block';
        }
      }
      window.onload=function onloadform()
      {
        document.getElementById('Etalase').style.display='none';
      }
    </script>
