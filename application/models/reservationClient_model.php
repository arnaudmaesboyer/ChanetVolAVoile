<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReservationClient_model extends CI_Model
{
	protected $table = 'reservationcustomer';

  public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

  
  
  public function reserver($id)
  {
    var_dump($id['idClient'][0]->idCust);
    $data = array(
        'idCust' => $id['idClient'][0]->idCust,
        'DateReservClient'  => htmlspecialchars($_POST['dateReserv']), 
        'Registration'  => htmlspecialchars($_POST['SelectGliders']), 
        );
      $this->db->insert('reservationcustomer', $data);
  }
  public function getReservation($id){
    $this->db->select('*'); // Select field 
    $this->db->from('reservationcustomer as rc'); // from Table1 
    $this->db->join('glider','rc.Registration = glider.Registration'); // Join table1 with table2 based on the foreign key
    $this->db->join('person','rc.idCust = person.idCust');
    $this->db->where('rc.idCust',$id['idClient'][0]->idCust); 
    $query = $this->db->get();
    return $query->result();
  }
  public function annulerReservation($data)
  {
    $this->db->delete('reservationcustomer', array('idReservCust' => $data['idReserv']));
  }
  
}