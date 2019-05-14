<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor_model extends CI_Model
{
	protected $table = 'monitor';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('encrypt');
    }

  public function liste_monitor_ajax(){
    $hasil=$this->db->get('monitor');
    return $hasil->result();
  }
  public function infosMonitor($data){
    $hasil=$this->db->get_where('monitor', array('idMonitor' => $data));
    return $hasil->result();
  }
  public function getIdMonitor($mail){
    $this->db->select('idMonitor');
    $this->db->from('monitor');
    $this->db->where(array('mail' => $mail));
    $hasil = $this->db->get();
    return $hasil->result();
  }
  public function UpdateMonitor($id){
      //$id= $this->input->post('idMonitor');
      $data = array(
              'LastName'  => $_POST['LastName'], 
              'FirstName'  => $_POST['FirstName'], 
              'Phone' => $_POST['Phone'],
              'Birthday' => $_POST['Birthday'],
              'mail' => $_POST['mail'], 
              'Street'  => $_POST['Street'], 
              'PostalCode' =>$_POST['PostalCode'], 
              'City' => $_POST['City'],
              'GraduationDate' => $_POST['GraduationDate'],
              'FlightTotalHNumbre' => $_POST['FlightTotalHNumbre'],
              );
      
      $this->db->where('idMonitor', $id);
      $this->db->update('monitor', $data);
      return $result;
}
  public function ChangePasswordMonitor($id){
      $data = array(
        'password' => $this->encrypt->encode( $_POST['Password1'])
      );
      if  ($_POST['Password1'] ==  $_POST['Password2']){
        $this->db->where('idMonitor', $id);
        $this->db->update('monitor', $data);
      }else{
        alert("les deux mots de passe ne correspondent pas");
      }
  }
}