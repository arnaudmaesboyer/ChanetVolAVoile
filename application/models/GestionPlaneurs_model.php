<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionPlaneurs_model extends CI_Model
{
 public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('encryption');
  }

public function InscriptionClient(){
        $data = array(
                'LastName'  => htmlspecialchars($this->input->post('LastName')), 
                'FirstName'  => htmlspecialchars($this->input->post('FirstName')), 
                'Phone' => htmlspecialchars($this->input->post('Phone')),
                'Birthday' => htmlspecialchars($this->input->post('Birthday')),
                'mail' => htmlspecialchars($this->input->post('mail')), 
                'password' =>htmlspecialchars($this->encryption->encrypt( $this->input->post('password'))),
                'Street'  => htmlspecialchars($this->input->post('Street')), 
                'PostalCode' => htmlspecialchars($this->input->post('PostalCode')), 
                'City' => htmlspecialchars($this->input->post('City')),
            );
        $result=$this->db->insert('person',$data);
        return $result;
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