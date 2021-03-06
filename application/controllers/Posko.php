<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posko extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$user_data = $this->session->userdata();
		$level = $user_data['level'];
		//echo debug($user_data);
		//exit();
		
		if($level != 4) {
			redirect(404);
		}

		$this->id_pengguna = $user_data['id_pengguna'];
		$this->id_posko = $user_data['id_posko'];

	}
	
	public function index()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/dashboard';
		$isi['data'] 		= $this->db->get('tbl_pengguna');
		$this->load->view('posko/template',$isi);
	}
	
	public function profil()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/profil';
		
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
		$this->load->view('posko/template',$isi);
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
		
		redirect('posko/profil/'.$id_pengguna);
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
			redirect('posko/profil/'.$id_pengguna);
		   
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
		$isi['content'] 	= 'posko/detail_timeline';
		
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
		$this->load->view('posko/detail_timeline',$isi);
		}
		
		public function ubahtimeline()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_timeline';
		
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
		$this->load->view('posko/ubah_timeline',$isi);
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
		
		redirect('posko/timeline/');
		}
		
		public function hapustimeline($id_timeline)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_timeline');
		$this->m_timeline->getdelete($id_timeline);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data timeline berhasil dihapus</div>');		
		redirect(site_url('posko/timeline'));
	
		}
		
	public function detailevent()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/detail_event';
		
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
				$isi['longitude_event'] 	=$row->longitude_event;
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
		$this->load->view('posko/detail_event',$isi);
		}
		
		public function adopsipohon()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/tambah_adopsi';
		
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
				$isi['status_event']	 	=$row->status_event;
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
		$this->load->view('posko/template',$isi);
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
		redirect(site_url('posko/adopsipohon'));
		}
		
		public function timeline()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_timeline');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/timeline';
		$isi['data'] 		= $this->m_timeline->timeline();
		$this->load->view('posko/template',$isi);
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
		redirect(site_url('posko/timeline'));
		}
		
		public function adopsi()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_adopsi');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/adopsi';
		$isi['data'] 		= $this->m_adopsi->adopsi();
		$this->load->view('posko/template',$isi);
		}
		
		public function hapusadopsi($id_adopsi)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_adopsi');
		$this->m_adopsi->getdelete($id_adopsi);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data adopsi berhasil dihapus</div>');		
		redirect(site_url('posko/adopsi'));
		}
		
		public function detailadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/detail_adopsi';
		
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
		$this->load->view('posko/detail_adopsi', $isi);
		}
		
		public function ambiladopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_adopsi';
		
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
		$this->load->view('posko/ubah_adopsi',$isi);
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
			  redirect('posko/adopsi');
		}
		
		public function sertifikatadopsi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/sertifikat_adopsi';
		
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
		$this->load->view('posko/sertifikat_adopsi',$isi);
		}
		
		public function download_sertifikat()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/sertifikat_adopsi';
		
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
		$halaman = $this->load->view('posko/sertifikatadopsi', $isi, TRUE);		
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
		$isi['content'] 	= 'posko/donasi';
		$isi['data'] 		= $this->m_pohon->pohon();
		$this->load->view('posko/template',$isi);
		}
		
		public function tambahdonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_donasi';
		
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
		$this->load->view('posko/form_donasi',$isi);
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
		redirect(site_url('posko/donasi'));
		}
		
		public function manajemen_donasi()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_donasi');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/manajemen_donasi';
		$isi['data'] 		= $this->m_donasi->donasi();
		$this->load->view('posko/template',$isi);
		}
		
		public function detaildonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/detail_donasi';
		
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
		$this->load->view('posko/detail_donasi',$isi);
		}
		
		public function ambildonasi()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_donasi';
		
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
		$this->load->view('posko/ubah_donasi',$isi);
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
			  redirect('posko/manajemen_donasi');
		}
		
		public function hapusdonasi($id_donasi)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_donasi');
		$this->m_donasi->getdelete($id_donasi);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data donasi berhasil dihapus</div>');		
		redirect(site_url('posko/manajemen_donasi'));
	
		}
		
		public function kategori()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_kategori');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/kategori';
		$isi['data'] 		= $this->m_kategori->kategori();
		$this->load->view('posko/template',$isi);
		}
		
		public function hapuskategori($id_kategori)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_kategori');
		$this->m_kategori->getdelete($id_kategori);
		$this->session->set_flashdata('info','<div class="alert alert-success">Kategori hutan berhasil dihapus</div>');		
		redirect(site_url('posko/kategori'));
	
		}
		
		public function tambahkategori()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_kategori');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_kategori';
		$isi['data'] 		= $this->m_kategori->kategori();
		$this->load->view('posko/template',$isi);
		}
		
		public function simpankategori()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_kategori']	= $this->input->post('id_kategori');
		$data['nama_kategori']	= $this->input->post('nama_kategori');

		$this->load->model('m_kategori');
		$this->m_kategori->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Kategori hutan berhasil ditambahkan</div>');		
		redirect(site_url('posko/tambahkategori'));
		}
		
		public function ambilkategori()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_kategori';
		
		$last_segment = $this->uri->total_segments();
		$id_kategori  = $this->uri->segment($last_segment);
		$this->db->where('id_kategori',$id_kategori);
		$query =$this->db->get('tbl_kategori');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_kategori']	 =$row->id_kategori;
				$isi['nama_kategori'] =$row->nama_kategori;
			}
		}
		else
		{
				$isi['id_kategori']	='';
				$isi['nama_kategori']='';
		}
		$this->load->view('posko/template',$isi);
		}
		
		public function editkategori()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_kategori				= $this->input->post('id_kategori'); 
		$data['id_kategori']    	= $this->input->post('id_kategori');
		$data['nama_kategori']		= $this->input->post('nama_kategori'); 
	
		$this->load->model('m_kategori');
	
		$this->m_kategori->getupdate($id_kategori,$data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Kategori hutan berhasil diubah</div>');		
		
		redirect('posko/ambilkategori/'.$id_kategori);
		}
		
		public function map()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_map');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/map';
		$isi['data'] 		= $this->m_map->map();
		$this->load->view('posko/template',$isi);
		}
		
		public function peta_pemetaan() {
			$this->load->model('m_squrity');
			$this->load->model('m_map');
			$isi['email'] = $this->session->userdata('email');
			$this->m_squrity->getsqurity();
			$isi['content'] 	= 'posko/peta-pemetaan';
			$isi['data'] 		= $this->m_map->map()->result();

			$this->load->view('posko/template',$isi);
		}
		
		public function tambahmap()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_map');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_map';
		$isi['data'] 		= $this->m_map->map();
		$this->load->view('posko/template',$isi);
		}
		
		public function simpanmap()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_map']			= $this->input->post('id_map');
		$data['id_kategori']	= $this->input->post('id_kategori');
		$data['latitude_map']	= $this->input->post('latitude_map');
		$data['longitude_map']	= $this->input->post('longitude_map');
		$data['alamat_map']		= $this->input->post('alamat_map');

		$this->load->model('m_map');
		$this->m_map->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Pemetaan hutan berhasil ditambahkan</div>');		
		redirect(site_url('posko/tambahmap'));
		}
		
		public function hapusmap($id_map)
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_map');
		$this->m_map->getdelete($id_map);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pemetaan hutan berhasil dihapus</div>');		
		redirect(site_url('posko/map'));
	
		}
		
		public function ambilmap()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_map';
		
		$last_segment 	= $this->uri->total_segments();
		$id_map  		= $this->uri->segment($last_segment);
		$this->db->where('id_map',$id_map);
		$query =$this->db->get('tbl_map');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_map']	 =$row->id_map;
				$isi['id_kategori'] =$row->id_kategori;
				$isi['latitude_map'] =$row->latitude_map;
				$isi['longitude_map'] =$row->longitude_map;
				$isi['alamat_map'] =$row->alamat_map;
			}
		}
		else
		{
				$isi['id_map']	='';
				$isi['id_kategori']='';
				$isi['latitude_map']='';
				$isi['longitude_map']='';
				$isi['alamat_map']='';
		}
		$this->load->view('posko/template',$isi);
		}
		
		public function editmap()
		{
			// echo debug($this->input->post()); exit();
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_map						= $this->input->post('id_map'); 
		$data['id_map']    			= $this->input->post('id_map');
		$data['id_kategori']		= $this->input->post('id_kategori'); 
		$data['latitude_map']		= $this->input->post('latitude_map'); 
		$data['longitude_map']		= $this->input->post('longitude_map'); 
		$data['alamat_map']			= $this->input->post('alamat_map'); 
	
		$this->load->model('m_map');
	
		$this->m_map->getupdate($id_map,$data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pemetaan hutan berhasil diubah</div>');		
		
		redirect('posko/ambilmap/'.$id_map);
		}
		
		public function detailmap()
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/detail_map';
		
		$last_segment = $this->uri->total_segments();
		$id_map = $this->uri->segment($last_segment);
		$this->db->where('id_map',$id_map);
		$query =$this->db->get('tbl_map');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_map']	 		=$row->id_map;
				$isi['id_kategori'] 	=$row->id_kategori;
				$isi['latitude_map'] 	=$row->latitude_map;
				$isi['longitude_map'] 	=$row->longitude_map;
				$isi['alamat_map'] 		=$row->alamat_map;
			
			}
		}
		else
		{
				$isi['id_map']	='';
				$isi['id_kategori']='';
				$isi['latitude_map']='';
				$isi['longitude_map']='';
				$isi['alamat_map']='';

		}
		$this->load->view('posko/template',$isi);
		}
		
		public function tambahtimeline()
		{
		$this->load->model('m_squrity');
		$this->load->model('m_timeline');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_timeline';
		$isi['data'] 		= $this->m_timeline->timeline();
		$this->load->view('posko/form_timeline',$isi);
		}
		
		public function jenis_pohon()
	{
		$this->load->model('m_squrity');
		$this->load->model('m_jenis');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/jenis_pohon';
		$isi['data'] 		= $this->m_jenis->jenis_pohon();
		$this->load->view('posko/template',$isi);
		}
		
		public function tambahjenis()
	{
		$this->load->model('m_squrity');
		$this->load->model('m_jenis');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_jenis';
		$isi['data'] 		= $this->m_jenis->jenis_pohon();
		$this->load->view('posko/form_jenis',$isi);
		}
		
		public function simpanjenis()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_jenis_pohon']		= $this->input->post('id_jenis_pohon');
		$data['nama_jenis_pohon']	= $this->input->post('nama_jenis_pohon');

		$this->load->model('m_jenis');
		$this->m_jenis->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data jenis pohon berhasil ditambahkan</div>');		
		redirect(site_url('posko/jenis_pohon'));
		}
		
		public function hapusjenis($id_jenis_pohon)
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_jenis');
		$this->m_jenis->getdelete($id_jenis_pohon);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data jenis pohon berhasil dihapus</div>');		
		redirect(site_url('posko/jenis_pohon'));
	
	}
	
		public function ambiljenis()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_jenis';
		
		$last_segment = $this->uri->total_segments();
		$id_jenis_pohon = $this->uri->segment($last_segment);
		$this->db->where('id_jenis_pohon',$id_jenis_pohon);
		$query =$this->db->get('jenis_pohon');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_jenis_pohon']	 =$row->id_jenis_pohon;
				$isi['nama_jenis_pohon'] =$row->nama_jenis_pohon;
			}
		}
		else
		{
				$isi['id_jenis_pohon']	='';
				$isi['nama_jenis_pohon']='';
		}
		$this->load->view('posko/ubah_jenis',$isi);
		}
		
		public function editjenis()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_jenis_pohon				= $this->input->post('id_jenis_pohon'); 
		$data['id_jenis_pohon']    	= $this->input->post('id_jenis_pohon');
		$data['nama_jenis_pohon']	= $this->input->post('nama_jenis_pohon'); 
	
		$this->load->model('m_jenis');
	
		$this->m_jenis->getupdate($id_jenis_pohon,$data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Nama jenis pohon berhasil diubah</div>');		
		
		redirect(site_url('posko/jenis_pohon'));
		}
		
		public function daftar_pohon()
	{
		$this->load->model('m_squrity');
		$this->load->model('m_pohon');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/daftar_pohon';
		$isi['data'] 		= $this->m_pohon->pohon();
		$this->load->view('posko/template',$isi);
		}
		
		public function tambahpohon()
	{
		$this->load->model('m_squrity');
		$this->load->model('m_pohon');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/form_pohon';
		$isi['data'] 		= $this->m_pohon->pohon();
		$this->load->view('posko/form_pohon',$isi);
		}
		
		public function simpanpohon()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$data['id_pohon']				= $this->input->post('id_pohon');
		$data['id_posko']				= $this->input->post('id_posko');
		$data['id_jenis_pohon']			= $this->input->post('id_jenis_pohon');
		$data['jumlah']					= $this->input->post('jumlah');

		$this->load->model('m_pohon');
		$this->m_pohon->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pohon berhasil ditambahkan</div>');		
		redirect(site_url('posko/daftar_pohon'));
		}
		
		public function ambilpohon()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_pohon';
		
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
		$this->load->view('posko/ubah_pohon',$isi);
		}
		
		public function editpohon()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_pohon						= $this->input->post('id_pohon'); 
		$data['id_pohon']	    		= $this->input->post('id_pohon');
		$data['id_posko']				= $this->input->post('id_posko'); 
		$data['id_jenis_pohon']			= $this->input->post('id_jenis_pohon'); 
		$data['jumlah']					= $this->input->post('jumlah'); 
	
		$this->load->model('m_pohon');
	
		$this->m_pohon->getupdate($id_pohon,$data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pohon berhasil diubah</div>');		
		
		redirect('posko/daftar_pohon');
		}
		
		public function hapuspohon($id_pohon)
	{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$this->load->model('m_pohon');
		$this->m_pohon->getdelete($id_pohon);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data pohon berhasil dihapus</div>');		
		redirect(site_url('posko/daftar_pohon'));
	
	}
	
	public function ambilpengguna()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_pengguna';
		
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
		$this->load->view('posko/ubah_pengguna',$isi);
		}
		
		public function editpengguna()
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
		
		redirect('posko/profil/'.$id_pengguna);
		}
		
		public function ambilposko()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/ubah_posko';
		
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
		$this->load->view('posko/ubah_posko',$isi);
		}
		
		public function editposko()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');

		$id_posko						= $this->input->post('id_posko'); 
		$data['id_posko']	    		= $this->input->post('id_posko');
		$data['nama_posko']				= $this->input->post('nama_posko'); 
		$data['alamat_posko']			= $this->input->post('alamat_posko'); 
		$data['longitude_posko']		= $this->input->post('longitude_posko'); 
		$data['latitude_posko']			= $this->input->post('latitude_posko'); 
		$id_pengguna					= $this->input->post('id_pengguna'); 
		$data['tlp_posko']				= $this->input->post('tlp_posko'); 
	
		$this->load->model('m_posko');
	
		$this->m_posko->getupdate($id_posko,$data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data posko berhasil diubah</div>');		
		
		redirect('posko/profil/'.$id_pengguna);
		}
		
		public function saveposko()
		{
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
	
		$id_pengguna					= $this->input->post('id_pengguna');
		$data['id_pengguna']			= $this->input->post('id_pengguna');
		$data['id_posko']				= $this->input->post('id_posko');
		$data['nama_posko']				= $this->input->post('nama_posko');
		$data['alamat_posko']			= $this->input->post('alamat_posko');
		$data['longitude_posko']		= $this->input->post('longitude_posko');
		$data['latitude_posko']			= $this->input->post('latitude_posko');
		$data['tlp_posko']				= $this->input->post('tlp_posko');

		$this->load->model('m_posko');
		$this->m_posko->getinsert($data);
		$this->session->set_flashdata('info','<div class="alert alert-success">Data posko berhasil ditambahkan</div>');		
		redirect('posko/profil/'.$id_pengguna);
		}
		
		public function grafikpohon() {
		$this->load->model('m_squrity');
		$this->m_squrity->getsqurity();
		$isi['email'] = $this->session->userdata('email');
		$isi['content'] 	= 'posko/grafik_pohon';
		$isi['data'] 		= $this->db->get('tbl_pengguna');
		$this->load->view('posko/template',$isi);
	}
	
	public function diagrampohon() {
		$this->load->model('m_grafik');		
		$id_posko          = $this->input->post('id_posko');
	
		$statistik            = $this->m_grafik->hasilcari($id_posko);
		$grafik_statistik     = array();
		//echo debug($statistik);
		//exit();
		foreach ($statistik as $key => $item) {
			foreach ($item as $key2 => $item2) {
				$content[$key2][] = $item2;
			}
		}
		$x     = 0;
		$color = array('#36a2eb');
		foreach ($content as $key => $val) {
			if($key == 'nama_jenis_pohon') {
				$grafik_statistik['labels'] = $val;
			}
			if($key == 'jumlah') {
				$grafik_statistik['datasets'][] = array(
					'label'           => str_replace('_', ' ', $key),
					'backgroundColor' => $color[$x],
					'borderColor'     => $color[$x],
					'lineTension'     => 0,
					'borderWidth'	  => 1.3,
					'data'            => $val,
					'fill'            => false
				);
			$x++;
			}
		}

		$data['grafik_statistik'] = $grafik_statistik;
		//echo debug($grafik_statistik);
		//exit();
		echo json_encode($data['grafik_statistik']);
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
