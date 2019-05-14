<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
	protected $table = 'person';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('encrypt');
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
}
public function ChangePasswordClient($id){
  $data = array(
    'password' => $this->encrypt->encode( $_POST['Password1'])
  );
  if  ($_POST['Password1'] ==  $_POST['Password2']){
    $this->db->where('idCust', $id);
    $this->db->update('person', $data);
  }else{
    alert("les deux mots de passe ne correspondent pas");
  }
}
}