<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class GestionClient extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encrypt');
         $this->load->helper('cookie');
         $this->load->model('client_model');
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
        var_dump($_POST);
       $data= $this->client_model->UpdateClient($id);
       delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
       delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
       redirect(site_url('welcome'));

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
		$data= $this->client_model->ChangePasswordClient($id);
		delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		//redirect(site_url('welcome'));
	}
}
