<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmData extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('zip');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [];

		// $load_tables = ["fungsi", 'urusan', 'program', 'periode_RPJMD', 'tujuan_RPJMD', 'sasaran_RPJMD','misi','indikator_tujuan_RPJMD'];
		$load_tables = ["fungsi", 'urusan', 'program', 'periode_RPJMD', 'tujuan_RPJMD', 'sasaran_RPJMD','misi',];
		foreach ($load_tables as $table) {
			$real_name = real_table_name($table);
			$GLOBALS[$real_name] = $this->db->get($real_name)->result_array();
		}
		$data['f_expandTableCard'] = [$this, 'expandTableCard'];
		$data['f_tabel_fk_display'] = [$this, 'tabel_fk_display'];

		$this->load->view('administrator/admdata', $data);
	}

}
