<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/CAdmDataParent.php");

class CMasterUrusan extends CAdmDataParent
{
	protected $defaultModel = 'MMasterUrusan';
	protected $defaultName = 'Urusan';
	protected $tag1 = "form_masterurusan";

	public function save()
	{
		$this->form_validation->set_rules('namaurusan', 'Nama Urusan', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[4]');
		$this->form_validation->set_rules('fungsi_id', 'Fungsi', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$this->_savedata = array(
			'urusan' => $this->input->post('namaurusan'),
			'kode' => $this->input->post('kode'),
			'fungsi' => $this->input->post('fungsi_id')
		);
		parent::save();
	}
}
