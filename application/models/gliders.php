<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gliders extends CI_Model
{
	<?php

	protected $table = 'glider';


/**
 *	Retourne une liste de gliders
 *	@return objet		La liste de news
 */

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
}