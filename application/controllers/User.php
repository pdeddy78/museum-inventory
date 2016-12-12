<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model("User_model","",TRUE);
	}

	public function index()
	{
		$data = array(
					'title'				=>	'Ubah Password',
					'main_view'			=>	'pages/password',
					'active_account'	=>	'active',
					'breadcrumb'		=>	'Account',
				);

		$this->load->view('themes/template', $data);
	}

	public function is_password($password)
    {
        // cek di database
    	$username = $this->session->userdata('username');
		$password = $this->input->post('password');
		$password = sha1($this->config->item('salt') . $password);

        $result = $this->User_model->login($username, $password);

        if ($result)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('is_password', "Password yang dimasukkan tidak benar");
            return FALSE;
        }
    }

    public function password()
    {
    	$data = array(
					'title'				=>	'Ubah Password',
					'main_view'			=>	'pages/password',
					'active_account'	=>	'active',
					'breadcrumb'		=>	'Account',
				);

		$this->form_validation->set_rules('password','Password Lama','trim|required|callback_is_password');
		$this->form_validation->set_rules('new_password','Password Baru','trim|required|min_length[8]');
		$this->form_validation->set_rules('new_password_conf','Konfirmasi Password Baru','trim|required|matches[new_password]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('themes/template', $data);
		}
		else
		{
			if($this->User_model->password())
		    {
		       	$this->session->set_flashdata('pesan', 'Proses update password berhasil.');
		       	redirect('User/Index');
		    }
		    else // gagal update ke db
		    {
		       	$data['pesan'] = 'Proses update gagal.';
	           	$this->load->view('themes/template', $data);
		    }
		}

    }
}
