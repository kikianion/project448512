<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MitraVerData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url']);
		$this->load->database();
	}

	public function index()
	{
		// $this->load->view('admin/oprmaster');
		$this->load->view('operator/oprmaster');
		// return $this->users();
	}

	public function users()
	{
		$data['title'] = 'Master Operator';
		$data['user'] = $this->session->userdata();
		// Assuming operator users are those with role = 'operator' in table `user`
		$this->db->where('role', 'operator');
		$data['users'] = $this->db->get('user')->result();
		$this->load->view('operator/master', $data);
	}
}


