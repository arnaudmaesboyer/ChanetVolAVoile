<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class ReservationClient extends ADMINISTRATOR_Controller {
	

	public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('encrypt');
		 $this->load->helper('cookie');
		 $this->load->model('reservationClient_model');
	 }

	public function index()
	{
		
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$this->load->model('client_model');
		$data['idClient']= $this->client_model->getIdClient($data['isClient']->mail);
		$this->load->model('gliders_model');
		$data['gliders']= $this->gliders_model->liste_gliders();
		$this->load->view('header', $data);
		$this->load->view('ReservationClient_page', $data);
		$this->load->view('footer', $data);
	}
	public function reserver(){
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$this->load->model('client_model');
		$data['idClient']= $this->client_model->getIdClient($data['isClient']->mail);
		$this->reservationClient_model->reserver($data);
		redirect(site_url('reservationClient/AffichageReservation'));
	}
	public function AffichageReservation(){
		$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$this->load->model('client_model');
		$data['idClient']= $this->client_model->getIdClient($data['isClient']->mail);
		$data['reservation'] = $this->reservationClient_model->getReservation($data);
		$this->load->view('header', $data);
		$this->load->view('AffichageReservationClient_page', $data);
		$this->load->view('footer', $data);
	}
	public function annulerReservation($idReserv){
	$data['isAdmin'] = parent::isAdmin();
		$data['isClient'] = parent::isClient();
		$data['idReserv'] = $idReserv;
		$this->reservationClient_model->annulerReservation($data);
		redirect(site_url('ReservationClient/AffichageReservation'));
	}
}
