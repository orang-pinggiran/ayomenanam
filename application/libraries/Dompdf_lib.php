<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Name: DOMPDF Library
* Author: dompdf
* Source: https://github.com/dompdf/dompdf
*/
require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

class Dompdf_lib extends DOMPDF {
	function __construct()
	{
		parent::__construct();
	}
}