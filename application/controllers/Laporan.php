<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Laporan_model','',TRUE);
	}

	public function Index()
	{
		if($this->input->post('submit')) // jika ada aksi pos oleh name submit maka
		{
			$this->form_validation->set_rules('periode1','Periode 1','trim|required|max_length[10]');
			$this->form_validation->set_rules('periode2','Periode 2','trim|required|max_length[10]|callback_is_lower');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('Laporan/Index');
			}
			else
			{
				$periode1 = $this->input->post('periode1');
				$periode2 = $this->input->post('periode2');
				$data = array(
						'title'				=>	'Laporan',
						'main_view'			=>	'pages/laporan',
						'active_laporan'	=>	'active',
						'breadcrumb'		=>	'Data Koleksi',
						'submit'			=>	'',
						'periode1'			=>	$periode1,
						'periode2'			=>	$periode2,
						'dt_laporan'		=>	$this->Laporan_model->cari($periode1,$periode2)
					);
				$this->load->view('themes/template', $data);
				$this->Cetak();
			}
		}
		else
		{
			$data = array(
					'title'				=>	'Laporan',
					'main_view'			=>	'pages/laporan',
					'active_laporan'	=>	'active',
					'breadcrumb'		=>	'Data Koleksi',
				);
			$this->load->view('themes/template', $data);
		}
	}

	public function Cetak()
	{
		ob_start();
		$periode1 = $this->input->post('periode1');
		$periode2 = $this->input->post('periode2');
		$data = array(
			'title'				=>	'Laporan',
			'periode1'			=>	$periode1,
			'periode2'			=>	$periode2,
			'dt_laporan'		=>	$this->Laporan_model->cari($periode1,$periode2)
			);
		$this->load->view('report', $data);
		$html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/plugins/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en',array(20, 10, 20, 10));
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Koleksi.pdf', 'D');
	}

	public function is_lower()
	{
		$periode2 = $this->input->post('periode2');
		$periode1 = $this->input->post('periode1');

		if ($periode2 > $periode1) {
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('is_lower', "Maaf, periode 2 harus lebih besar");
			return FALSE;
		}
	}
}