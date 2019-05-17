<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class M_grafik extends CI_model {

	public function cek_user($data){
	$query = $this->db->get_where('tbl_pengguna',$data);
	return $query;
	}
	
	
	public function hasilcari($id_posko='all')
	{
		$where = array();
		if($id_posko!='all'){
			$where['a.id_posko'] = $id_posko;
		}
		$custom_where = extract_where_query($where);
		$data = " SELECT 
	data.*
FROM (
	SELECT 
		a.id_posko,
		a.nama_posko,
		c.nama_jenis_pohon,
		COALESCE(sum(b.jumlah),0) as jumlah
	FROM
		tbl_posko a 
	LEFT JOIN 
		tbl_pohon b ON b.id_posko = a.id_posko 
	LEFT JOIN 
		jenis_pohon c ON c.id_jenis_pohon = b.id_jenis_pohon
	$custom_where
	GROUP BY 
		c.id_jenis_pohon
) AS data
WHERE 
	data.nama_jenis_pohon IS NOT NULL
				";
		return $this->db->query($data)->result_array();
	}
	
	

}
