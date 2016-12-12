<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Bahan Koleksi',
				'main_view'			=>	'pages/bahan/home',
				'active_master'		=>	'active',
				'active_bahan'		=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_bahan'			=>	$this->Data_model->getIDBahan(),
				'dt_bahan'			=>	$this->Data_model->cariBahan()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Bahan Koleksi',
				'main_view'			=>	'pages/bahan/home',
				'active_master'		=>	'active',
				'active_bahan'		=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_bahan','ID Bahan','trim|required|max_length[10]|strtoupper|is_unique[TMBahan.id_bahan]');
		$this->form_validation->set_rules('nama_bahan','Bahan Koleksi','trim|required|strtoupper|max_length[50]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Bahan/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_bahan();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data bahan koleksi berhasil.');
        		redirect("Master/Bahan/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_bahan = NULL)
	{
		if(!empty($id_bahan))
		{
			if ($this->input->post('update')) 
			{
				$this->form_validation->set_rules('nama_bahan','Bahan Koleksi','trim|required|strtoupper|max_length[50]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_bahan($id_bahan))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Bahan/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Bahan/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Bahan/Index');
				}
			}
		}
		else
		{
			redirect('Master/Bahan/Index');
		}
	}
}
