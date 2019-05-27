<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_pengguna extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$hasil = $this->db->get('tbl_pengguna');
		return $hasil;
	}
	public function getupdate($id_pengguna,$data)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->update('tbl_pengguna', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_pengguna',$data);
	}	
	public function getdelete($id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->delete('tbl_pengguna');
	}	

		public function pengguna()
	{
		$data = " SELECT *
		FROM tbl_pengguna GROUP BY level asc

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
	
	public function jenis()
	{
		$data = " SELECT *
		FROM jenis_pohon

		";
		return $this->db->query($data);
	}
}
