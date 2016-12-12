<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('TMPenyumbang')->like('nama_penyumbang',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_penyumbang
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
}
?>