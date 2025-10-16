<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterPeriode extends MY_Controller
{
	protected $defaultModel = 'MMasterPeriode';
	protected $defaultName = 'Periode';
	protected $tag1 = "form_masterperiode";
	public function save()
	{
		$v1 = $this->form_validation;
		$v1->set_rules('kode', 'Kode', 'required|max_length[20]');
		$v1->set_rules('keterangan', 'Keterangan', 'required|max_length[100]');

		$this->_savedata = array(
			'kode' => $this->input->post('kode'),
			'keterangan' => $this->input->post('keterangan')
		);

		parent::save();
	}
}
