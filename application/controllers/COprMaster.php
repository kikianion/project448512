<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COprMaster extends MY_Controller {
	public function index()
	{
		$data = [];
		$load_tables = ['opd',"tujuan_perangkat_daerah","sasaran_perangkat_daerah", 'sasaran_RPJMD', 'indikator_perangkat_daerah',"program_perangkat_daerah",];
		foreach ($load_tables as $table) {
			$real_name = real_table_name($table);
			$GLOBALS[$real_name] = $this->db->get($real_name)->result_array();
		}
		$data['f_expandTableCard'] = [$this, 'expandTableCard'];
		$data['f_tabel_fk_display'] = [$this, 'tabel_fk_display'];

		$this->load->view('operator/oprmaster',$data);
	}
}


