<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionConnexion_model extends CI_Model
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
}