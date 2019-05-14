<?php

$GLOBALS['CI'] =& get_instance();

if (! function_exists('world_limiter'))
{
	function word_limiter($text, $count)
	{
		$print="";
		$string_arr = explode(" ", $text);
		for ($i=0; $i < $count ; $i++) { 
			if (count($string_arr)==$i) {
				break;
			}
			$print = $print.$string_arr[$i] . " ";
		};
		return $print;
	}
}

function parse_time($timestamp, $format = "l, d F Y - H:i")
	{
		global $CI;
		$CI->lang->load(array('calendar'));
		$timestamp = date('Y-m-d H:i:s', strtotime($timestamp));

		$format = trim($format);
		$time   = strtotime($timestamp);
		$result = date($format, $time);

		$long_day_check = strrpos(' '.$format, "l");
		if($long_day_check == true) {
			$day     = date('l', $time);
			$replace = $CI->lang->line('cal_'.strtolower(date('l', $time)));
			$result  = str_replace($day, $replace, $result);
		}

		$short_day_check = strrpos(' '.$format, "D");
		if($short_day_check == true) {
			$day     = date('D', $time);
			$replace = $CI->lang->line('cal_'.strtolower(date('D', $time)));
			$result  = str_replace($day, $replace, $result);
		}

		$long_month_check = strrpos(' '.$format, "F");
		if($long_month_check == true) {
			$month   = date('F', $time);
			$replace = $CI->lang->line('cal_'.strtolower(date('F', $time)));
			$result  = str_replace($month, $replace, $result);
		}

		$short_month_check = strrpos(' '.$format, "M");
		if($short_month_check == true) {
			$month   = date('M', $time);
			$replace = $CI->lang->line('cal_'.strtolower(date('M', $time)));
			$result  = str_replace($month, $replace, $result);
		}

		return $result;
	}

	function debug($data) {
		$debug = '<pre>'.print_r($data, true).'</pre>';
		return $debug;
	}
	
	function insert_at_position($string, $insert, $position) {
  	return substr_replace($string, $insert, $position, 0);
}

 function encrypt_id($id_user, $registered_time, $salt = '(^_^)') {
	$id_hash    = base64_encode($id_user);
	$time_hash = substr(md5($registered_time.$salt), 0, 10);

	// get first number on time hash
	$filtered_number = array_filter(preg_split("/\D+/", $time_hash));
	$first_occurence = reset($filtered_number);
	$first_number    = substr($first_occurence,0 , 1);
	return insert_at_position($id_hash, $time_hash, $first_number);
}

function decrypt_id($hash, $registered_time, $salt = '(^_^)'){
	$time_hash  = substr(md5($registered_time.$salt), 0, 10);
	$id_hash    = str_replace($time_hash, '', $hash);
	$decoded_id = base64_decode($id_hash);
	// $result     = preg_replace('~[^\\pL\d]+~u', ' ', $decoded_id);
	return $decoded_id;	
}

function validate_time($time, $format = 'Y-m-d')
{
    $date = DateTime::createFromFormat($format, $time);
    return $date && $date->format($format) == $time;
}

function post_to_url($url, $data) {
    $fields = '';
    foreach ($data as $key => $value) {
        $fields .= $key . '=' . $value . '&';
    }
    rtrim($fields, '&');

    $post = curl_init();

    curl_setopt($post, CURLOPT_URL, $url);
    curl_setopt($post, CURLOPT_POST, count($data));
    curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($post);

    curl_close($post);
    return $result;
}
?>