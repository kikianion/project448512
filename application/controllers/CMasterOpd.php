<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterOpd extends MY_Controller
{
	protected $defaultModel = 'MMasterOpd';
	protected $defaultName = 'OPD';
	protected $tag1 = "form_masteropd";
	public function save()
	{

		$this->form_validation->set_rules('namaopd', 'Nama OPD', 'required|max_length[50]');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('mitra_id', 'Mitra', 'required|integer');
		$this->form_validation->set_rules('kepala', 'Kepala', 'required|max_length[50]');
		$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
		$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');

		$this->_savedata = array(
			'urut' => $this->input->post('urut'),
			'namaopd' => $this->input->post('namaopd'),
			'mitra' => $this->input->post('mitra_id'),
			'kepala' => $this->input->post('kepala'),
			'nipkepala' => $this->input->post('nipkepala'),
			'pangkepala' => $this->input->post('pangkepala'),
			'jabatan' => $this->input->post('jabatan'),
		);

		parent::save();
	}

}
