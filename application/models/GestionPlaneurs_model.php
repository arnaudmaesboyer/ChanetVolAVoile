<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionPlaneurs_model extends CI_Model
{
 public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('encrypt');
  }

public function InscriptionClient(){
        $data = array(
                'LastName'  => $this->input->post('LastName'), 
                'FirstName'  => $this->input->post('FirstName'), 
                'Phone' => $this->input->post('Phone'),
                'Birthday' => $this->input->post('Birthday'),
                'mail' => $this->input->post('mail'), 
                'password' =>$this->encrypt->encode( $this->input->post('password')),
                'Street'  => $this->input->post('Street'), 
                'PostalCode' => $this->input->post('PostalCode'), 
                'City' => $this->input->post('City'),
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
        'Registration' => $_POST['Registration'],
        'Type'  => $_POST['Type'], 
        'NbPlace'  => $_POST['NbPlace'],
        'Weight'  => $_POST['Weight'],
        'Span'  => $_POST['Span'],
        'Image'  => 'http://locahost/ChanetVolAVoile/assets/image/'.$_POST['Registration'].'.jpg', 
        );
      $this->db->insert('glider', $data);
}
}