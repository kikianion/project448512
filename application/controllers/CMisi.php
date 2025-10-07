<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMisi extends MY_Controller
{
	protected $defaultModel = 'MMisi';
	protected $defaultName = 'Misi';
	protected $tag1 = "form_mastermisi";

	public function save()
	{
		$this->form_validation->set_rules('misi', 'Misi', 'required|max_length[5000]|trim');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('visi_id', 'Visi', 'required|integer');

		$this->_savedata = array(
			'misi' => $this->input->post('misi'),
			'urut' => $this->input->post('urut') ?: 0,
			'visiinduk' => $this->input->post('visi_id')
		);

		parent::save();
	}

}
