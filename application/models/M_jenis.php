<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_jenis extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_jenis_pohon)
	{
		$this->db->where('id_jenis_pohon',$id_jenis_pohon);
		$hasil = $this->db->get('jenis_pohon');
		return $hasil;
	}
	public function getupdate($id_jenis_pohon,$data)
	{
		$this->db->where('id_jenis_pohon',$id_jenis_pohon);
		$this->db->update('jenis_pohon', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('jenis_pohon',$data);
	}	
	public function getdelete($id_jenis_pohon)
	{
		$this->db->where('id_jenis_pohon',$id_jenis_pohon);
		$this->db->delete('jenis_pohon');
	}	

		
	public function jenis_pohon()
	{
		$data = " SELECT *
		FROM jenis_pohon
		";
		return $this->db->query($data);
	}
	
}
