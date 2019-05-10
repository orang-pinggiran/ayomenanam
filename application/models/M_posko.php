<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_posko extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_posko)
	{
		$this->db->where('id_posko',$id_posko);
		$hasil = $this->db->get('tbl_posko');
		return $hasil;
	}
	public function getupdate($id_posko,$data)
	{
		$this->db->where('id_posko',$id_posko);
		$this->db->update('tbl_posko', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_posko',$data);
	}	
	public function getdelete($id_posko)
	{
		$this->db->where('id_posko',$id_posko);
		$this->db->delete('tbl_posko');
	}	

	
	public function posko()
	{
		$data = " SELECT *
		FROM tbl_pengguna WHERE level='4' 
		";
		return $this->db->query($data);
	}
	

}
