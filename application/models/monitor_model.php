<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor_model extends CI_Model
{
	protected $table = 'monitor';

 public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

public function liste_monitor_ajax(){
  $hasil=$this->db->get('monitor');
	return $hasil->result();
}
}