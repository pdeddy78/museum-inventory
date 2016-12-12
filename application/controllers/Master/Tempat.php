<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Tempat Koleksi',
				'main_view'			=>	'pages/tempat/home',
				'active_master'		=>	'active',
				'active_tempat'		=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_tempat'			=>	$this->Data_model->getIDTempat(),
				'dt_tempat'			=>	$this->Data_model->cariTempat()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Kategori Koleksi',
				'main_view'			=>	'pages/tempat/home',
				'active_master'		=>	'active',
				'active_kategori'	=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_tempat','ID Tempat','trim|required|max_length[10]|strtoupper|is_unique[TMTempat.id_tempat]');
		$this->form_validation->set_rules('nama_tempat','Tempat Koleksi','trim|required|strtoupper|max_length[50]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Tempat/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_tempat();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data tempat koleksi berhasil.');
        		redirect("Master/Tempat/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_tempat = NULL)
	{
		if(!empty($id_tempat))
		{
			if ($this->input->post('update')) 
			{
				$this->form_validation->set_rules('nama_tempat','Tempat Koleksi','trim|required|strtoupper|max_length[50]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_tempat($id_tempat))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Tempat/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Tempat/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Tempat/Index');
				}
			}
		}
		else
		{
			redirect('Master/Tempat/Index');
		}
	}
}
