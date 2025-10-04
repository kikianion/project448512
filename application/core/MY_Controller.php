<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

	protected $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('url', 'form', 'text'));
		$this->load->library(array('session'));

		$this->data['site_title'] = 'Simela Gen2';
		$this->data['user'] = $this->session->userdata('user') ?: null;

		// Check if user is logged in and has admin privileges
		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		// Check admin role (you can modify this based on your user roles)
		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}

	}
}
