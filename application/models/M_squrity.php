<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_squrity extends CI_model {
public function getsqurity()
{
	$email = $this->session->userdata('email');
	$level = $this->session->userdata('1');
	$level = $this->session->userdata('2');
	$level = $this->session->userdata('3');
	if(empty($email))
	{
		$this->session->sess_destroy();
		redirect('auth');
		
	}
	elseif ($level) {
		$this->session->userdata('level')=='1';
		redirect('admin');
	}
	elseif ($level) {
		$this->session->userdata('level')=='2';
		redirect('komunitas');
	}
	elseif ($level) {
		$this->session->userdata('level')=='3';
		redirect('pengguna');
	}

}


}
