<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_pohon extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_pohon)
	{
		$this->db->where('id_pohon',$id_pohon);
		$hasil = $this->db->get('tbl_pohon');
		return $hasil;
	}
	public function getupdate($id_pohon,$data)
	{
		$this->db->where('id_pohon',$id_pohon);
		$this->db->update('tbl_pohon', $data);
	}	
		public function getinsert($data_pohon)
	{
		$this->db->insert('tbl_pohon',$data_pohon);
	}	
	public function getdelete($id_pohon)
	{
		$this->db->where('id_pohon',$id_pohon);
		$this->db->delete('tbl_pohon');
	}	

	
	public function pohon()
	{
		$data = " SELECT *
		FROM tbl_pohon, tbl_posko, jenis_pohon WHERE tbl_pohon.id_posko=tbl_posko.id_posko
		AND tbl_pohon.id_jenis_pohon=jenis_pohon.id_jenis_pohon ORDER BY tbl_posko.nama_posko ASC";
		return $this->db->query($data);
	}
	

}
