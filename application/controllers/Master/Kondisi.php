<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Kondisi Koleksi',
				'main_view'			=>	'pages/kondisi/home',
				'active_master'		=>	'active',
				'active_kondisi'	=>	'active',
				'breadcrumb'		=>	'Master Data',
				'id_kondisi'		=>	$this->Data_model->getIDKondisi(),
				'dt_kondisi'		=>	$this->Data_model->cariKondisi()
			);

		$this->load->view('themes/template', $data);
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Kondisi Koleksi',
				'main_view'			=>	'pages/kondisi/home',
				'active_master'		=>	'active',
				'active_kondisi'	=>	'active',
				'breadcrumb'		=>	'Master Data'
			);

		$this->form_validation->set_rules('id_kondisi','ID Kondisi','trim|required|max_length[10]|strtoupper|is_unique[TMKondisi.id_kondisi]');
		$this->form_validation->set_rules('nama_kondisi','Kondisi Koleksi','trim|required|strtoupper|max_length[50]');

		if($this->form_validation->run() == FALSE)
        {
			redirect('Master/Kondisi/Index');
        }
        else
        {
        	$result = $this->Data_model->insert_kondisi();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert master data kondisi koleksi berhasil.');
        		redirect("Master/Kondisi/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}
        }
	}

	public function update($id_kondisi = NULL)
	{
		if(!empty($id_kondisi))
		{
			if ($this->input->post('update')) 
			{
				$this->form_validation->set_rules('nama_kondisi','Kondisi Koleksi','trim|required|strtoupper|max_length[50]');
				
				if($this->form_validation->run() === TRUE)
				{
					if($this->Data_model->update_kondisi($id_kondisi))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Master/Kondisi/Index');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Master/Kondisi/Index');
                    }
				}
				else //validasi gagal
				{
					redirect('Master/Kondisi/Index');
				}
			}
		}
		else
		{
			redirect('Master/Kondisi/Index');
		}
	}

}