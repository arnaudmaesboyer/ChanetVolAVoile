<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gliders_model extends CI_Model
{
	protected $table = 'glider';

 public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
public function liste_gliders()
{

	return $this->db->select('*')
			->from($this->table)
			->order_by('Registration', 'asc')
			->get()
			->result();
}
public function liste_gliders_ajax(){
	$hasil=$this->db->get('glider');
	return $hasil->result();
}
}