<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
		$data = array(
					'app_name'	=>	'Viewboard ZPreneur',
					'title'		=>	'404 Page Not Found',
					'main_view'	=>	'error404'
				);

		$this->load->view('themes/template', $data);
	}
}
