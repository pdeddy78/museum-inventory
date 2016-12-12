<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model("User_model","",TRUE);
	}

	public function index()
	{
		$data = array(
				'title' 	=> 'Login'
		);

		if ($this->session->userdata('login') == TRUE) {
			redirect('Home/Index');
		}
		else
		{
			$this->load->view('login', $data);
		}
	}

	public function login()
	{
		$data = array(
				'title' 	=> 'Login'
		);

		if ($this->session->userdata('login') == TRUE) {
			redirect('Home/Index');
		}
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
	    	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
			
			if($this->form_validation->run() == FALSE)
		    {
				$this->load->view('login', $data);
		    }
		    else
		    {
		      	redirect('Home/Index', 'refresh');
		    }
		}
	}

	function check_database($password)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = sha1($this->config->item('salt') . $password);

	    $result = $this->User_model->login($username, $password);
	    
	    if($result)
	    {
	      $sess_array = array();
	      foreach($result as $row)
	      {
	        $sess_array = array(
	          'id' 		=> $row->id_user,
	          'username' => $row->username,
	          'login' 	=> TRUE
	        );
	        $this->session->set_userdata($sess_array);
	      }
	      return TRUE;
	    }
	    else
	    {
	      $this->form_validation->set_message('check_database', 'Invalid username or password');
	      return false;
	    }
	}

	public function logout()
  	{

  		$username = $this->session->userdata('username');

        $this->db->set("last_active", date("YmdHms"));
        $this->db->where("username", $username);
        $this->db->update("TMUser");
	    $this->session->unset_userdata(array('id'=>'','username'=>'','login' => FALSE));
	    session_destroy();
	    redirect('Home/Index', 'refresh');
  	}
}
