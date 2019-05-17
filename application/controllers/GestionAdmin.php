<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class GestionAdmin extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
		 $this->load->helper('cookie');
		 $this->load->model('monitor_model');
	 }

	public function index()
	{
		
        $data['isAdmin'] = parent::isAdmin();
        var_dump($data['isAdmin']);
		$data['isClient'] = parent::isClient();
        
        $data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
        $data['infos'] =$this->monitor_model->infosMonitor($data['admin'][0]->idMonitor);
		$this->load->view('header', $data);
		$this->load->view('modifAdmin', $data);
		$this->load->view('footer', $data);
	}
	public function AffichageChangePassword(){
		$data['isAdmin'] = parent::isAdmin();
        var_dump($data['isAdmin']);
		$data['isClient'] = parent::isClient();
        $this->load->model('monitor_model');
        $data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
		$this->load->view('header', $data);
		$this->load->view('modifPasswordAdmin_page', $data);
		$this->load->view('footer', $data);
	}
	public function ChangePassword($id){
		$data= $this->monitor_model->ChangePasswordMonitor($id);
		delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		//redirect(site_url('welcome'));
	}
}
