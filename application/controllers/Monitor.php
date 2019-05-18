<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class Monitor extends Administrator_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 {
		 parent::__construct();
         $this->load->database();
		 $this->load->model('monitor_model');
		 $this->load->library('form_validation');
	 }
	 
	 public function index()
	 {
		$this->affichageAjax();
		 
	 }
	 public function affichageAjax(){
		$data= $this->monitor_model->liste_monitor_ajax();
		echo json_encode($data);
	 }
	 public function affichageInfos(){
		$id = $this->input->post('idMonitor');
		$data= $this->monitor_model->infosMonitor($id);
	 }
	 public function recuperationAjaxId(){
		$mail = $this->input->post('mail');
		$data= $this->monitor_model->getIdMonitor($mail);
	 }
	 public function UpdateAdmin($id){
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('FirstName', 'FirstName', 'required|alpha');
		$this->form_validation->set_rules('LastName', 'LastName', 'required|alpha');
		$this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('Street', 'Street', 'required');
		$this->form_validation->set_rules('City', 'City', 'required');
		$this->form_validation->set_rules('PostalCode', 'PostalCode', 'required|min_length[5]|max_length[5]|numeric');
		$this->form_validation->set_rules('Birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('dateValidation', 'dateValidation', 'required');
		$this->form_validation->set_rules('nbHeureVol', 'nbHeureVol', 'required|numeric');
		if ($this->form_validation->run() == FALSE)
                {
					$data['isAdmin'] = parent::isAdmin();
					$data['isClient'] = parent::isClient();
					
					$data['admin'] =$this->monitor_model->getIdMonitor($data['isAdmin']->mail);
					$data['infos'] =$this->monitor_model->infosMonitor($data['admin'][0]->idMonitor);
					$this->load->view('header', $data);
					$this->load->view('modifAdmin', $data);
					$this->load->view('footer', $data);
                }
                else
                {
					$data= $this->monitor_model->UpdateMonitor($id);
					delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
					delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
					redirect(site_url('welcome'));
			 
                } 

	 }
}
