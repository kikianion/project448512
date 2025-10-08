<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmSistem extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('User_model');
		// $this->load->model('Admin_model');
		$this->load->model('MMasterUser');
		$this->load->model('MMasterMitra');
		$this->load->model('MMasterOpd');
		$this->load->model('MMasterBranding');
		$this->load->model('MVisi');
		$this->load->model('MMisi');
		$this->load->model('MPeriode');
		$this->load->model('MGroupingPeriode');

		// Check if user is logged in and has admin privileges
		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		// Check admin role (you can modify this based on your user roles)
		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}
	}

	public function index()
	{
		$data['master_users'] = $this->MMasterUser->getAll();
		$data['master_opd'] = $this->MMasterOpd->getAll();
		$data['master_mitra'] = $this->MMasterMitra->getAll();

		$data['visi_list'] = $this->MVisi->getAll();
		$data['misi_list'] = $this->MMisi->getAll();
		$data['periode_list'] = $this->MPeriode->getAll();

		$data['grouping_periode_list'] = $this->MGroupingPeriode->getAll();
		$data['master_branding'] = $this->MMasterBranding->getAll();

		$this->load->view('administrator/admsistem', $data);
	}

	/**
	 * Periode handlers
	 */
	public function save_periode()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[20]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[100]');

		$id = $this->input->post('id');  // optional for update
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			// also keep old values
			$this->session->set_flashdata('old_kode', $this->input->post('kode'));
			$this->session->set_flashdata('old_keterangan', $this->input->post('keterangan'));
			redirect('admsistem');
			return;
		}

		$data = array(
			'kode' => $this->input->post('kode'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => 'Aktif',
		);

		if ($id) {
			$ok = $this->MPeriode->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Periode berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan periode.');
			}
		} else {
			$ok = $this->MPeriode->insert($data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Periode berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan periode.');
			}
		}

		redirect('admsistem');
	}

	public function periodeById($id)
	{
		if (!$id) {
			$periode = ['error' => 'Periode ID is required.'];
			$status_code = 400;
		} else {
			$periode = $this->MPeriode->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $periode
		];
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	public function setStatus_periode($id)
	{
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';
		$periode = $this->MPeriode->get($id);
		if (!$periode) {
			$this->session->set_flashdata('error-' . $tag1, 'Periode not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
		$new_status = (strtolower($periode->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->MPeriode->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status periode berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status periode.');
		}
		redirect('admsistem');
	}

	/**
	 * Grouping Periode handlers
	 */
	public function save_grouping_periode()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('group', 'Group', 'required|max_length[50]');
		$this->form_validation->set_rules('jumlah_bulan', 'Jumlah Bulan', 'required|integer|greater_than[0]');

		$id = $this->input->post('id');  // optional for update
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			// also keep old values
			$this->session->set_flashdata('old_group', $this->input->post('group'));
			$this->session->set_flashdata('old_jumlah_bulan', $this->input->post('jumlah_bulan'));
			redirect('admsistem');
			return;
		}

		$data = array(
			'nama' => $this->input->post('group'),
			'jmlbulan' => $this->input->post('jumlah_bulan'),
			'status' => 'Aktif',
		);

		if ($id) {
			$ok = $this->MGroupingPeriode->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Grouping periode berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan grouping periode.');
			}
		} else {
			$ok = $this->MGroupingPeriode->insert($data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Grouping periode berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan grouping periode.');
			}
		}

		redirect('admsistem');
	}

	public function groupingPeriodeById($id)
	{
		if (!$id) {
			$grouping = ['error' => 'Grouping Periode ID is required.'];
			$status_code = 400;
		} else {
			$grouping = $this->MGroupingPeriode->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $grouping
		];
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	public function setStatus_grouping_periode($id)
	{
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';
		$grouping = $this->MGroupingPeriode->get($id);
		if (!$grouping) {
			$this->session->set_flashdata('error-' . $tag1, 'Grouping periode not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
		$new_status = (strtolower($grouping->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->MGroupingPeriode->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status grouping periode berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status grouping periode.');
		}
		redirect('admsistem');
	}


	/* Branding handlers */
	public function save_branding()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		// Determine which form was submitted
		$tag1 = $this->input->post('tag1');
		$form = $this->input->post('form_name');

		// Always operate on row id = 1
		$branding_id = 1;
		$existing = $this->MMasterBranding->get_by_id($branding_id);
		if (!$existing) {
			$this->session->set_flashdata('error-' . $tag1, 'Branding record (id=1) not found. Cannot update.');
			redirect('admsistem');
			return;
		}

		// Ensure upload directory exists for file forms
		$upload_rel = 'assets/img/branding';
		$upload_path = FCPATH . $upload_rel;

		if (!is_dir($upload_path)) {
			@mkdir($upload_path, 0755, TRUE);
		}

		// Branch per form
		switch ($form) {
			case 'form_nama':
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
				if ($this->form_validation->run() === FALSE) {
					$this->session->set_flashdata('error-' . $tag1, validation_errors());
					redirect('admsistem');
					return;
				}
				$data = ['nama' => $this->input->post('nama')];
				$ok = $this->MMasterBranding->update_by_id($branding_id, $data);
				if ($ok)
					$this->session->set_flashdata('success-' . $tag1, 'Nama branding updated.');
				else
					$this->session->set_flashdata('error-' . $tag1, 'Failed to update nama.');
				break;

			case 'form_subnote':
				$this->load->library('form_validation');
				$this->form_validation->set_rules('subnote', 'Subnote', 'required|max_length[255]');
				if ($this->form_validation->run() === FALSE) {
					$this->session->set_flashdata('error-' . $tag1, validation_errors());
					redirect('admsistem');
					return;
				}
				$data = ['subnote' => $this->input->post('subnote')];
				$ok = $this->MMasterBranding->update_by_id($branding_id, $data);
				if ($ok)
					$this->session->set_flashdata('success-' . $tag1, 'Subnote updated.');
				else
					$this->session->set_flashdata('error-' . $tag1, 'Failed to update subnote.');
				break;

			case 'form_background':
			case 'form_logo':
			case 'form_favicon':
				$field = ($form === 'form_background') ? 'background' : (($form === 'form_logo') ? 'logo' : 'favicon');
				$this->load->library('upload');
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|ico|svg';
				$config['max_size'] = 2048;  // 2MB
				$config['encrypt_name'] = FALSE;
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);

				if (!isset($_FILES[$field]) || empty($_FILES[$field]['name'])) {
					$this->session->set_flashdata('error-' . $tag1, 'No file uploaded for ' . $field . '.');
					redirect('admsistem');
					return;
				}

				if (!$this->upload->do_upload($field)) {
					$err = $this->upload->display_errors('', '');
					$this->session->set_flashdata('error-' . $tag1, 'Upload failed: ' . $err);
					redirect('admsistem');
					return;
				}

				$file = $this->upload->data();
				$new_path = $upload_rel . '/' . $file['file_name'];

				// delete old file if it's inside our upload dir
				$old = isset($existing->{$field}) ? $existing->{$field} : null;
				if ($old) {
					$old_full = FCPATH . $old;
					$allowed_prefix = str_replace('\\', '/', $upload_rel);
					$old_norm = str_replace('\\', '/', $old);
					if (strpos($old_norm, $allowed_prefix) !== FALSE && file_exists($old_full)) {
						@unlink($old_full);
					}
				}

				$data = [$field => $new_path];
				$ok = $this->MMasterBranding->update_by_id($branding_id, $data);
				if ($ok)
					$this->session->set_flashdata('success-' . $tag1, ucfirst($field) . ' updated.');
				else
					$this->session->set_flashdata('error-' . $tag1, 'Failed to update ' . $field . '.');
				break;

			default:
				$this->session->set_flashdata('error-' . $tag1, 'Unknown form submitted.');
				break;
		}

		redirect('admsistem');
	}

	public function delete_branding($nama)
	{
		if ($this->MMasterBranding->delete($nama)) {
			$this->session->set_flashdata('success', 'Branding deleted.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete branding.');
		}
		redirect('admsistem');
	}

}
