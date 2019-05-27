<?php
// Load file koneksi.php

// Ambil data ID Provinsi yang dikirim via ajax post
$id_posko= $_POST['id_posko'];

// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)

$posko = $this->db->query('Select * from jenis_pohon where id_posko='.$id_posko.'');


// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih</option>";

foreach ($sql as $hasil):
	$html .= "<option value='".$hasil['id_jenis_pohon']."'>".$hasil['nama_jenis_pohon']."</option>"; // Tambahkan tag option ke variabel $html
endforeach;

$callback = array('data_jenis'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
