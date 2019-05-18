<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class GestionAdmin extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
		 $this->load->helper('cookie');
		 $this->load->model('monitor_model');
		 $this->load->library('form_validation');
	 }

	public function index()
	{
		
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        
        $data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
        $data['infos'] =$this->monitor_model->infosMonitor($data['admin'][0]->idMonitor);
		$this->load->view('header', $data);
		$this->load->view('modifAdmin', $data);
		$this->load->view('footer', $data);
	}
	public function AffichageChangePassword(){
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        $this->load->model('monitor_model');
        $data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
		$this->load->view('header', $data);
		$this->load->view('modifPasswordAdmin_page', $data);
		$this->load->view('footer', $data);
	}
	public function ChangePassword($id){
		$this->form_validation->set_rules('Password1', 'password', 'required|max_length[30]');
		$this->form_validation->set_rules('Password2', 'password2', 'required|max_length[30]|matches[Password1]');
		if ($this->form_validation->run() == FALSE)
                {
					$data['isAdmin'] = parent::isAdmin();
					$data['isClient'] = parent::isClient();
					$this->load->model('monitor_model');
					$data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
					$this->load->view('header', $data);
					$this->load->view('modifPasswordAdmin_page', $data);
					$this->load->view('footer', $data);
                }
                else
                {
					$data= $this->monitor_model->ChangePasswordMonitor($id);
					delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
					delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
					redirect(site_url('welcome'));
						
                }
	}
}
