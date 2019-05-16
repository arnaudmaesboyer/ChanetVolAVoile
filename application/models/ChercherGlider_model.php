<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChercherGlider_model extends CI_Model
{
	protected $table = 'person';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('encryption');
    }

public function RechercheGlider($ecriture){
    $this->db->select('*');
    $this->db->from('glider');
    $this->db->like('Type', $ecriture, 'after');
    $hasil = $this->db->get();
    return $hasil->result();
  }
}