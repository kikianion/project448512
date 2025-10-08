<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/CAdmDataParent.php");

class CMasterFungsi extends CAdmDataParent
{
	protected $defaultModel = 'MMasterFungsi';
	protected $defaultName = 'Fungsi';
	protected $tag1 = "form_masterfungsi";

	public function save()
	{
		$this->form_validation->set_rules('namafungsi', 'Nama Fungsi', 'required|max_length[100]');
		$this->form_validation->set_rules('urut', 'Urutan', 'integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$this->_savedata = array(
			'namafungsi' => $this->input->post('namafungsi'),
			'urut' => $this->input->post('urut')
		);

		parent::save();
	}

	// /**
	//  * Get fungsi by ID (AJAX)
	//  */
	// public function fungsiById($id)
	// {
	// 	$fungsi = $this->MMasterFungsi->get_by_id($id);

	// 	if ($fungsi) {
	// 		$response = array(
	// 			'status' => 'success',
	// 			'data' => $fungsi
	// 		);
	// 	} else {
	// 		$response = array(
	// 			'status' => 'error',
	// 			'message' => 'Data tidak ditemukan'
	// 		);
	// 	}

	// 	$this->output
	// 		->set_content_type('application/json')
	// 		->set_output(json_encode($response));
	// }

}
