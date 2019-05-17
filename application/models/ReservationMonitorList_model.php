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
    $this->db->select('*'); // Select field 
    $this->db->from('reservationcustomer as rc'); // from Table1 
    $this->db->join('glider','rc.Registration = glider.Registration'); // Join table1 with table2 based on the foreign key
    $this->db->join('person','rc.idCust = person.idCust'); 
    $res = $this->db->get(); 
    return $res->result();
  }
  
  public function prendreReservation($data)
  {
      $this->db->where('IdReservCust',$data['idReserv']);
      $this->db->update('reservationcustomer', $data['idMonitor'][0]);
  }
}