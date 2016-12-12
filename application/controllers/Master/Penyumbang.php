<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyumbang extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Penyumbang',
				'main_view'			=>	'pages/penyumbang/home',
				'active_master'		=>	'active',
				'active_penyumbang'	=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_penyumbang'		=>	$this->Data_model->getIDPenyumbang(),
				'dt_penyumbang'		=>	$this->Data_model->cariPenyumbang()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Penyumbang',
				'main_view'			=>	'pages/penyumbang/home',
				'active_master'		=>	'active',
				'active_penyumbang'	=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_penyumbang','ID Penyumbang','trim|required|max_length[10]|strtoupper|is_unique[TMPenyumbang.id_penyumbang]');
		$this->form_validation->set_rules('nama_penyumbang','Penyumbang','trim|required|strtoupper|alpha|max_length[50]');
		$this->form_validation->set_rules('kota_penyumbang','Kota Penyumbang','trim|required|strtoupper|max_length[50]');
		$this->form_validation->set_rules('jabatan_pekerjaan','Jabatan/Pekerjaan','trim|required|strtoupper|max_length[50]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Penyumbang/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_penyumbang();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data penyumbang koleksi berhasil.');
        		redirect("Master/Penyumbang/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_penyumbang = NULL)
	{
		if(!empty($id_penyumbang))
		{
			if ($this->input->post('update')) 
			{
					
				$this->form_validation->set_rules('nama_penyumbang','Penyumbang','trim|required|strtoupper|alpha|max_length[50]');
				$this->form_validation->set_rules('kota_penyumbang','Kota Penyumbang','trim|required|strtoupper|max_length[50]');
				$this->form_validation->set_rules('jabatan_pekerjaan','Jabatan/Pekerjaan','trim|required|strtoupper|max_length[50]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_penyumbang($id_penyumbang))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Penyumbang/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Penyumbang/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Penyumbang/Index');
				}
			}
		}
		else
		{
			redirect('Master/Penyumbang/Index');
		}
	}
}
