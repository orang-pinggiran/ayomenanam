<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_kategori extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_kategori)
	{
		$this->db->where('id_kategori',$id_kategori);
		$hasil = $this->db->get('tbl_kategori');
		return $hasil;
	}
	public function getupdate($id_kategori,$data)
	{
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('tbl_kategori', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_kategori',$data);
	}	
	public function getdelete($id_kategori)
	{
		$this->db->where('id_kategori',$id_kategori);
		$this->db->delete('tbl_kategori');
	}	

	
	public function kategori()
	{
		$data = " SELECT *
		FROM tbl_kategori 
		";
		return $this->db->query($data);
	}
	

}
