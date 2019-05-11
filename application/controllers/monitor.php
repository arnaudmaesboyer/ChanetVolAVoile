<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

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
		 var_dump($_POST);
		$data= $this->monitor_model->UpdateMonitor($id);
		delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
		delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
		redirect(site_url('welcome'));

	 }
}
