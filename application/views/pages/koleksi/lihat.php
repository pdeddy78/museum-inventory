        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Koleksi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php foreach ($dt_koleksi->result() as $row) { ?>
            <div class="col-sm-5">
            	<img class="col-sm-12" src="<?=base_url().'assets/uploads/'.$row->gambar_koleksi?>" />
            </div>
            <div class="col-sm-6">            	
                <table class="table" width="100%">
                	<tbody>
                		<tr>
                			<th>No. Inventaris</th>
                			<td><?=$row->no_inventaris?></td>
                		</tr>
                		<tr>
                			<th>Nama Koleksi</th>
                			<td><?=$row->nama_koleksi?></td>
                		</tr>
                		<tr>
                			<th>Asal</th>
                			<td><?=$row->nama_asal?></td>
                		</tr>
                		<tr>
                			<th>Penyumbang</th>
                			<td><?=$row->nama_penyumbang?></td>
                		</tr>
                		<tr>
                			<th>Tanggal Masuk</th>
                			<td><?=$row->tanggal_masuk?></td>
                		</tr>
                		<tr>
                			<th>Detail Pembuatan</th>
                			<td><?=$row->tempat_pembuatan?>, Tahun <?=$row->tahun_pembuatan?></td>
                		</tr>
                		<tr>
                			<th>Deskripsi</th>
                			<td><?=$row->sejarah?></td>
                		</tr>
                		<tr>
                			<th>Ukuran Koleksi (cm)</th>
                			<td>Panjang: <?=$row->panjang_koleksi?> Lebar: <?=$row->lebar_koleksi?> Tinggi: <?=$row->tinggi_koleksi?></td>
                		</tr>
                	</tbody>
				</table>
            </div>
			<?php } ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
        </section><!-- /.content -->
