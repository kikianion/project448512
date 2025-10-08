<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmSistem extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('User_model');
		// $this->load->model('Admin_model');
		$this->load->model('MMasterUser');
		$this->load->model('MMasterMitra');
		$this->load->model('MMasterOpd');
		$this->load->model('MBranding');
		$this->load->model('MVisi');
		$this->load->model('MMisi');
		$this->load->model('MMasterPeriode');
		$this->load->model('MMasterGroupperiode');

		// Check if user is logged in and has admin privileges
		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		// Check admin role (you can modify this based on your user roles)
		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}
	}

	public function index()
	{
		$data['master_users'] = $this->MMasterUser->getAll();
		$data['master_opd'] = $this->MMasterOpd->getAll();
		$data['master_mitra'] = $this->MMasterMitra->getAll();

		$data['visi_list'] = $this->MVisi->getAll();
		$data['misi_list'] = $this->MMisi->getAll();
		$data['periode_list'] = $this->MMasterPeriode->getAll();

		$data['grouping_periode_list'] = $this->MMasterGroupperiode->getAll();
		$data['master_branding'] = $this->MBranding->getAll();

		$this->load->view('administrator/admsistem', $data);
	}

}
