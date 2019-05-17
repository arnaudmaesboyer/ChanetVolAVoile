<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Initiation_model extends CI_Model
{
 public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

public function liste_initiation_ajax(){
	$hasil=$this->db->get('initiationvol');
	return $hasil->result();
}
}