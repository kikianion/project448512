<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmData extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		// $this->load->helper('flash');
		$this->load->model('MMasterFungsi');
		$this->load->model('MMasterUrusan');
		$this->load->model('MMasterProgram');
		// $this->load->library('upload');
		// $this->load->library('zip');
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();

		// Load data for all master components
		$data['master_fungsi'] = $this->MMasterFungsi->getAll();
		$data['master_urusan'] = $this->MMasterUrusan->getAll();
		// $data['master_urusan_active'] = $this->MMasterUrusan->get_active();
		$data['master_program'] = $this->MMasterProgram->getAll();

		// Load edit data if editing
		$edit_id = $this->session->flashdata('edit_master_fungsi_id');
		if ($edit_id) {
			$data['edit_master_fungsi'] = $this->MMasterFungsi->get_by_id($edit_id);
		}

		$edit_urusan_id = $this->session->flashdata('edit_master_urusan_id');
		if ($edit_urusan_id) {
			$data['edit_master_urusan'] = $this->MMasterUrusan->get_by_id($edit_urusan_id);
		}

		$this->load->view('administrator/admdata', $data);
	}

	// public function save_master_fungsi()
	// {
	// 	$this->form_validation->set_rules('namafungsi', 'Nama Fungsi', 'required|max_length[100]');
	// 	$this->form_validation->set_rules('urut', 'Urutan', 'integer');
	// 	$this->form_validation->set_rules('tag1', 'Tag', 'required');

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$tag = $this->input->post('tag1');
	// 		$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
	// 		redirect('admdata');
	// 		return;
	// 	}

	// 	$data = array(
	// 		'namafungsi' => $this->input->post('namafungsi'),
	// 		'urut' => $this->input->post('urut')
	// 	);

	// 	$id = $this->input->post('id');
	// 	$tag = $this->input->post('tag1');

	// 	if ($id) {
	// 		// Update
	// 		$result = $this->MMasterFungsi->update($id, $data);
	// 		if ($result) {
	// 			$this->session->set_flashdata('success-' . $tag, 'Data fungsi berhasil diperbarui.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data fungsi. Nama mungkin sudah ada.');
	// 		}
	// 	} else {
	// 		// Create
	// 		$result = $this->MMasterFungsi->insert($data);
	// 		if ($result) {
	// 			$this->session->set_flashdata('success-' . $tag, 'Data fungsi berhasil ditambahkan.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data fungsi. Nama mungkin sudah ada.');
	// 		}
	// 	}

	// 	redirect('admdata');
	// }

	/**
	 * Get fungsi by ID (AJAX)
	 */
	public function fungsiById($id)
	{
		$fungsi = $this->MMasterFungsi->get_by_id($id);

		if ($fungsi) {
			$response = array(
				'status' => 'success',
				'data' => $fungsi
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Data tidak ditemukan'
			);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/**
	 * Toggle fungsi status
	 */
	// public function setStatus_fungsi($id)
	// {
	// 	$result = $this->MMasterFungsi->toggle_status($id);

	// 	if ($result) {
	// 		$this->session->set_flashdata('success', 'Status fungsi berhasil diubah.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Gagal mengubah status fungsi.');
	// 	}

	// 	redirect('admdata');
	// }

	// public function delete_fungsi($id)
	// {
	// 	$result = $this->MMasterFungsi->delete($id);

	// 	if ($result) {
	// 		$this->session->set_flashdata('success', 'Data fungsi berhasil dihapus.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Gagal menghapus data fungsi. Data mungkin masih digunakan.');
	// 	}

	// 	redirect('admdata');
	// }

	// ========================================
	// MASTER URUSAN CRUD METHODS
	// ========================================

	/**
	 * Save master urusan (Create/Update)
	 */
	public function save_master_urusan()
	{
		$this->form_validation->set_rules('namaurusan', 'Nama Urusan', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[4]');
		$this->form_validation->set_rules('fungsi_id', 'Fungsi', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$tag = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
			redirect('admdata');
			return;
		}

		$data = array(
			'urusan' => $this->input->post('namaurusan'),
			'kode' => $this->input->post('kode'),
			'fungsi' => $this->input->post('fungsi_id')
		);

		$id = $this->input->post('id');

		if ($id) {
			// Update
			$result = $this->MMasterUrusan->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data urusan berhasil diperbarui.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data urusan. Nama atau kode mungkin sudah ada.');
			}
		} else {
			// Create
			$result = $this->MMasterUrusan->insert($data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data urusan berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data urusan. Nama atau kode mungkin sudah ada.');
			}
		}

		redirect('admdata');
	}

	// ========================================
	// MASTER PROGRAM CRUD METHODS
	// ========================================

	/**
	 * Save master program (Create/Update)
	 */
	public function save_master_program()
	{
		$this->form_validation->set_rules('namaprogram', 'Nama Program', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[20]');
		$this->form_validation->set_rules('urusan_id', 'Urusan', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$tag = $this->input->post('tag1');
		$post = $this->input->post();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
			redirect('admdata');
			return;
		}

		$data = array(
			'namaprogram' => $this->input->post('namaprogram'),
			'kode' => $this->input->post('kode'),
			'urusan_id' => $this->input->post('urusan_id')
		);

		$id = $this->input->post('id');

		if ($id) {
			$result = $this->MMasterProgram->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data program berhasil diperbarui.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data program. Kode mungkin sudah ada.');
			}
		} else {
			$result = $this->MMasterProgram->insert($data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data program berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data program. Kode mungkin sudah ada.');
			}
		}

		redirect('admdata');
	}

	/**
	 * Get program by ID (AJAX)
	 */
	public function programById($id)
	{
		$program = $this->MMasterProgram->get_by_id($id);

		if ($program) {
			$response = array('status' => 'success', 'data' => $program);
		} else {
			$response = array('status' => 'error', 'message' => 'Data tidak ditemukan');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	/**
	 * Toggle program status
	 */
	public function setStatus_program($id)
	{
		$result = $this->MMasterProgram->toggle_status($id);
		if ($result) {
			$this->session->set_flashdata('success', 'Status program berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status program.');
		}
		redirect('admdata');
	}

	/**
	 * Delete program
	 */
	public function delete_program($id)
	{
		$result = $this->MMasterProgram->delete($id);
		if ($result) {
			$this->session->set_flashdata('success', 'Data program berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus data program.');
		}
		redirect('admdata');
	}

	/**
	 * Get urusan by ID (AJAX)
	 */
	public function urusanById($id)
	{
		$urusan = $this->MMasterUrusan->get_by_id($id);

		if ($urusan) {
			$response = array(
				'status' => 'success',
				'data' => $urusan
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Data tidak ditemukan'
			);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/**
	 * Toggle urusan status
	 */
	public function setStatus_urusan($id)
	{
		$result = $this->MMasterUrusan->toggle_status($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Status urusan berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status urusan.');
		}

		redirect('admdata');
	}

	/**
	 * Delete urusan
	 */
	public function delete_urusan($id)
	{
		$result = $this->MMasterUrusan->delete($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data urusan berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus data urusan. Data mungkin masih digunakan.');
		}

		redirect('admdata');
	}
}
