<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_event extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_event)
	{
		$this->db->where('id_event',$id_event);
		$hasil = $this->db->get('tbl_event');
		return $hasil;
	}
	public function getupdate($id_event,$data)
	{
		$this->db->where('id_event',$id_event);
		$this->db->update('tbl_event', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_event',$data);
	}	
	public function getdelete($id_event)
	{
		$this->db->where('id_event',$id_event);
		$this->db->delete('tbl_event');
	}	

	
	public function event()
	{
		$data = " SELECT *
		FROM tbl_event, tbl_pengguna where tbl_event.id_pengguna=tbl_pengguna.id_pengguna 
		";
		return $this->db->query($data);
	}
	

}
