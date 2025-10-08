<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('log2')) {
	function log2($s)
	{
		$server_ip = '192.168.174.1';
		$server_port = 18888;
		$message = $s . "\n";
		if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {
			socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
		}
	}
}
