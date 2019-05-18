<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionPlaneurs_model extends CI_Model
{
 public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('encryption');
  }

public function DeletePlaneur($data)
  {
    $this->db->delete('glider', array('Registration' => $data['Registration']));
  }
public function AjoutPlaneur(){
    $data = array(
        'Registration' => htmlspecialchars($_POST['Registration']),
        'Type'  => htmlspecialchars($_POST['Type']), 
        'NbPlace'  => htmlspecialchars($_POST['NbPlace']),
        'Weight'  => htmlspecialchars($_POST['Weight']),
        'Span'  => htmlspecialchars($_POST['Span']),
        'Image'  => site_url('assets/image/').$_POST['Registration'].'.jpg', 
        );
      $this->db->insert('glider', $data);
}
}