<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$user_data = $this->session->userdata();
		$level = $user_data['level'];
		
		if($level != 3) {
			redirect(404);
		}

		$this->id_pengguna = $user_data['id_pengguna'];
	}
	
	public function index()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/dashboard';
		$isi['data'] 		= $this->db->get('tbl_pengguna');
		$this->load->view('pengguna/template',$isi);
	}
	
	public function profil()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/profil';
		
		$last_segment = $this->uri->total_segments();
		$id_pengguna = $this->uri->segment($last_segment);
		$this->db->where('id_pengguna',$id_pengguna);
		$query =$this->db->get('tbl_pengguna');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_pengguna']	 =$row->id_pengguna;
				$isi['nama'] =$row->nama;
				$isi['email'] =$row->email;
				$isi['password'] =$row->password;
				$isi['level'] =$row->level;
				$isi['alamat'] =$row->alamat;
				$isi['tlp'] =$row->tlp;
				$isi['foto'] =$row->foto;
			
			}
		}
		else
		{
				$isi['id_pengguna']	='';
				$isi['nama']='';
				$isi['email']='';
				$isi['password']='';
				$isi['level']='';
				$isi['alamat']='';
				$isi['tlp']='';
				$isi['foto']='';

		}
		$this->load->view('pengguna/template',$isi);
		}
		
		public function editprofil()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		 $config = array(
                        'upload_path'=>'./adminBSB/images',
                        'allowed_types'=>'jpg|png|jpeg',
                        'max_size'=>2086
                        );
 
        $id_pengguna			= $this->input->post('id_pengguna'); 
		$data['id_pengguna']    = $this->input->post('id_pengguna');
		$data['nama']	 		= $this->input->post('nama'); 
		$data['email']     		= $this->input->post('email');
		$password 				= $this->input->post('password');
		$level 					= $this->input->post('level');
		$data['alamat']		 	= $this->input->post('alamat');
		$data['tlp']		 	= $this->input->post('tlp');
		$data['foto'] 			= $this->input->post('foto');
        
		$foto = $this->db->get_where('tbl_pengguna',$id_pengguna);
   
    if($foto->num_rows()>0){
      $pros=$foto->row();
      $name=$pros->gambar;
     
      if(file_exists($lok=FCPATH.'/adminBSB/images/'.$name)){
        unlink($lok);
      }
      if(file_exists($lok=FCPATH.'/adminBSB/images/'.$name)){
        unlink($lok);
      }}
 
        $this->load->library('upload',$config);
       
        if($this->upload->do_upload('foto')){
 
        $finfo = $this->upload->data();
        $nama_foto = $finfo['file_name'];
 
        $data_pengguna = array(
                            'id_pengguna'=>$id_pengguna,
                            'nama'=>$data['nama'],
                            'email'=>$data['email'],
                            'password'=>$password,
                            'level'=>$level,
							'alamat'=>$data['alamat'],
							'tlp'=>$data['tlp'],
							'foto'=>$nama_foto
							);
 
        $config2 = array(
                'source_image'=>'/adminBSB/images/'.$nama_foto,
                'image_library'=>'gd2',
                'new_image'=>'/adminBSB/images/',
                'maintain_ratio'=>true,
                'width'=>150,
                'height'=>200
            );
       
        $this->load->library('image_lib',$config2);
        $this->image_lib->resize();    
       
        }else{
        
        $data_pengguna = array(
                            'id_pengguna'=>$id_pengguna,
                            'nama'=>$data['nama'],
                            'email'=>$data['email'],
                            'password'=>$password,
                            'level'=>$level,
							'alamat'=>$data['alamat'],
							'tlp'=>$data['tlp']
							);
 
        }
       
        $this->load->model('m_pengguna');
	
		$this->m_pengguna->getupdate($id_pengguna,$data_pengguna);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pengguna berhasil diubah</div>');		
		
		redirect('pengguna/profil/'.$id_pengguna);
		}
		
		public function editpassword()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		
        $id_pengguna			= $this->input->post('id_pengguna'); 
		$password_lama			= md5($this->input->post('password'));			
		$password_baru			= md5($this->input->post('password_baru'));			
		$konfirmasi_password	= md5($this->input->post('konfirmasi_password'));			
        $nama					= $this->input->post('nama'); 
		$email					= $this->input->post('email');
		$level  				= $this->input->post('level');
		$alamat		 			= $this->input->post('alamat');
		$tlp		 			= $this->input->post('tlp');
		$foto 					= $this->input->post('foto');
		
		$cek = $this->db->query("Select * from tbl_pengguna where id_pengguna='$id_pengguna'
		AND password='$password_lama'");
       
         if($cek->num_rows()>0){
		 
		  if($password_baru==$konfirmasi_password){
			 $data_pengguna = array(
                            'id_pengguna'=>$id_pengguna,
                            'nama'=>$nama,
                            'email'=>$email,
                            'password'=>$konfirmasi_password,
                            'level'=>$level,
							'alamat'=>$alamat,
							'tlp'=>$tlp,
							'foto'=>$foto
							);
		
			$this->load->model('m_pengguna');
			$this->m_pengguna->getupdate($id_pengguna,$data_pengguna);
			$this->session->set_flashdata('info','<div class="alert alert-success">Password berhasil diubah</div>');		
			  }
			  if($password_baru!==$konfirmasi_password){
				$this->session->set_flashdata('info','<div class="alert alert-danger">Konfirmasi ulang password Anda</div>');		

			  }} else {
				$this->session->set_flashdata('info','<div class="alert alert-danger">Password yang Anda masukkan salah</div>');		
				  
			  }
			redirect('pengguna/profil/'.$id_pengguna);
		   
			}
        
		public function daftar()
    {
		
		$data['id_pengguna']    	= $this->input->post('id_pengguna');
		$data['nama'] 				= $this->input->post('nama');
		$data['email']    			= $this->input->post('email');
		$data['password']    		= md5($this->input->post('password'));
		$data['level']    			= $this->input->post('level');
		$data['alamat']    			= $this->input->post('alamat');
		$data['tlp']    			= $this->input->post('tlp');
		
		

			$this->load->model('m_pengguna');
			$this->m_pengguna->getinsert($data);
			$this->session->set_flashdata('info','<div class="alert alert-success" role="alert"><span class="text-white">Data pengguna berhasil ditambahkan</span></div>');
			echo 'OK';
	}
	
	public function detailtimeline()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/detail_timeline';
		
		$last_segment = $this->uri->total_segments();
		$id_timeline = $this->uri->segment($last_segment);
		$this->db->where('id_timeline',$id_timeline);
		$query =$this->db->get('tbl_timeline');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_timeline']	 		=$row->id_timeline;
				$isi['id_pengguna'] 		=$row->id_pengguna;
				$isi['foto_timeline'] 		=$row->foto_timeline;
				$isi['deskripsi_timeline'] 	=$row->deskripsi_timeline;
				$isi['tanggal_timeline']	=$row->tanggal_timeline;
				$isi['waktu_timeline'] 		=$row->waktu_timeline;
			}
		}
		else
		{
				$isi['id_timeline']	='';
				$isi['id_pengguna']='';
				$isi['foto_timeline']='';
				$isi['deskripsi_timeline']='';
				$isi['tanggal_timeline']='';
				$isi['waktu_timeline']='';

		}
		$this->load->view('pengguna/detail_timeline',$isi);
		}
		
		public function ubahtimeline()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/ubah_timeline';
		
		$last_segment = $this->uri->total_segments();
		$id_timeline = $this->uri->segment($last_segment);
		$this->db->where('id_timeline',$id_timeline);
		$query =$this->db->get('tbl_timeline');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_timeline']	 		=$row->id_timeline;
				$isi['id_pengguna'] 		=$row->id_pengguna;
				$isi['foto_timeline'] 		=$row->foto_timeline;
				$isi['deskripsi_timeline'] 	=$row->deskripsi_timeline;
				$isi['tanggal_timeline']	=$row->tanggal_timeline;
				$isi['waktu_timeline'] 		=$row->waktu_timeline;
			}
		}
		else
		{
				$isi['id_timeline']	='';
				$isi['id_pengguna']='';
				$isi['foto_timeline']='';
				$isi['deskripsi_timeline']='';
				$isi['tanggal_timeline']='';
				$isi['waktu_timeline']='';

		}
		$this->load->view('pengguna/ubah_timeline',$isi);
		}
		
		public function edittimeline()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		 $config = array(
                        'upload_path'=>'./adminBSB/images',
                        'allowed_types'=>'jpg|png|jpeg',
                        'max_size'=>2086
                        );
 
        $id_timeline			= $this->input->post('id_timeline'); 
		$id_pengguna		    = $this->input->post('id_pengguna');
		$foto_timeline	 		= $this->input->post('foto_timeline'); 
		$deskripsi_timeline 	= $this->input->post('deskripsi_timeline');
		$tanggal_timeline		= $this->input->post('tanggal_timeline');
		$waktu_timeline			= $this->input->post('waktu_timeline');
        
		$foto_timeline = $this->db->get_where('tbl_timeline',$id_timeline);
   
    if($foto_timeline->num_rows()>0){
      $pros=$foto_timeline->row();
      $name=$pros->gambar;
     
      if(file_exists($lok=FCPATH.'/adminBSB/images/'.$name)){
        unlink($lok);
      }
      if(file_exists($lok=FCPATH.'/adminBSB/images/'.$name)){
        unlink($lok);
      }}
 
        $this->load->library('upload',$config);
       
        if($this->upload->do_upload('foto_timeline')){
 
        $finfo = $this->upload->data();
        $nama_foto = $finfo['file_name'];
 
        $data_timeline = array(
                            'id_timeline'=>$id_timeline,
                            'id_pengguna'=>$id_pengguna,
                            'foto_timeline'=>$nama_foto,
                            'deskripsi_timeline'=>$deskripsi_timeline,
                            'tanggal_timeline'=>$tanggal_timeline,
                            'waktu_timeline'=>$waktu_timeline
							);
 
        $config2 = array(
                'source_image'=>'/adminBSB/images/'.$nama_foto,
                'image_library'=>'gd2',
                'new_image'=>'/adminBSB/images/',
                'maintain_ratio'=>true,
                'width'=>150,
                'height'=>200
            );
       
        $this->load->library('image_lib',$config2);
        $this->image_lib->resize();    
       
        }else{
        
        $data_timeline = array(
                             'id_timeline'=>$id_timeline,
                            'id_pengguna'=>$id_pengguna,
                            'deskripsi_timeline'=>$deskripsi_timeline,
                            'tanggal_timeline'=>$tanggal_timeline,
                            'waktu_timeline'=>$waktu_timeline,
							);
 
        }
       
        $this->load->model('m_timeline');
	
		$this->m_timeline->getupdate($id_timeline,$data_timeline);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data timeline berhasil diubah</div>');		
		
		redirect('pengguna/timeline/');
		}
		
		public function hapustimeline($id_timeline)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_timeline');
		$this->m_timeline->getdelete($id_timeline);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data timeline berhasil dihapus</div>');		
		redirect(site_url('pengguna/timeline'));
	
		}
		
		public function tambahtimeline()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_timeline');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/form_timeline';
		$isi['data'] 		= $this->m_timeline->timeline();
		$this->load->view('pengguna/form_timeline',$isi);
		}
		
		public function simpantimeline()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		 $config = array(
                        'upload_path'=>'./adminBSB/images',
                        'allowed_types'=>'jpg|png|jpeg',
                        'max_size'=>2086
                        );
 
        $id_timeline		= $this->input->post('id_timeline'); 
		$id_pengguna		= $_SESSION['id_pengguna'];
		$foto_timeline	 	= $this->input->post('foto_timeline'); 
		$deskripsi_timeline = $this->input->post('deskripsi_timeline');
		$tanggal_timeline	= $this->input->post('tanggal_timeline');
		$waktu_timeline		= $this->input->post('waktu_timeline');
		
 
        $this->load->library('upload',$config);
       
        if($this->upload->do_upload('foto_timeline')){
 
        $finfo = $this->upload->data();
        $nama_foto = $finfo['file_name'];
 
        $data_timeline = array(
                            'id_timeline'=>$id_timeline,
                            'id_pengguna'=>$id_pengguna,
                            'foto_timeline'=>$nama_foto,
                            'deskripsi_timeline'=>$deskripsi_timeline,
                            'tanggal_timeline'=>$tanggal_timeline,
                            'waktu_timeline'=>$waktu_timeline
							);
 
        $config2 = array(
                'source_image'=>'/adminBSB/images/'.$nama_foto,
                'image_library'=>'gd2',
                'new_image'=>'/adminBSB/images/',
                'maintain_ratio'=>true,
                'width'=>150,
                'height'=>200
            );
       
        $this->load->library('image_lib',$config2);
        $this->image_lib->resize();    
       
        }
       
		$this->load->model('m_timeline');
		$this->m_timeline->getinsert($data_timeline);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data timeline berhasil ditambahkan</div>');		
		redirect(site_url('pengguna/timeline'));
		}
		
	public function detailevent()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/detail_event';
		
		$last_segment = $this->uri->total_segments();
		$id_event = $this->uri->segment($last_segment);
		$this->db->where('id_event',$id_event);
		$query =$this->db->get('tbl_event');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_event']	 		=$row->id_event;
				$isi['id_pengguna'] 		=$row->id_pengguna;
				$isi['judul_event'] 		=$row->judul_event;
				$isi['keterangan_event'] 	=$row->keterangan_event;
				$isi['hari_event']		 	=$row->hari_event;
				$isi['tanggal_event'] 		=$row->tanggal_event;
				$isi['waktu_event'] 		=$row->waktu_event;
				$isi['tempat_event'] 		=$row->tempat_event;
				$isi['longitude_event']		=$row->longitude_event;
				$isi['latitude_event'] 		=$row->latitude_event;
				$isi['status_event']		=$row->status_event;
				$isi['poster'] 				=$row->poster;
				$isi['tgl_event'] 			=$row->tgl_event;
				$isi['jam_event'] 			=$row->jam_event;
			
			}
		}
		else
		{
				$isi['id_event']	='';
				$isi['id_pengguna']='';
				$isi['judul_event']='';
				$isi['keterangan_event']='';
				$isi['hari_event']='';
				$isi['tanggal_event']='';
				$isi['waktu_event']='';
				$isi['tempat_event']='';
				$isi['longitude_event']='';
				$isi['latitude_event']='';
				$isi['status_event']='';
				$isi['poster']='';
				$isi['tgl_event']='';
				$isi['jam_event']='';

		}
		$this->load->view('pengguna/detail_event',$isi);
		}
		
		public function adopsipohon()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/tambah_adopsi';
		
		$last_segment = $this->uri->total_segments();
		$id_event = $this->uri->segment($last_segment);
		$this->db->where('id_event',$id_event);
		$query =$this->db->get('tbl_event');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_event']	 		=$row->id_event;
				$isi['id_pengguna'] 		=$row->id_pengguna;
				$isi['judul_event'] 		=$row->judul_event;
				$isi['keterangan_event'] 	=$row->keterangan_event;
				$isi['hari_event']		 	=$row->hari_event;
				$isi['tanggal_event'] 		=$row->tanggal_event;
				$isi['waktu_event'] 		=$row->waktu_event;
				$isi['tempat_event'] 		=$row->tempat_event;
				$isi['status_event']		=$row->status_event;
				$isi['poster'] 				=$row->poster;
			
			}
		}
		else
		{
				$isi['id_event']	='';
				$isi['id_pengguna']='';
				$isi['judul_event']='';
				$isi['keterangan_event']='';
				$isi['hari_event']='';
				$isi['tanggal_event']='';
				$isi['waktu_event']='';
				$isi['tempat_event']='';
				$isi['status_event']='';
				$isi['poster']='';

		}
		$this->load->view('pengguna/template',$isi);
		}
		
		public function simpanadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_adopsi']			= $this->input->post('id_adopsi');
		$data['id_event']			= $this->input->post('id_event');
		$data['id_pengguna']		= $_SESSION['id_pengguna'];
		$data['jenis_adopsi']		= $this->input->post('jenis_adopsi');
		$data['id_posko']			= $this->input->post('id_posko');
		$data['id_jenis_pohon']		= $this->input->post('id_jenis_pohon');
		$data['nama_pohon']			= $this->input->post('nama_pohon');
		$data['jumlah_pohon']		= $this->input->post('jumlah_pohon');
		$data['tgl_adopsi']			= $this->input->post('tgl_adopsi');
		$data['waktu_adopsi']		= $this->input->post('waktu_adopsi');
		$data['status_adopsi']		= $this->input->post('status_adopsi');
		$data['keterangan']			= $this->input->post('keterangan');

		$this->load->model('m_adopsi');
		$this->m_adopsi->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data adopsi berhasil ditambahkan</div>');		
		redirect(site_url('pengguna/adopsipohon'));
		}
		
		public function timeline()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_timeline');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/timeline';
		$isi['data'] 		= $this->m_timeline->timeline();
		$this->load->view('pengguna/template',$isi);
		}
		
		public function adopsi()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_adopsi');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/adopsi';
		$isi['data'] 		= $this->m_adopsi->adopsi();
		$this->load->view('pengguna/template',$isi);
		}
		
		public function hapusadopsi($id_adopsi)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_adopsi');
		$this->m_adopsi->getdelete($id_adopsi);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data adopsi berhasil dihapus</div>');		
		redirect(site_url('pengguna/adopsi'));
		}
		
		public function detailadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/detail_adopsi';
		
		$last_segment = $this->uri->total_segments();
		$id_adopsi = $this->uri->segment($last_segment);
		$this->db->where('id_adopsi',$id_adopsi);
		$query =$this->db->get('tbl_adopsi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_adopsi']	 	=$row->id_adopsi;
				$isi['id_event'] 		=$row->id_event;
				$isi['id_pengguna'] 	=$row->id_pengguna;
				$isi['jenis_adopsi'] 	=$row->jenis_adopsi;
				$isi['id_posko']		=$row->id_posko;
				$isi['id_jenis_pohon'] 	=$row->id_jenis_pohon;
				$isi['nama_pohon'] 		=$row->nama_pohon;
				$isi['jumlah_pohon'] 	=$row->jumlah_pohon;
				$isi['tgl_adopsi'] 		=$row->tgl_adopsi;
				$isi['waktu_adopsi'] 	=$row->waktu_adopsi;
				$isi['status_adopsi'] 	=$row->status_adopsi;
				$isi['keterangan'] 		=$row->keterangan;
			}
		}
		else
		{
				
				$isi['id_adopsi']	 	='';
				$isi['id_event'] 		='';
				$isi['id_pengguna'] 	='';
				$isi['jenis_adopsi'] 	='';
				$isi['id_posko'] 		='';
				$isi['id_jenis_pohon'] 	='';
				$isi['nama_pohon'] 		='';
				$isi['jumlah_pohon'] 	='';
				$isi['tgl_adopsi'] 		='';
				$isi['waktu_adopsi'] 	='';
				$isi['status_adopsi'] 	='';
				$isi['keterangan'] 		='';

		}
		$this->load->view('pengguna/detail_adopsi', $isi);
		}
		
		public function ambiladopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/ubah_adopsi';
		
		$last_segment 	= $this->uri->total_segments();
		$id_adopsi		= $this->uri->segment($last_segment);
		$this->db->where('id_adopsi',$id_adopsi);
		$query =$this->db->get('tbl_adopsi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_adopsi']	 	=$row->id_adopsi;
				$isi['id_event'] 		=$row->id_event;
				$isi['id_pengguna'] 	=$row->id_pengguna;
				$isi['jenis_adopsi'] 	=$row->jenis_adopsi;
				$isi['id_posko'] 		=$row->id_posko;
				$isi['id_jenis_pohon'] 	=$row->id_jenis_pohon;
				$isi['nama_pohon'] 		=$row->nama_pohon;
				$isi['jumlah_pohon'] 	=$row->jumlah_pohon;
				$isi['tgl_adopsi'] 		=$row->tgl_adopsi;
				$isi['waktu_adopsi'] 	=$row->waktu_adopsi;
				$isi['status_adopsi'] 	=$row->status_adopsi;
				$isi['keterangan'] 		=$row->keterangan;
			}
		}
		else
		{
				$isi['id_adopsi']	 	='';
				$isi['id_event'] 		='';
				$isi['id_pengguna'] 	='';
				$isi['jenis_adopsi'] 	='';
				$isi['id_posko'] 		='';
				$isi['id_jenis_pohon'] 	='';
				$isi['nama_pohon'] 		='';
				$isi['jumlah_pohon'] 	='';
				$isi['tgl_adopsi'] 		='';
				$isi['waktu_adopsi'] 	='';
				$isi['status_adopsi'] 	='';
				$isi['keterangan'] 		='';
		}
		$this->load->view('pengguna/ubah_adopsi',$isi);
		}
		
		public function editadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_adopsi			= $this->input->post('id_adopsi'); 
		$id_event			= $this->input->post('id_event'); 
		$id_pengguna		= $this->input->post('id_pengguna'); 
		$jenis_adopsi		= $this->input->post('jenis_adopsi'); 
		$id_posko			= $this->input->post('id_posko'); 
		$id_jenis_pohon		= $this->input->post('id_jenis_pohon'); 
		$nama_pohon			= $this->input->post('nama_pohon'); 
		$jumlah_pohon		= $this->input->post('jumlah_pohon'); 
		$tgl_adopsi			= $this->input->post('tgl_adopsi'); 
		$waktu_adopsi		= $this->input->post('waktu_adopsi'); 
		$status_adopsi		= $this->input->post('status_adopsi'); 
		$keterangan			= $this->input->post('keterangan'); 
		
		$cek = $this->db->query("Select * from tbl_adopsi, tbl_pohon where tbl_pohon.id_posko='$id_posko'
		AND tbl_pohon.id_jenis_pohon='$id_jenis_pohon' AND tbl_adopsi.id_adopsi='$id_adopsi'");

		if($cek->num_rows()>0){
			
			 if($status_adopsi=='Disetujui'){
				$data_pohon=$cek->row_array();
				$total_pohon= (int) $data_pohon['jumlah']-(int) $jumlah_pohon;
				
				$data		 	= array(
								'jumlah'=>$total_pohon
							);
		
				$adopsi 	= array(
                            'id_adopsi'=>$id_adopsi,
                            'id_event'=>$id_event,
                            'id_pengguna'=>$id_pengguna,
                            'jenis_adopsi'=>$jenis_adopsi,
                            'id_posko'=>$id_posko,
							'id_jenis_pohon'=>$id_jenis_pohon,
							'nama_pohon'=>$nama_pohon,
							'jumlah_pohon'=>$jumlah_pohon,
							'tgl_adopsi'=>$tgl_adopsi,
							'waktu_adopsi'=>$waktu_adopsi,
							'status_adopsi'=>$status_adopsi,
							'keterangan'=>$keterangan
							);
			$this->load->model('m_pohon');
			$this->m_pohon->getupdate($data_pohon['id_pohon'],$data);
			$this->load->model('m_adopsi');		
			$this->m_adopsi->getupdate($id_adopsi,$adopsi);
			
			$this->session->set_flashdata('info','<div class="alert alert-success">Data adopsi disetujui</div>');		
			  }
			  else {
			
				$adopsi 	= array(
                            'id_adopsi'=>$id_adopsi,
                            'id_event'=>$id_event,
                            'id_pengguna'=>$id_pengguna,
                            'jenis_adopsi'=>$jenis_adopsi,
                            'id_posko'=>$id_posko,
							'id_jenis_pohon'=>$id_jenis_pohon,
							'nama_pohon'=>$nama_pohon,
							'jumlah_pohon'=>$jumlah_pohon,
							'tgl_adopsi'=>$tgl_adopsi,
							'waktu_adopsi'=>$waktu_adopsi,
							'status_adopsi'=>$status_adopsi,
							'keterangan'=>$keterangan
							);
			$this->load->model('m_adopsi');		
			$this->m_adopsi->getupdate($id_adopsi,$adopsi);
			$this->session->set_flashdata('info','<div class="alert alert-success">Data adopsi berhasil diubah</div>');		
			
			  }
		}
			  redirect('pengguna/adopsi');
		}
		
		public function sertifikatadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/sertifikat_adopsi';
		
		$last_segment = $this->uri->total_segments();
		$id_adopsi = $this->uri->segment($last_segment);
		$this->db->where('id_adopsi',$id_adopsi);
		$query =$this->db->get('tbl_adopsi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_adopsi']	 	=$row->id_adopsi;
				$isi['id_event'] 		=$row->id_event;
				$isi['id_pengguna'] 	=$row->id_pengguna;
				$isi['jenis_adopsi'] 	=$row->jenis_adopsi;
				$isi['id_posko']		=$row->id_posko;
				$isi['id_jenis_pohon'] 	=$row->id_jenis_pohon;
				$isi['nama_pohon'] 		=$row->nama_pohon;
				$isi['jumlah_pohon'] 	=$row->jumlah_pohon;
				$isi['tgl_adopsi'] 		=$row->tgl_adopsi;
				$isi['waktu_adopsi'] 	=$row->waktu_adopsi;
				$isi['status_adopsi'] 	=$row->status_adopsi;
				$isi['keterangan'] 		=$row->keterangan;
			}
		}
		else
		{
				
				$isi['id_adopsi']	 	='';
				$isi['id_event'] 		='';
				$isi['id_pengguna'] 	='';
				$isi['jenis_adopsi'] 	='';
				$isi['id_posko'] 		='';
				$isi['id_jenis_pohon'] 	='';
				$isi['nama_pohon'] 		='';
				$isi['jumlah_pohon'] 	='';
				$isi['tgl_adopsi'] 		='';
				$isi['waktu_adopsi'] 	='';
				$isi['status_adopsi'] 	='';
				$isi['keterangan'] 		='';

		}
		$this->load->view('pengguna/sertifikat_adopsi',$isi);
		}
		
		public function download_sertifikat()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/sertifikat_adopsi';
		
		$last_segment = $this->uri->total_segments();
		$id_adopsi = $this->uri->segment($last_segment);
		$this->db->where('id_adopsi',$id_adopsi);
		$this->load->helper('download_helper');
		$query =$this->db->get('tbl_adopsi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_adopsi']	 	=$row->id_adopsi;
				$isi['id_event'] 		=$row->id_event;
				$isi['id_pengguna'] 	=$row->id_pengguna;
				$isi['jenis_adopsi'] 	=$row->jenis_adopsi;
				$isi['id_posko']		=$row->id_posko;
				$isi['id_jenis_pohon'] 	=$row->id_jenis_pohon;
				$isi['nama_pohon'] 		=$row->nama_pohon;
				$isi['jumlah_pohon'] 	=$row->jumlah_pohon;
				$isi['tgl_adopsi'] 		=$row->tgl_adopsi;
				$isi['waktu_adopsi'] 	=$row->waktu_adopsi;
				$isi['status_adopsi'] 	=$row->status_adopsi;
				$isi['keterangan'] 		=$row->keterangan;
			}
		}
		else
		{
				
				$isi['id_adopsi']	 	='';
				$isi['id_event'] 		='';
				$isi['id_pengguna'] 	='';
				$isi['jenis_adopsi'] 	='';
				$isi['id_posko'] 		='';
				$isi['id_jenis_pohon'] 	='';
				$isi['nama_pohon'] 		='';
				$isi['jumlah_pohon'] 	='';
				$isi['tgl_adopsi'] 		='';
				$isi['waktu_adopsi'] 	='';
				$isi['status_adopsi'] 	='';
				$isi['keterangan'] 		='';

		}
		$halaman = $this->load->view('pengguna/sertifikatadopsi', $isi, TRUE);		
		//echo $halaman;
		//exit();
		export_pdf($halaman,'sertifikat_adopsi');
		}
		
		public function donasi()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_pohon');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/donasi';
		$isi['data'] 		= $this->m_pohon->pohon();
		$this->load->view('pengguna/template',$isi);
		}
		
		public function tambahdonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/form_donasi';
		
		$last_segment = $this->uri->total_segments();
		$id_pohon = $this->uri->segment($last_segment);
		$this->db->where('id_pohon',$id_pohon);
		$query =$this->db->get('tbl_pohon');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_pohon']	 =$row->id_pohon;
				$isi['id_posko'] =$row->id_posko;
				$isi['id_jenis_pohon'] =$row->id_jenis_pohon;
				$isi['jumlah'] =$row->jumlah;
			
			}
		}
		else
		{
				$isi['id_pohon']	='';
				$isi['id_posko']='';
				$isi['id_jenis_pohon']='';
				$isi['jumlah']='';

		}
		$this->load->view('pengguna/form_donasi',$isi);
		}
		
		public function simpandonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_donasi']			= $this->input->post('id_donasi');
		$data['id_pengguna']		= $_SESSION['id_pengguna'];
		$data['id_posko']			= $this->input->post('id_posko');
		$data['id_jenis_pohon']		= $this->input->post('id_jenis_pohon');
		$data['jumlah_pohon']		= $this->input->post('jumlah_pohon');
		$data['tgl_donasi']			= $this->input->post('tgl_donasi');
		$data['waktu_donasi']		= $this->input->post('waktu_donasi');
		$data['status_donasi']		= $this->input->post('status_donasi');
		$data['keterangan']			= $this->input->post('keterangan');

		$this->load->model('m_donasi');
		$this->m_donasi->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data donasi berhasil ditambahkan</div>');		
		redirect(site_url('pengguna/donasi'));
		}
		
		public function manajemen_donasi()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_donasi');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/manajemen_donasi';
		$isi['data'] 		= $this->m_donasi->donasi();
		$this->load->view('pengguna/template',$isi);
		}
		
		public function detaildonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/detail_donasi';
		
		$last_segment = $this->uri->total_segments();
		$id_donasi = $this->uri->segment($last_segment);
		$this->db->where('id_donasi',$id_donasi);
		$query =$this->db->get('tbl_donasi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_donasi']	 		=$row->id_donasi;
				$isi['id_pengguna'] 		=$row->id_pengguna;
				$isi['id_posko'] 			=$row->id_posko;
				$isi['id_jenis_pohon'] 		=$row->id_jenis_pohon;
				$isi['jumlah_pohon']		=$row->jumlah_pohon;
				$isi['tgl_donasi'] 			=$row->tgl_donasi;
				$isi['waktu_donasi'] 		=$row->waktu_donasi;
				$isi['status_donasi'] 		=$row->status_donasi;
				$isi['keterangan'] 			=$row->keterangan;
			}
		}
		else
		{
				$isi['id_donasi']	='';
				$isi['id_pengguna']='';
				$isi['id_posko']='';
				$isi['id_jenis_pohon']='';
				$isi['jumlah_pohon']='';
				$isi['tgl_donasi']='';
				$isi['waktu_donasi']='';
				$isi['status_donasi']='';
				$isi['keterangan']='';

		}
		$this->load->view('pengguna/detail_donasi',$isi);
		}
		
		public function ambildonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'pengguna/ubah_donasi';
		
		$last_segment 	= $this->uri->total_segments();
		$id_donasi		= $this->uri->segment($last_segment);
		$this->db->where('id_donasi',$id_donasi);
		$query =$this->db->get('tbl_donasi');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_donasi']	 	=$row->id_donasi;
				$isi['id_pengguna'] 	=$row->id_pengguna;
				$isi['id_posko'] 		=$row->id_posko;
				$isi['id_jenis_pohon'] 	=$row->id_jenis_pohon;
				$isi['jumlah_pohon'] 	=$row->jumlah_pohon;
				$isi['tgl_donasi'] 		=$row->tgl_donasi;
				$isi['waktu_donasi'] 	=$row->waktu_donasi;
				$isi['status_donasi'] 	=$row->status_donasi;
				$isi['keterangan'] 		=$row->keterangan;
			}
		}
		else
		{
				$isi['id_donasi']	='';
				$isi['id_pengguna']='';
				$isi['id_posko']='';
				$isi['id_jenis_pohon']='';
				$isi['jumlah_pohon']='';
				$isi['tgl_donasi']='';
				$isi['waktu_donasi']='';
				$isi['status_donasi']='';
				$isi['keterangan']='';
		}
		$this->load->view('pengguna/ubah_donasi',$isi);
		}
		
		public function editdonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_donasi					= $this->input->post('id_donasi'); 
		$id_pengguna				= $this->input->post('id_pengguna'); 
		$id_posko					= $this->input->post('id_posko'); 
		$id_jenis_pohon				= $this->input->post('id_jenis_pohon'); 
		$jumlah_pohon				= $this->input->post('jumlah_pohon'); 
		$tgl_donasi					= $this->input->post('tgl_donasi'); 
		$waktu_donasi				= $this->input->post('waktu_donasi'); 
		$status_donasi				= $this->input->post('status_donasi'); 
		$keterangan					= $this->input->post('keterangan'); 
		
		$cek = $this->db->query("Select * from tbl_pohon, tbl_donasi where tbl_pohon.id_posko='$id_posko'
		AND tbl_pohon.id_jenis_pohon='$id_jenis_pohon' AND tbl_donasi.id_donasi='$id_donasi'");

		if($cek->num_rows()>0){
			
			 if($status=='Disetujui'){
				$data_pohon=$cek->row_array();
				$total_pohon= (int) $jumlah_pohon+(int) $data_pohon['jumlah'];
				
				$data		 	= array(
								'jumlah'=>$total_pohon
							);
		
				$donasi 	= array(
                            'id_donasi'=>$id_donasi,
                            'id_pengguna'=>$id_pengguna,
                            'id_posko'=>$id_posko,
                            'id_jenis_pohon'=>$id_jenis_pohon,
                            'jumlah_pohon'=>$jumlah_pohon,
							'tgl_donasi'=>$tgl_donasi,
							'waktu_donasi'=>$waktu_donasi,
							'status_donasi'=>$status_donasi,
							'keterangan'=>$keterangan
							);
			$this->load->model('m_pohon');
			$this->m_pohon->getupdate($data_pohon['id_pohon'],$data);
			$this->load->model('m_donasi');		
			$this->m_donasi->getupdate($id_donasi,$donasi);
			
			$this->session->set_flashdata('info','<div class="alert alert-success">Data donasi disetujui</div>');		
			  }
			  else {
			
				$donasi 	= array(
                            'id_donasi'=>$id_donasi,
                            'id_pengguna'=>$id_pengguna,
                            'id_posko'=>$id_posko,
                            'id_jenis_pohon'=>$id_jenis_pohon,
                            'jumlah_pohon'=>$jumlah_pohon,
							'tgl_donasi'=>$tgl_donasi,
							'waktu_donasi'=>$waktu_donasi,
							'status_donasi'=>$status_donasi,
							'keterangan'=>$keterangan
							);
			$this->load->model('m_donasi');		
			$this->m_donasi->getupdate($id_donasi,$donasi);				  
			$this->session->set_flashdata('info','<div class="alert alert-success">Data donasi berhasil diubah</div>');		
			  }
		}
			  redirect('pengguna/manajemen_donasi');
		}
		
		public function hapusdonasi($id_donasi)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_donasi');
		$this->m_donasi->getdelete($id_donasi);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data donasi berhasil dihapus</div>');		
		redirect(site_url('pengguna/manajemen_donasi'));
	
		}

		public function map() {
			$this->load->model('m_squrity');
			$this->load->model('m_map');
			$isi['email'] = $this->session->userdata('email');
			$this->m_squrity->getsqurity();
			$isi['content'] 	= 'pengguna/peta-pemetaan';
			$isi['data'] 		= $this->m_map->map()->result();

			$this->load->view('pengguna/template',$isi);
		}
		
		public function listKota(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_posko = $this->input->post('id_posko');
		
		//$kota = $this->KotaModel->viewByProvinsi($id_posko);
		$jenis_pohon = $this->db->query('Select * from tbl_pohon, jenis_pohon where tbl_pohon.id_posko='.$id_posko.' AND 
		tbl_pohon.id_jenis_pohon=jenis_pohon.id_jenis_pohon');

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
	
        foreach ($jenis_pohon->result() as $row ) {
			$lists .= "<option value='".$row->id_jenis_pohon."'>".$row->nama_jenis_pohon."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
		
      public function logout() {
		$this->session->sess_destroy();
		$this->session->set_userdata('is_login', FALSE);
		redirect('/');
	} 
}
