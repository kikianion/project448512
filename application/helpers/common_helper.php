<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('expandFieldAttr')) {
	function expandFieldAttr($f)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$res = htmlspecialchars(isset($flash[$f]) ? $flash[$f] : "");
		return <<<EOD
		name="$f" value="$res"
EOD;
	}
}
