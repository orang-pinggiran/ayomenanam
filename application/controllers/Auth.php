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
							'foto'=>$data['foto']
							);
		

			//$url = base_url('mailer/konfirmasi-reset-kata-sandi/');
			//post_to_url($url, $data_pengguna);
			$this->session->set_flashdata('info','<div class="alert alert-success">Tautan reset kata sandi berhasil dikirim ke '.$data['email'].' <br>Silahkan cek email anda</div>');		
			redirect('auth/lupapassword');
		}
		else {
			$this->session->set_flashdata('info','<div class="alert alert-success">Email tidak ditemukan</div>');		
			redirect('auth/lupapassword');
		}
	}


}