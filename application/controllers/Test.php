<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	 
	 public function index()
	 {
		 var_dump("lol");
		$this->load->view('testcoucou');
	 }
}
?>