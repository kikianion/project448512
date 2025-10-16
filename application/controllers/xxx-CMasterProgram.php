<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/CAdmDataParent.php");

class CMasterProgram extends CAdmDataParent
{
	protected $defaultModel = 'MMasterProgram';
	protected $defaultName = 'Program';
	protected $tag1 = "form_masterprogram";

	public function save()
	{
		$this->form_validation->set_rules('namaprogram', 'Nama Program', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[20]');
		$this->form_validation->set_rules('urusan_id', 'Urusan', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$this->_savedata = array(
			'nama' => $this->input->post('namaprogram'),
			'kode' => $this->input->post('kode'),
			'urusan_id' => $this->input->post('urusan_id')
		);
		parent::save();
	}
}
