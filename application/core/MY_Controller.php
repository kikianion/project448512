<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	protected $data = array();
	protected $id = "xxx";
	protected $tag1 = "xxx";
	protected $defaultModel = 'xxx';
	protected $defaultName = 'xxx';


	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('url', 'form', 'text', 'log2','common'));
		$this->load->library(array('session'));
		if ($this->defaultModel != 'xxx') {
			$this->load->model($this->defaultModel);
		}

		// $this->data['site_title'] = 'Simela Gen2';
		$this->data['user'] = $this->session->userdata('user') ?: null;


		// Check if user is logged in and has admin privileges
		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		// Check admin role (you can modify this based on your user roles)
		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}

		if ($this->tag1 == '' || $this->tag1 == 'xxx') {
			$this->tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';
		}
		$this->id = $this->input->post('id') ?? $this->input->get('id') ?? '';

		$this->load->library('form_validation');

	}

	protected $_savedata;
	public function save()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$post_data = $this->input->post();

		if ($this->form_validation->run() === FALSE) {
			$this->flash('error', validation_errors());
			$this->session->set_flashdata($post_data);

			redirect('admsistem');
			return;
		}

		$defaultModelName = $this->defaultModel;
		if ($this->id) {
			$ok = $this->$defaultModelName->update($this->id, $this->_savedata);
			if ($ok) {
				$this->flash('success', $this->defaultName . ' updated.');
			} else {
				$this->flash('error', 'Failed to update ' . $this->defaultName . '.');
			}
		} else {
			$ok = $this->$defaultModelName->insert($this->_savedata);
			if ($ok) {
				$this->flash('success', $this->defaultName . ' created.');
			} else {
				$this->flash('error', 'Failed to create ' . $this->defaultName . '.');
			}
		}

		redirect('admsistem');
	}
	public function flash($key, $val)
	{
		$this->session->set_flashdata($key . '-' . $this->tag1, $val);
	}
	public function setStatus($id)
	{
		$defaultModelName = $this->defaultModel;
		$obj = $this->$defaultModelName->byId($id);
		if (!$obj) {
			$this->flash('error', $this->defaultName . ' not found.');
			redirect('admsistem');
			return;
		}

		$new_status = ($obj->status) === 'Aktif' ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->$defaultModelName->update($id, ['status' => $new_status]);

		if ($ok) {
			$this->flash('dlgsuccess', 'Status ' . $this->defaultName . ' berhasil diubah menjadi "' . $new_status . '".');
			log2("setStatus " . $ok);
		} else {
			$this->flash('error', 'Gagal mengubah status ' . $this->defaultName . '.');
		}

		redirect('admsistem');
	}

	public function byId($id)
	{
		$defaultModelName = $this->defaultModel;
		if (!$id) {
			$obj = ['error' => 'ID is required.'];
			$status_code = 400;  // Bad Request
		} else {
			$obj = $this->$defaultModelName->byId($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $obj
		];
		$this
			->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}


}























