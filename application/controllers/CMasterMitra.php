<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterMitra extends MY_Controller
{
	protected $defaultModel = 'MMasterMitra';
	protected $defaultName = 'Mitra';
	protected $tag1 = "form_mastermitra";
	public function save()
	{
		$this->form_validation->set_rules('namamitra', 'Nama Mitra', 'required|max_length[50]');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('kepala', 'Kepala', 'required|max_length[50]');
		$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
		$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');
		// $this->form_validation->set_rules('status', 'Status', 'max_length[50]');

		$this->_savedata = array(
			'urut' => $this->input->post('urut'),
			'namamitra' => $this->input->post('namamitra'),
			'kepala' => $this->input->post('kepala'),
			'nipkepala' => $this->input->post('nipkepala'),
			'pangkepala' => $this->input->post('pangkepala'),
			'jabatan' => $this->input->post('jabatan'),
		);

		parent::save();
	}

	// public function xxxxxxxxxxxxxxxxxxxxxxxxxedit_master_mitra($id)
	// {
	// 	$data['title'] = 'Administrasi Sistem';
	// 	$data['visi_list'] = $this->MVisi->getAll();
	// 	$data['master_users'] = $this->MMasterUser->getAll();
	// 	$data['master_mitra'] = $this->MMasterMitra->getAll();
	// 	$data['edit_master_mitra'] = $this->MMasterMitra->get($id);
	// 	if (!$data['edit_master_mitra']) {
	// 		show_404();
	// 		return;
	// 	}
	// 	$this->load->view('administrator/admsistem', $data);
	// }

	// public function xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxdelete_master_mitra($id, $tag1)
	// {
	// 	if ($this->MMasterMitra->delete($id)) {
	// 		$this->session->set_flashdata('success-' . $tag1, 'Mitra deleted.');
	// 	} else {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Failed to delete mitra.');
	// 	}
	// 	redirect('admsistem');
	// }
}
