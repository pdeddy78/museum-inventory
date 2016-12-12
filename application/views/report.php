<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cetak PDF</title>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
</head>
<body>
<h2 style="text-align: center;">Pemerintah Provinsi Daerah Surakarta<br/>Museum Radya Pustaka</h2>
<p align="center">Jl. Brigjen Slamet Riyadi, Kota Surakarta, Jawa Tengah, 57141 </p>
<hr>
<h3 align="center">Laporan Koleksi Museum Radya Pustaka</h3>
<p align="center">Periode: <?=$periode1?> s/d <?=$periode2?></p>
<table border="1" width="100%" align="center">
    <thead>
        <tr>
            <th>Kategori Koleksi</th>
            <th>Nama Koleksi</th>
            <th>Penyumbang</th>
            <th>Tanggal Terima</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dt_laporan->result() as $row) { ?>
        <tr>
        	<td><?=$row->nama_kategori?></td>
        	<td><?=$row->nama_koleksi?></td>
        	<td><?=$row->nama_penyumbang?></td>
        	<td><?=$row->tanggal_masuk?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br/>
<p align="right"><i class="fa fa-print"></i> Dicetak pada <?=mdate('%d %M %Y - %h:%i %a',time())?></p>
</body>
</html>
