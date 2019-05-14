<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Name: PHPMailer Library
* Author: PHPMailer
* Source: https://github.com/dompdf/dompdf
*/
require_once(APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php');

class PHPMailer_lib extends PHPMailer{
	public function __construct()
	{
		parent::__construct();
	}
}