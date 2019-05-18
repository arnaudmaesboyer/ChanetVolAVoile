<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class GestionClient extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
         $this->load->helper('cookie');
		 $this->load->model('client_model');
		 $this->load->library('form_validation');
	 }

	public function index()
	{
		
        $data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        
        $data['client'] =$this->client_model->getIdClient($data['isClient']->mail);
        $data['infos'] =$this->client_model->infosClient($data['client'][0]->idCust);
		$this->load->view('header', $data);
		$this->load->view('modifClient_page', $data);
		$this->load->view('footer', $data);
    }
    public function UpdateClient($id){
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('FirstName', 'FirstName', 'required|alpha');
		$this->form_validation->set_rules('LastName', 'LastName', 'required|alpha');
		$this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('Street', 'Street', 'required');
		$this->form_validation->set_rules('City', 'City', 'required');
		$this->form_validation->set_rules('PostalCode', 'PostalCode', 'required|min_length[5]|max_length[5]|numeric');
		$this->form_validation->set_rules('Birthday', 'Birthday', 'required');
		if ($this->form_validation->run() == FALSE)
                {
					$data['isAdmin'] = parent::isAdmin();
					$data['isClient'] = parent::isClient();
					
					$data['client'] =$this->client_model->getIdClient($data['isClient']->mail);
					$data['infos'] =$this->client_model->infosClient($data['client'][0]->idCust);
					$this->load->view('header', $data);
					$this->load->view('modifClient_page', $data);
					$this->load->view('footer', $data);
                }
                else
                {
					$data= $this->client_model->UpdateClient($id);
					delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
					delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
					redirect(site_url('welcome'));
			 
                }
       
    }
    public function AffichageChangePassword(){
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
        $this->load->model('client_model');
        $data['client'] =$this->client_model->getIdClient($data['isClient']->mail);
		$this->load->view('header', $data);
		$this->load->view('modifPasswordClient_page', $data);
		$this->load->view('footer', $data);
	}
	public function ChangePassword($id){
		$this->form_validation->set_rules('Password1', 'password', 'required|max_length[30]');
		$this->form_validation->set_rules('Password2', 'password2', 'required|max_length[30]|matches[Password1]');
		if ($this->form_validation->run() == FALSE)
                {
					$data['isAdmin'] = parent::isAdmin();
					$data['isClient'] = parent::isClient();
					$this->load->model('client_model');
					$data['client'] =$this->client_model->getIdClient($data['isClient']->mail);
					$this->load->view('header', $data);
					$this->load->view('modifPasswordClient_page', $data);
					$this->load->view('footer', $data);
                }
                else
                {
					$data= $this->client_model->ChangePasswordClient($id);
					delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
					delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
					redirect(site_url('welcome'));
			 
                }
	}
}
