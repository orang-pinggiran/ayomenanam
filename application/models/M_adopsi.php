<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_adopsi extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	public function get_data($id_adopsi)
	{
		$this->db->where('id_adopsi',$id_adopsi);
		$hasil = $this->db->get('tbl_adopsi');
		return $hasil;
	}
	public function getupdate($id_adopsi,$data)
	{
		$this->db->where('id_adopsi',$id_adopsi);
		$this->db->update('tbl_adopsi', $data);
	}	
		public function getinsert($data_adopsi)
	{
		$this->db->insert('tbl_adopsi',$data_adopsi);
	}	
	public function getdelete($id_adopsi)
	{
		$this->db->where('id_adopsi',$id_adopsi);
		$this->db->delete('tbl_adopsi');
	}	

	
	public function adopsi()
	{
		$data = " SELECT *
		FROM tbl_adopsi, tbl_pengguna, tbl_posko, jenis_pohon, tbl_event WHERE tbl_event.id_event=tbl_adopsi.id_event AND
		tbl_adopsi.id_pengguna=tbl_pengguna.id_pengguna
		AND tbl_adopsi.id_posko=tbl_posko.id_posko AND tbl_adopsi.id_jenis_pohon=jenis_pohon.id_jenis_pohon";
		return $this->db->query($data);
	}
	
	

}
