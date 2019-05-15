<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AffichageErreur_model extends CI_Model
{
	protected $table = 'erreur';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

  public function getErreur(){
    $this->db->select('*'); // Select field 
    $this->db->from('erreur'); // from Table1 
    $query = $this->db->get();
    return $query->result();
  }
  
}