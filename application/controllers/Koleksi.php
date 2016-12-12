<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Data_model','',TRUE);

	}


	public function index()
	{		
		$data = array(
				'title'				=>	'Input Koleksi',
				'main_view'			=>	'pages/koleksi/home',
				'active_koleksi'	=>	'active',
				'breadcrumb'		=>	'Data Koleksi',
				'error'				=>	'',
				'id_koleksi'		=>	$this->Data_model->getIDKoleksi(),
				'kondisi'	 		=>	$this->Data_model->cariKondisi()->result(),
				'asal'	 			=>	$this->Data_model->cariAsal()->result(),
				'bahan'	 			=>	$this->Data_model->cariBahan()->result(),
				'kategori' 			=>	$this->Data_model->cariKategori()->result(),
				'tempat' 			=>	$this->Data_model->cariTempat()->result(),
				'errors'			=>	''
			);

		$this->load->view('themes/template', $data);
	}

	public function daftar()
	{		
		$data = array(
				'title'				=>	'Daftar Koleksi',
				'main_view'			=>	'pages/koleksi/daftar',
				'active_daftar'		=>	'active',
				'breadcrumb'		=>	'Data Koleksi',
				'dt_koleksi'		=>	$this->Data_model->cariKoleksi()
			);

		$this->load->view('themes/template', $data);
	}

	public function lihat($id_koleksi = NULL)
	{		

		$id_koleksi = $this->uri->segment(3);
		if($id_koleksi == NULL) //cek 
		{
			redirect('Koleksi/Daftar');
		}
		else 
		{
			$cek = $this->Data_model->cekKoleksi($id_koleksi);
			if($cek)
			{
				$data = array(
						'title' 		=>  'Koleksi '.$id_koleksi,
						'main_view'		=>	'pages/koleksi/lihat',
						'active_daftar'	=>	'active',
						'breadcrumb'	=>	'Data Koleksi',
						'dt_koleksi'	=>	$this->Data_model->getKoleksi($id_koleksi) 
						);
				$this->load->view('themes/template', $data);
	        }
	        else 
	        {
	        	redirect('Koleksi/Daftar');
	        }
	    }
	}

	public function tambah()
	{
		$data = array(
				'title'				=>	'Input Koleksi',
				'main_view'			=>	'pages/koleksi/home',
				'active_koleksi'	=>	'active',
				'breadcrumb'		=>	'Data Koleksi',
				'id_koleksi'		=>	$this->Data_model->getIDKoleksi(),
				'kondisi'	 		=>	$this->Data_model->cariKondisi()->result(),
				'asal'	 			=>	$this->Data_model->cariAsal()->result(),
				'bahan'	 			=>	$this->Data_model->cariBahan()->result(),
				'kategori' 			=>	$this->Data_model->cariKategori()->result(),
				'tempat' 			=>	$this->Data_model->cariTempat()->result(),
				'errors'			=>	''
			);

		$this->form_validation->set_rules('id_koleksi','ID Koleksi','trim|required|max_length[10]|strtoupper|is_unique[TMKoleksi.id_koleksi]');
		$this->form_validation->set_rules('no_inventaris','No Inventaris','trim|required|max_length[10]|strtoupper|is_unique[TMKoleksi.no_inventaris]');
		$this->form_validation->set_rules('nama_koleksi','Nama Koleksi','trim|required|strtoupper|max_length[50]');
		$this->form_validation->set_rules('tempat_pembuatan','Tempat Pembuatan','trim|required|strtoupper|max_length[50]');
		$this->form_validation->set_rules('tahun_pembuatan','Tahun Pembuatan','trim|required|strtoupper|max_length[4]');
		$this->form_validation->set_rules('sejarah','Sejarah Koleksi','trim');
		$this->form_validation->set_rules('panjang_koleksi','Panjang Koleksi','trim|required|max_length[6]|is_numeric');
		$this->form_validation->set_rules('lebar_koleksi','Lebar Koleksi','trim|required|max_length[6]|is_numeric');
		$this->form_validation->set_rules('tinggi_koleksi','Tinggi Koleksi','trim|required|max_length[6]|is_numeric');
		//$this->form_validation->set_rules('gambar_koleksi','Gambar Koleksi','trim|required|max_length[50]');
		$this->form_validation->set_rules('id_kondisi','Kondisi','trim|required|max_length[10]|strtoupper');
		$this->form_validation->set_rules('id_asal','Asal','trim|required|max_length[10]|strtoupper');
		$this->form_validation->set_rules('id_bahan','Bahan','trim|required|max_length[10]|strtoupper');
		$this->form_validation->set_rules('id_kategori','Kategori','trim|required|max_length[10]|strtoupper');
		$this->form_validation->set_rules('id_tempat','Tempat','trim|required|max_length[10]|strtoupper');
		$this->form_validation->set_rules('id_lemari','Lemari','trim|max_length[10]|strtoupper|callback_is_exist');
		$this->form_validation->set_rules('nama_penyumbang','Penyumbang','trim|required|max_length[50]|strtoupper|callback_is_penyumbang_exist');

		if($this->form_validation->run() == FALSE)
        {
			//redirect('Koleksi/Index');
			$this->load->view('themes/template', $data);
        }
        else
        {
            $config = array(
            		'upload_path' 		=> './assets/uploads/',
            		'allowed_types'		=>	'jpeg|jpg|png',
            		'max_size'			=>	2048,
            		'max_width'			=>	1280,
            		'max_height'		=>	720,
            		'file_ext_tolower'	=>	TRUE,
            		'remove_spaces'		=>	TRUE,
            		'overwrite'			=>	TRUE,
            		'file_name'			=>	$id_koleksi
            	);

            $this->load->library('upload', $config);
            if($this->upload->do_upload('gambar_koleksi'))
            {
            	$result = $this->Data_model->insert_koleksi();
	        	if($result)
	        	{
	               	$this->session->set_flashdata('pesan', 'Proses insert data koleksi berhasil.');
	        		redirect("Koleksi/index");
	        	}
            }
            else
            {
                $data['errors'] = $this->upload->display_errors();
                $this->load->view('themes/template', $data);
            }

        	/*$result = $this->Data_model->insert_koleksi();
        	if($result)
        	{
               	$this->session->set_flashdata('pesan', 'Proses insert data koleksi berhasil.');
        		redirect("Koleksi/index");
        	}
        	else
        	{
        		$this->load->view('themes/template', $data);
        	}*/
        }
	}

	public function update($id_koleksi = NULL)
	{
		if(!empty($id_koleksi))
		{
			if ($this->input->post('update')) 
			{

				$this->form_validation->set_rules('no_inventaris','No Inventaris','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('nama_koleksi','Nama Koleksi','trim|strtoupper|max_length[50]');
				$this->form_validation->set_rules('tempat_pembuatan','Tempat Pembuatan','trim|strtoupper|max_length[50]');
				$this->form_validation->set_rules('tahun_pembuatan','Tahun Pembuatan','trim|strtoupper|max_length[4]');
				$this->form_validation->set_rules('sejarah','Sejarah Koleksi','trim');
				$this->form_validation->set_rules('panjang_koleksi','Panjang Koleksi','trim|max_length[6]|is_numeric');
				$this->form_validation->set_rules('lebar_koleksi','Lebar Koleksi','trim|max_length[6]|is_numeric');
				$this->form_validation->set_rules('tinggi_koleksi','Tinggi Koleksi','trim|max_length[6]|is_numeric');
				$this->form_validation->set_rules('id_kondisi','Kondisi','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('id_asal','Asal','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('id_bahan','Bahan','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('id_kategori','Kategori','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('id_tempat','Tempat','trim|max_length[10]|strtoupper');
				$this->form_validation->set_rules('id_lemari','Lemari','trim|max_length[10]|strtoupper|callback_is_exist');
				$this->form_validation->set_rules('nama_penyumbang','Penyumbang','trim|max_length[50]|strtoupper|callback_is_penyumbang_exist');
				
				
				if($this->form_validation->run() === TRUE)
				{
					$config = array(
			            		'upload_path' 		=> './assets/uploads/',
			            		'allowed_types'		=>	'jpeg|jpg|png',
			            		'max_size'			=>	2048,
			            		'max_width'			=>	1280,
			            		'max_height'		=>	720,
			            		'file_ext_tolower'	=>	TRUE,
			            		'remove_spaces'		=>	TRUE,
			            		'overwrite'			=>	TRUE,
			            		'file_name'			=>	$id_koleksi
			            	);

			            $this->load->library('upload', $config);
			            $this->upload->do_upload('gambar_koleksi');

					if($this->Data_model->update_koleksi($id_koleksi))
					{
                        $this->session->set_flashdata('pesan', 'Proses update data berhasil.');
                        redirect('Koleksi/Daftar');
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', 'Ups! Entah mengapa proses update data gagal.');
                        redirect('Koleksi/Daftar');
                    }
				}
				else //validasi gagal
				{
					$data = array(
						'title'				=>	'Update Koleksi',
						'main_view'			=>	'pages/koleksi/edit',
						'active_daftar'		=>	'active',
						'breadcrumb'		=>	'Data Koleksi',
						'dt_koleksi'		=>	$this->Data_model->getKoleksi($id_koleksi)->result(),
						'kondisi'	 		=>	$this->Data_model->cariKondisi()->result(),
						'asal'	 			=>	$this->Data_model->cariAsal()->result(),
						'bahan'	 			=>	$this->Data_model->cariBahan()->result(),
						'kategori' 			=>	$this->Data_model->cariKategori()->result(),
						'tempat' 			=>	$this->Data_model->cariTempat()->result()
					);
					$this->load->view('themes/template', $data);					
				}
			}
			else
			{
				$data = array(
					'title'				=>	'Update Koleksi',
					'main_view'			=>	'pages/koleksi/edit',
					'active_daftar'		=>	'active',
					'breadcrumb'		=>	'Data Koleksi',
					'dt_koleksi'		=>	$this->Data_model->getKoleksi($id_koleksi)->result(),
					'kondisi'	 		=>	$this->Data_model->cariKondisi()->result(),
					'asal'	 			=>	$this->Data_model->cariAsal()->result(),
					'bahan'	 			=>	$this->Data_model->cariBahan()->result(),
					'kategori' 			=>	$this->Data_model->cariKategori()->result(),
					'tempat' 			=>	$this->Data_model->cariTempat()->result()
				);

				//$this->session->set_flashdata('pesan', 'Perhatian! Cukup abaikan bagian yang tidak ingin diubah.');
				$this->load->view('themes/template', $data);
			}
		}
		else
		{
			redirect('Koleksi/Daftar');
		}
	}

	public function is_exist()
	{
		$this->db->select('id_tempat, id_lemari');
		$this->db->where('id_tempat', $this->input->post('id_tempat'));
		$this->db->where('id_lemari', $this->input->post('id_lemari'));
		$this->db->where('id_lemari !=', '0');
		$this->db->where('id_koleksi !=', $this->input->post('id_koleksi'));
		$this->db->limit(1);
		$query = $this->db->get('TMKoleksi');

		if ($query->num_rows() > 0) 
		{
			$this->form_validation->set_message('is_exist', 'Maaf, sudah ditempati.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}

	public function is_penyumbang_exist($nama_penyumbang)
    {
        // cek di database
        //$query = $this->db->where('nama_penyumbang', $nama_penyumbang)->get('TMPenyumbang');
        $this->db->select('id_penyumbang');
        $this->db->where('nama_penyumbang', $nama_penyumbang);
        $this->db->limit(1);
        $query = $this->db->get('TMPenyumbang');

        if ($query->num_rows() > 0)
        {
	        return TRUE;
        }
        else
        {
            $this->form_validation->set_message('is_penyumbang_exist', "Penyumbang tidak terdaftar");
            return FALSE;
        }
    }

}
