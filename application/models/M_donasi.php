<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_donasi extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_donasi)
	{
		$this->db->where('id_donasi',$id_donasi);
		$hasil = $this->db->get('tbl_donasi');
		return $hasil;
	}
	public function getupdate($id_donasi,$data)
	{
		$this->db->where('id_donasi',$id_donasi);
		$this->db->update('tbl_donasi', $data);
	}	
		public function getinsert($data_donasi)
	{
		$this->db->insert('tbl_donasi',$data_donasi);
	}	
	public function getdelete($id_donasi)
	{
		$this->db->where('id_donasi',$id_donasi);
		$this->db->delete('tbl_donasi');
	}	

	
	public function donasi()
	{
		$data = " SELECT *
		FROM tbl_donasi, tbl_pengguna, tbl_posko, jenis_pohon WHERE tbl_donasi.id_pengguna=tbl_pengguna.id_pengguna
		AND tbl_donasi.id_posko=tbl_posko.id_posko AND tbl_donasi.id_jenis_pohon=jenis_pohon.id_jenis_pohon";
		return $this->db->query($data);
	}
	

}
