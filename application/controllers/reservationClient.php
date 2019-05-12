<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class ReservationClient extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encrypt');
		 $this->load->helper('cookie');
	 }

	public function index()
	{
		
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		var_dump($data); 
		$this->load->view('header', $data);
		$this->load->view('ReservationClient_page', $data);
		$this->load->view('footer', $data);
	}
}
