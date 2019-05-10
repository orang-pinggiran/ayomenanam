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
?>