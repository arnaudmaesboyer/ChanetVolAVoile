<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_Controller.php');
class ReservationMonitorList extends Administrator_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encryption');
         $this->load->helper('cookie');
         $this->load->model('ReservationMonitorList_model');
	 }

	public function index()
	{
		
		$data['isAdmin'] = parent::isAdmin();
        $data['isClient'] = parent::isClient();
        $data['infos'] =$this->ReservationMonitorList_model->infosReservationClient();
		$this->load->view('header', $data);
		$this->load->view('ReservationMonitorList_page', $data);
		$this->load->view('footer', $data);
	}
	public function prendreReservation($idReserv){
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$this->load->model('monitor_model');
		$data['idMonitor']= $this->monitor_model->getIdMonitor($data['isAdmin']->mail);
		$data['idReserv'] = $idReserv;
		$this->ReservationMonitorList_model->prendreReservation($data);
		redirect(site_url('ReservationMonitorList'));

	}
}
