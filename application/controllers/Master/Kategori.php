<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Kategori Koleksi',
				'main_view'			=>	'pages/kategori/home',
				'active_master'		=>	'active',
				'active_kategori'	=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_kategori'		=>	$this->Data_model->getIDKategori(),
				'dt_kategori'		=>	$this->Data_model->cariKategori()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Kategori Koleksi',
				'main_view'			=>	'pages/kategori/home',
				'active_master'		=>	'active',
				'active_kategori'	=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_kategori','ID Kategori','trim|required|max_length[10]|strtoupper|is_unique[TMKategori.id_kategori]');
		$this->form_validation->set_rules('nama_kategori','Kategori Koleksi','trim|required|strtoupper|max_length[50]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Kategori/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_kategori();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data kategori koleksi berhasil.');
        		redirect("Master/Kategori/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_kategori = NULL)
	{
		if(!empty($id_kategori))
		{
			if ($this->input->post('update')) 
			{
				$this->form_validation->set_rules('nama_kategori','Kategori Koleksi','trim|required|strtoupper|max_length[50]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_kategori($id_kategori))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Kategori/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Kategori/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Kategori/Index');
				}
			}
		}
		else
		{
			redirect('Master/Kategori/Index');
		}
	}
}
