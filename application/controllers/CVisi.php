<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CVisi extends MY_Controller
{
	protected $defaultModel = 'MVisi';
	protected $defaultName = 'Visi';
	protected $tag1 = "form_mastervisi";

	public function save()
	{
		$this->form_validation->set_rules('visi', 'Visi', 'required|max_length[5000]|trim');

		$this->_savedata = array(
			'visi' => $this->input->post('visi'),
		);

		parent::save();
	}

}
