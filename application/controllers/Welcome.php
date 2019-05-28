<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home','sign');
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
		$data['foto']    			= $this->input->post('foto');
		$data['status']    			= $this->input->post('status');
		
		

			$this->load->model('m_pengguna');
			$id_pengguna = $this->m_pengguna->getinsert($data);
			
			$mail_data['id_pengguna'] = $id_pengguna;
			$url	 = base_url('mails/konfirmasi-registrasi/');
			post_to_url($url, $mail_data);
			
			$this->session->set_flashdata('info','<div class="alert alert-success" role="alert"><span class="text-white">Anda berhasil mendaftarkan diri. 
			Silahkan buka email Anda untuk aktivasi akun Anda.</span></div>');
			echo 'OK';
	}
	
	public function aktivasi_akun($key, $hash) {
			$data = decrypt_id($hash, $key);
			$data = explode('|', $data);
			
			if($key == '' || $hash == '') {
				show_404();
			}

			// check is url valid
			$error = 0;
			if(count($data) != 2) {
				show_404();
			}
			
			$id_pengguna     = $data[0];
			$registered_time = $data[1];

			// check is time correct format
			if(validate_time($registered_time, 'Y-m-d H:i:s') != 1) {
				show_404();
			}

			$this->load->model('m_pengguna');
			$data_pengguna = $this->m_pengguna->get_data($id_pengguna);
			
			if($data_pengguna->num_rows()>0){
				$this->m_pengguna->getupdate($id_pengguna, array('status' => 'Terverifikasi'));
				$this->session->set_flashdata('info','<div class="alert bg-pink alert-dismissible" role="alert">Akun Anda telah berhasil di aktivasi. Silahkan <a href= '.base_url().' >login</a></div>');		
				
			} else {
				show_404();
			}
			$data['key'] = $key;
			$data['hash'] = $hash;
			$this->load->view('front/contents/form-aktivasi', $data);		}
		
        function tables(){
            $this->template->load('template','table');
        }
}
