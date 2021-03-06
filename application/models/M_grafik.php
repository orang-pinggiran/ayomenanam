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
	
	public function hasilgrafik($filter_month, $filter_posko = 'all')
	{	
		// custom where donasi 
		$where_donasi = array();
		$where_adopsi = array();
		
		$where_donasi['a.status'] = 'Disetujui';
		$where_adopsi['a.status_adopsi'] = 'Disetujui';
		
		if($filter_posko != 'all'){
			$where_donasi['a.id_posko'] = $filter_posko;
			$where_adopsi['a.id_posko'] = $filter_posko;
		}
		$custom_where_donasi = extract_where_query($where_donasi);
		$custom_where_adopsi = extract_where_query($where_adopsi);
		
		$data = " SELECT 
			DATE_FORMAT(all_date.tanggal, '%d-%m-%Y') as tanggal,
			COALESCE(data_adopsi.total_adopsi, 0) as total_adopsi,
			COALESCE(data_donasi.total_donasi, 0) as total_donasi
		FROM (
			SELECT 
				LAST_DAY('$filter_month') - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY AS tanggal
			FROM (
				SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS a
				CROSS JOIN (SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS b
				CROSS JOIN (SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) AS c
		) all_date
		LEFT JOIN (
			SELECT 
				DATE(a.tgl_donasi) as tanggal,
				SUM(a.jumlah_pohon) as total_donasi
			FROM 
				tbl_donasi a 
			$custom_where_donasi
			GROUP BY 
				DATE(a.tgl_donasi)
		) data_donasi ON data_donasi.tanggal = all_date.tanggal
		LEFT JOIN (
			SELECT 
				DATE(a.tgl_adopsi) as tanggal,
				SUM(a.jumlah_pohon) as total_adopsi
			FROM
				tbl_adopsi a
			$custom_where_adopsi
			GROUP BY 
				DATE(a.tgl_adopsi)
		) data_adopsi ON data_adopsi.tanggal = all_date.tanggal
		WHERE all_date.tanggal BETWEEN '$filter_month' AND LAST_DAY('$filter_month') ORDER BY all_date.tanggal
				";
		return $this->db->query($data)->result_array();
	}	

}
