<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
	protected $table = 'person';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('encryption');
    }

  public function infosClient($data){
    $hasil=$this->db->get_where('person', array('idCust' => $data));
    return $hasil->result();
  }
  public function getIdClient($mail){
    $this->db->select('idCust');
    $this->db->from('person');
    $this->db->where(array('mail' => $mail));
    $hasil = $this->db->get();
    return $hasil->result();
  }
  public function UpdateClient($id){
      $data = array(
              'LastName'  => htmlspecialchars($_POST['LastName']), 
              'FirstName'  => htmlspecialchars($_POST['FirstName']), 
              'Phone' => htmlspecialchars($_POST['Phone']),
              'Birthday' => htmlspecialchars($_POST['Birthday']),
              'mail' => htmlspecialchars($_POST['mail']), 
              'password' => htmlspecialchars($this->encryption->encrypt( $_POST['password'])),
              'Street'  => htmlspecialchars($_POST['Street']), 
              'PostalCode' =>htmlspecialchars($_POST['PostalCode']), 
              'City' => htmlspecialchars($_POST['City']),
              );
      
      $this->db->where('idCust', $id);
      $this->db->update('person', $data);
      return $result;
}
public function ChangePasswordClient($id){
  $data = array(
    'password' => $this->encryption->encrypt( $_POST['Password1'])
  );
  if  ($_POST['Password1'] ==  $_POST['Password2']){
    $this->db->where('idCust', $id);
    $this->db->update('person', $data);
  }else{
    alert("les deux mots de passe ne correspondent pas");
  }
}
}