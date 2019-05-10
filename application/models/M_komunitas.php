<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_komunitas extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_komunitas)
	{
		$this->db->where('id_komunitas',$id_komunitas);
		$hasil = $this->db->get('tbl_komunitas');
		return $hasil;
	}
	public function getupdate($id_komunitas,$data)
	{
		$this->db->where('id_komunitas',$id_komunitas);
		$this->db->update('tbl_komunitas', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_komunitas',$data);
	}	
	public function getdelete($id_komunitas)
	{
		$this->db->where('id_komunitas',$id_komunitas);
		$this->db->delete('tbl_komunitas');
	}	

		public function pengguna()
	{
		$data = " SELECT *
		FROM tbl_pengguna WHERE level='3'

		";
		return $this->db->query($data);
	}
	
	public function komunitas()
	{
		$data = " SELECT *
		FROM tbl_pengguna WHERE level='2'

		";
		return $this->db->query($data);
	}
	
}
