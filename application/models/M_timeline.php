<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_timeline extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_timeline)
	{
		$this->db->where('id_timeline',$id_timeline);
		$hasil = $this->db->get('tbl_timeline');
		return $hasil;
	}
	public function getupdate($id_timeline,$data)
	{
		$this->db->where('id_timeline',$id_timeline);
		$this->db->update('tbl_timeline', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('tbl_timeline',$data);
	}	
	public function getdelete($id_timeline)
	{
		$this->db->where('id_timeline',$id_timeline);
		$this->db->delete('tbl_timeline');
	}	

	
	public function timeline()
	{
		$data = " SELECT *
		FROM tbl_timeline, tbl_pengguna where tbl_timeline.id_pengguna=tbl_pengguna.id_pengguna ORDER BY tbl_timeline.id_timeline DESC
		";
		return $this->db->query($data);
	}
	

}
