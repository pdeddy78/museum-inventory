    <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$this->session->userdata('username')?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>            
            <!--li class="<?php if(isset($active_dashboard)) echo $active_dashboard;?>"><a href="<?=base_url()?>Home/index"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li-->
            <li class="<?php if(isset($active_koleksi)) echo $active_koleksi;?>">
              <a href="<?=base_url()?>Koleksi/Index">
                <i class="fa fa-th"></i> <span>Tambah Koleksi</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="<?php if(isset($active_daftar)) echo $active_daftar;?>">
              <a href="<?=base_url()?>Koleksi/Daftar">
                <i class="fa fa-list"></i> <span>Daftar Koleksi</span>
              </a>
            </li>
            <li class="header">REPORT</li>
            <li class="<?php if(isset($active_laporan)) echo $active_laporan;?>">
              <a href="<?=base_url()?>Laporan/Index">
                <i class="fa fa-search"></i> <span>Laporan Koleksi</span>
              </a>
            </li>
            <li class="header">MASTER</li>
            <li class="treeview <?php if(isset($active_master)) echo $active_master;?>">
              <a href="#">
                <i class="fa fa-file-o"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if(isset($active_kondisi)) echo $active_kondisi;?>"><a href="<?=base_url()?>Master/Kondisi/Index"><i class="fa fa-circle-o"></i> Kondisi Koleksi</a></li>
                <li class="<?php if(isset($active_asal)) echo $active_asal;?>"><a href="<?=base_url()?>Master/Asal/Index"><i class="fa fa-circle-o"></i> Asal Koleksi</a></li>
                <li class="<?php if(isset($active_bahan)) echo $active_bahan;?>"><a href="<?=base_url()?>Master/Bahan/Index"><i class="fa fa-circle-o"></i> Bahan Koleksi</a></li>
                <li class="<?php if(isset($active_kategori)) echo $active_kategori;?>"><a href="<?=base_url()?>Master/Kategori/Index"><i class="fa fa-circle-o"></i> Kategori Koleksi</a></li>
                <!--<li class="<?php if(isset($active_lemari)) echo $active_lemari;?>"><a href="<?=base_url()?>Master/Lemari/Index"><i class="fa fa-circle-o"></i> Lemari Koleksi</a></li>-->
                <li class="<?php if(isset($active_tempat)) echo $active_tempat;?>"><a href="<?=base_url()?>Master/Tempat/Index"><i class="fa fa-circle-o"></i> Tempat Koleksi</a></li>
                <li class="<?php if(isset($active_penyumbang)) echo $active_penyumbang;?>"><a href="<?=base_url()?>Master/Penyumbang/Index"><i class="fa fa-circle-o"></i> Penyumbang</a></li>
              </ul>
            </li>
            <li class="header">ACCOUNT</li>
            <li class="<?php if(isset($active_account)) echo $active_account;?>">
              <a href="<?=base_url()?>User/Index">
                <i class="fa fa-gear"></i> <span>Ubah Password</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>