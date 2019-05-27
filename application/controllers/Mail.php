<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {
	// define email sender config
	var $mail_host     = 'smtp.gmail.com';
	var $mail_port     = 587;
	var $mail_username = 'trestiarso@gmail.com';
	var $mail_password = 'yesika1994';

	var	$from          = 'trestiarso@gmail.com';
	var	$from_name     = 'Gerakan Ayo Menanam Kabupaten Blitar';

	public function __construct(){
		parent::__construct();

		// prevent from direct access when published
		// if (ENVIRONMENT == 'production') {
		// 	$this->load->config('cron_job');
		// 	$segments = $this->uri->segment_array();
		// 	$key = $this->config->item('key');
		// 	$given_key = end($segments);

		// 	if ($given_key != $key) {
		// 		show_404();
		// 	}
		// }

		$this->load->model('m_pengguna');
		
	}

	private function send($from = '', $from_name = '', $to = '', $subject = '', $message = '', $bcc_to = '', $attachment = '', $reply_to = array())
	{
		// load PHPMailer library
		$this->load->library('PHPMailer_lib');
		$phpmailer_lib = new PHPMailer(true);  // set true to enable exception

		// set configuration
		// $phpmailer_lib->isSMTP();
		$phpmailer_lib->SMTPDebug  = 1;
		$phpmailer_lib->Timeout = 60; //default 10
		$phpmailer_lib->Mailer     = 'smtp';
		$phpmailer_lib->SMTPSecure = 'tls';
		$phpmailer_lib->Debugoutput = 'html';
		$phpmailer_lib->isHTML(true);
		$phpmailer_lib->Host		= $this->mail_host;
		$phpmailer_lib->Port		= $this->mail_port;
		$phpmailer_lib->SMTPAuth	= TRUE;
		$phpmailer_lib->Username	= $this->mail_username;
		$phpmailer_lib->Password	= $this->mail_password;
		$phpmailer_lib->WordWrap	= 50;
		
		// set email metadata and content
		$phpmailer_lib->setFrom($from, $from_name);
		$phpmailer_lib->Subject = $subject;
		$phpmailer_lib->Body 	= $message;
		if (is_array($to) && !empty($to)) {
			foreach ($to as $key => $value) {
				$phpmailer_lib->addAddress($value);
			}
		}else{
			$phpmailer_lib->addAddress($to);
		}

		if (is_array($reply_to) && !empty($reply_to)) {
			if (!empty($reply_to['email']) && !empty($reply_to['name'])) {
				$phpmailer_lib->addReplyTo($reply_to['email'], $reply_to['name']);
			}
		}

		//send to bcc
		if($bcc_to != '') {
			if(is_array($bcc_to)) {
				foreach ($bcc_to as $email) {
					$phpmailer_lib->addBcc($email);
				}	
			}
			else {
				$phpmailer_lib->addBcc($bcc_to);
			}
		}

		//send attachment
		if($attachment != '') {
		    $phpmailer_lib->addAttachment($attachment);
		}

		// send email
		return $phpmailer_lib->send();
	}


	public function kirim_notifikasi_adopsi() {
		//$user_id                    = $this->input->post('id_user');
		//$registered_time            = $this->input->post('registered_time');
		//$user_email                 = $this->input->post('user_email');
		//$full_name                  = $this->input->post('full_name');
		$user_id			=$this->input->post('id_pengguna');
		$registered_time	=$this->input->post('waktu_registrasi');
		$user_email			=$this->input->post('email');
		$full_name			=$this->input->post('nama');
		$jenis_adopsi		=$this->input->post('jenis_adopsi');
		$nama_jenis_pohon	=$this->input->post('nama_jenis_pohon');
		$nama_pohon			=$this->input->post('nama_pohon');
		$jumlah_pohon		=$this->input->post('jumlah_pohon');
		$tgl_adopsi			=$this->input->post('tgl_adopsi');
		$judul_event		=$this->input->post('judul_event');
		$tanggal_event		=$this->input->post('tanggal_event');
		$tempat_event		=$this->input->post('tempat_event');

		// generate valid time duration for forgot password
		//$valid_duration             = 60;
		//$valid_until                = date("Y-m-d H:i:s", strtotime("+$valid_duration minutes"));
		// generate hash
		//$key                        = parse_time($registered_time, 'sih');
		//$hash_data                  = $user_id.'|'.$valid_until.'|'.$registered_time;
		//$hash                       = encrypt_id($hash_data, $key);
		
		// mail data
		$data['reset_password_url'] = base_url();
		$data['nama_perwakilan']    = $full_name;
		$data['valid_duration']     = $valid_duration;
		$data['jenis_adopsi']     	= $jenis_adopsi;
		$data['nama_jenis_pohon']  	= $nama_jenis_pohon;
		$data['nama_pohon']     	= $nama_pohon;
		$data['jumlah_pohon']     	= $jumlah_pohon;
		$data['tgl_adopsi']     	= $tgl_adopsi;
		$data['judul_event']     	= $judul_event;
		$data['tanggal_event']     	= $tanggal_event;
		$data['tempat_event']     	= $tempat_event;
		
		// $mail to
		$mail_to      = $user_email;
		$mail_subject = 'Notifikasi Sertifikat Adopsi';
		$mail_message = $this->load->view('admin/notifikasi-adopsi', $data, TRUE);
		//echo $mail_message; exit();

		if($mail_message) {
			try {
				$this->send($this->from, $this->from_name, $mail_to, $mail_subject, $mail_message);
			}
			// if direct sending fail then insert into db to process through cron job
			catch (phpmailerException $e) {

			}
		}
	}
}

/* End of file mailer.php */
/* Location: ./application/controllers/mailer.php */