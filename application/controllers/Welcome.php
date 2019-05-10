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
		
		

			$this->load->model('m_pengguna');
			$this->m_pengguna->getinsert($data);
			$this->session->set_flashdata('info','<div class="alert alert-success" role="alert"><span class="text-white">Data pengguna berhasil ditambahkan</span></div>');
			echo 'OK';
	}
		
        function tables(){
            $this->template->load('template','table');
        }
}
