<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		if($this->is_logged()){
			
			redirect('pengguna/dashboard');
		}

		$this->load->view('home','sign');

		
		$isi['email'] = $this->session->userdata('email');
	}
	public function is_logged()
	{
		$is_login = $this->session->userdata('is_login');
	}

	public function cek_login()
	{
		$data = array('email' => $this->input->post('email') , 
					  'password' => md5($this->input->post('password'))
					  );
		$this->load->model('m_pengguna');
		$hasil = $this->m_pengguna->cek_user($data);
		if ($hasil->num_rows() == 1){
			foreach($hasil->result() as $sess)
            {
				
              $sess_data['logged_in']	= 'logged_in';
              $sess_data['id_pengguna']	= $sess->id_pengguna;
              $sess_data['nama'] = $sess->nama;
              $sess_data['email'] = $sess->email;
              $sess_data['password'] = $sess->password;
              $sess_data['level'] = $sess->level;
			  $sess_data['alamat'] = $sess->alamat;
			  $sess_data['tlp'] = $sess->tlp;
			  
			 if ($sess->level=='4'){
				$cek = $this->db->query("Select * from tbl_posko where id_pengguna=$sess->id_pengguna")->row();
				//echo debug($cek);
				//exit();
				$sess_data['id_posko'] = $cek->id_posko;
			}

			  
              $this->session->set_userdata($sess_data);
              $this->session->set_userdata('is_login', TRUE);
			  	

            }
			if ($this->session->userdata('level')=='1'){
				$redirect = 'admin'; 
			}
			if ($this->session->userdata('level')=='2'){
				$redirect = 'komunitas'; 
			}
			if ($this->session->userdata('level')=='3'){
				$redirect = 'pengguna'; 
			}
			elseif ($this->session->userdata('level')=='4'){
				$redirect = 'posko'; 
			}

			$response = array('status' => 'available', 'redirect' => $redirect);
		}
		else
		{
			$response = array('status' => 'unavailable');
		}
		echo json_encode($response);
	}
	
	public function lupapassword()
	{
		$this->load->view('forgot-password');
	}
	
	public function aksilupa() {
		$email = $this->input->post('email');
		if($email == '') {
			show_404();
			exit();
		}

		$cek = $this->db->query("Select * from tbl_pengguna where email='$email'");

		 if($cek->num_rows()>0){
			$data=$cek->row_array();
			$data_pengguna = array(
                            'id_pengguna'=>$data['id_pengguna'],
                            'nama'=>$data['nama'],
                            'email'=>$data['email'],
                            'password'=>$data['password'],
                            'level'=>$data['level'],
							'alamat'=>$data['alamat'],
							'tlp'=>$data['tlp'],
							'foto'=>$data['foto'],
							'waktu_registrasi'=>$data['waktu_registrasi']
							);
		

			$url = base_url('mailer/konfirmasi-reset-kata-sandi/');
			post_to_url($url, $data_pengguna);
			$this->session->set_flashdata('info','<div class="alert alert-success">Tautan reset kata sandi berhasil dikirim ke '.$data['email'].'. Silahkan cek email anda</div>');		
			redirect('auth/lupapassword');
		}
		else {
			$this->session->set_flashdata('info','<div class="alert alert-danger">Mohon maaf email tidak ditemukan</div>');		
			redirect('auth/lupapassword');
		}
	}
	
	public function reset_kata_sandi($key, $hash) {
			$data = decrypt_id($hash, $key);
			$data = explode('|', $data);
			if($key == '' || $hash == '') {
				show_404();
			}

			// check is url valid
			$error = 0;
			if(count($data) != 3) {
				show_404();
			}

			$user_id         = $data[0];
			$valid_until     = $data[1];
			$registered_time = $data[2];

			// check is time correct format
			if(validate_time($registered_time, 'Y-m-d H:i:s') != 1 || validate_time($valid_until, 'Y-m-d H:i:s') != 1) {
				show_404();
			}

			// check is valid time
			if (new DateTime() > new DateTime($valid_until)) {
			    show_404();
			}

			$cek = $this->db->query("Select * from tbl_pengguna where id_pengguna='$user_id'");
			if($cek->num_rows()>0){
			$data=$cek->row_array();
			$data_pengguna = array(
                            'id_pengguna'=>$data['id_pengguna'],
                            'nama'=>$data['nama'],
                            'email'=>$data['email'],
                            'password'=>$data['password'],
                            'level'=>$data['level'],
							'alamat'=>$data['alamat'],
							'tlp'=>$data['tlp'],
							'foto'=>$data['foto'],
							'waktu_registrasi'=>$data['waktu_registrasi']
							);
			} else {
				show_404();
			}

			$data['nama'] = $data['nama'];
			$data['key'] = $key;
			$data['hash'] = $hash;
			$this->session->set_userdata('id_pengguna', $user_id);
			$this->load->view('front/contents/form-reset-kata-sandi', $data);
		}
		
		public function perbaruipassword()
		{

        $id_pengguna			= $this->input->post('id_pengguna'); 
		$password_baru			= md5($this->input->post('password'));			
		$konfirmasi_password	= md5($this->input->post('konfirmasi_password'));			
        $key					= $this->input->post('key'); 
        $hash					= $this->input->post('hash'); 
		
		$cek = $this->db->query("Select * from tbl_pengguna where id_pengguna='$id_pengguna'");
       
         if($cek->num_rows()>0){
		 
		  if($password_baru==$konfirmasi_password){
			 $data_pengguna = array(
                            'id_pengguna'=>$id_pengguna,
                            'password'=>$konfirmasi_password
							);
		
			$this->load->model('m_pengguna');
			$this->m_pengguna->getupdate($id_pengguna,$data_pengguna);
			$this->session->set_flashdata('info','<div class="alert alert-success">Password berhasil direset. Silahkan <a href= '.base_url().' >login</a></div>');		
			  }
			  if($password_baru!==$konfirmasi_password){
				$this->session->set_flashdata('info','<div class="alert alert-danger">Konfirmasi ulang password Anda</div>');		

			  }} 
			redirect("auth/reset-kata-sandi/$key/$hash");
		   
			}


}