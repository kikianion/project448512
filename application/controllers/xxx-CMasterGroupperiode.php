<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterGroupperiode extends MY_Controller
{
	protected $defaultModel = 'MMasterGroupperiode';
	protected $defaultName = 'Group Periode';
	protected $tag1 = "form_mastergroupperiode";
	public function save()
	{
		$v1 = $this->form_validation;
		$v1->set_rules('group', 'Group', 'required|max_length[50]');
		$v1->set_rules('jumlah_bulan', 'Jumlah Bulan', 'required|integer|greater_than[0]');

		$this->_savedata = array(
			'nama' => $this->input->post('group'),
			'jmlbulan' => $this->input->post('jumlah_bulan'),
		);

		parent::save();
	}
}
