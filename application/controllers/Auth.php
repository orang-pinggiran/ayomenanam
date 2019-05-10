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
				redirect('admin');
			}
			if ($this->session->userdata('level')=='2'){
				redirect('komunitas');
			}
			if ($this->session->userdata('level')=='3'){
				redirect('pengguna');
			}
			elseif ($this->session->userdata('level')=='4'){
				redirect('posko');
			}
		}
		else
		{
			header('location:'.base_url().'auth');
				$this->session->set_flashdata('info','
										<font color="red">Username atau Password salah....!!</font>
										<br />
											');
		}
		
	}


}