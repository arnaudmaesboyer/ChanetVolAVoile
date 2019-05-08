<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionConnexion_model extends CI_Model
{
 public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

public function InscriptionClient(){
        $data = array(
                'LastName'  => $this->input->post('LastName'), 
                'FirstName'  => $this->input->post('FirstName'), 
                'Phone' => $this->input->post('Phone'),
                'Birthday' => $this->input->post('Birthday'),
                'Username' => $this->input->post('Username'), 
                'Password' => $this->input->post('Password'),
                'Street'  => $this->input->post('Street'), 
                'PostalCode' => $this->input->post('PostalCode'), 
                'City' => $this->input->post('City'),
            );
        $result=$this->db->insert('person',$data);
        return $result;
}
}