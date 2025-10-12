<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/CAdmDataParent.php");
class Crpjmdperiode extends CAdmDataParent
{
	protected $defaultModel = 'MRpjmdperiode';
	protected $defaultName = 'RPJMD Periode';
	protected $tag1 = "rpjmdperiode";

	public function save()
	{
		$v = $this->form_validation;
		$v->set_rules('namaperiode', 'namaperiode', 'required|max_length[1000]|trim');
		$v->set_rules('tahun_awal', 'tahun_awal', 'required|integer|trim');
		$v->set_rules('tahun_akhir', 'tahun_akhir', 'required|integer|trim');

		$this->_savedata = array(
			'nama' => $this->input->post('namaperiode'),
			'awal' => $this->input->post('tahun_awal'),
			'akhir' => $this->input->post('tahun_akhir'),
		);

		parent::save();
	}

}
