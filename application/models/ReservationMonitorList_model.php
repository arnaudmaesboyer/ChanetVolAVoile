<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReservationMonitorList_model extends CI_Model
{
	protected $table = 'reservationcustomer';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

  public function infosReservationClient(){
    $hasil=$this->db->get('reservationcustomer');
    return $hasil->result();
  }
  
  /*public function UpdateClient($id){
      $data = array(
              'LastName'  => $_POST['LastName'], 
              'FirstName'  => $_POST['FirstName'], 
              'Phone' => $_POST['Phone'],
              'Birthday' => $_POST['Birthday'],
              'mail' => $_POST['mail'], 
              'password' => $this->encrypt->encode( $_POST['password']),
              'Street'  => $_POST['Street'], 
              'PostalCode' =>$_POST['PostalCode'], 
              'City' => $_POST['City'],
              );
      
      $this->db->where('idCust', $id);
      $this->db->update('person', $data);
      return $result;
}*/
}