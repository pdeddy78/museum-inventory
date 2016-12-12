<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asal extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Asal Koleksi',
				'main_view'			=>	'pages/asal/home',
				'active_master'		=>	'active',
				'active_asal'		=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_asal'			=>	$this->Data_model->getIDAsal(),
				'dt_asal'			=>	$this->Data_model->cariAsal()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Asal Koleksi',
				'main_view'			=>	'pages/asal/home',
				'active_master'		=>	'active',
				'active_asal'		=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_asal','ID Asal','trim|required|max_length[10]|strtoupper|is_unique[TMAsal.id_asal]');
		$this->form_validation->set_rules('nama_asal','Asal Koleksi','trim|required|strtoupper|max_length[30]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Asal/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_asal();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data asal koleksi berhasil.');
        		redirect("Master/Asal/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_asal = NULL)
	{
		if(!empty($id_asal))
		{
			if ($this->input->post('update')) 
			{
				$this->form_validation->set_rules('nama_asal','Asal Koleksi','trim|required|strtoupper|max_length[30]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_asal($id_asal))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Asal/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Asal/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Asal/Index');
				}
			}
		}
		else
		{
			redirect('Master/Asal/Index');
		}
	}
}