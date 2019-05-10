<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_map extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_map)
	{
		$this->db->where('id_map',$id_map);
		$hasil = $this->db->get('tbl_map');
		return $hasil;
	}
	public function getupdate($id_map,$data)
	{
		$this->db->where('id_map',$id_map);
		$this->db->update('tbl_map', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_map',$data);
	}	
	public function getdelete($id_map)
	{
		$this->db->where('id_map',$id_map);
		$this->db->delete('tbl_map');
	}	

	
	public function map()
	{
		$data = " SELECT *
		FROM tbl_map, tbl_kategori where tbl_map.id_kategori=tbl_kategori.id_kategori
		";
		return $this->db->query($data);
	}
	

}
