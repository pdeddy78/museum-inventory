<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data = array(
					'title'			=>	'Index',
					'main_view'		=>	'blank',
					'active_dashboard'	=>	'active',
					'breadcrumb'	=>	'Dashboard',
				);

		$this->load->view('themes/template', $data);
	}
}
