<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmSistem extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}

	}

	public function index()
	{
		$load_tables = ["mitra", "opd", 'user', 'visi', 'misi', 'periode_anggaran', 'grup_periode', 'branding'];
		foreach ($load_tables as $table) {
			$real_name = real_table_name($table);
			$GLOBALS[$real_name] = $this->db->get($real_name)->result_array();
		}
		$data['f_expandTableCard'] = [$this, 'expandTableCard'];
		$data['f_tabel_fk_display'] = [$this, 'tabel_fk_display'];
		$this->load->view('administrator/admsistem', $data);
	}

}
