<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {


    public function cari($periode1,$periode2)
    {
    	$where = "TMKoleksi.tanggal_masuk BETWEEN '".$periode1."' AND '".$periode2."'";
    	return $this->db->where($where)
                        ->join('TMKategori', 'TMKoleksi.id_kategori = TMKategori.id_kategori', 'left')
                        ->join('TMPenyumbang', 'TMKoleksi.id_penyumbang = TMPenyumbang.id_penyumbang', 'left')
                        ->order_by('TMKoleksi.tanggal_masuk', 'ASC')
                        ->get('TMKoleksi');
    }
}