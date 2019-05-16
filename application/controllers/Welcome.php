<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class Welcome extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
		 $this->load->helper('cookie');
	 }

	public function index()
	{
		
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient(); 
		$this->load->view('header', $data);
		$this->load->view('welcome_page', $data);
		$this->load->view('footer', $data);
	}
}
