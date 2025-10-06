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

		// $postdata=$this->input->post();

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

	public function save_misi()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('misi', 'Misi', 'required|max_length[5000]|trim');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('visi_id', 'Visi', 'required|integer');

		$id = $this->input->post('id');
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			// also keep old values
			$this->session->set_flashdata('old_misi', $this->input->post('misi'));
			$this->session->set_flashdata('old_urut', $this->input->post('urut'));
			$this->session->set_flashdata('old_visi_id', $this->input->post('visi_id'));
			redirect('admsistem');
			return;
		}

		$data = array(
			'misi' => $this->input->post('misi'),
			'urut' => $this->input->post('urut') ?: 0,
			'visiinduk' => $this->input->post('visi_id'),
			'status' => 1,
		);

		if ($id) {
			$ok = $this->MMisi->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Misi berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan misi.');
			}
		} else {
			$ok = $this->MMisi->insert($data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Misi berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan misi.');
			}
		}

		redirect('admsistem');
	}

	public function misiById($id)
	{
		if (!$id) {
			$misi = ['error' => 'Misi ID is required.'];
			$status_code = 400;
		} else {
			$misi = $this->MMisi->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $misi
		];
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	public function setStatus_misi($id)
	{
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';
		$misi = $this->MMisi->get($id);
		if (!$misi) {
			$this->session->set_flashdata('error-' . $tag1, 'Misi not found.');
			redirect('admsistem');
			return;
		}

		$new_status = ((int) $misi->status === 1) ? 0 : 1;
		$ok = $this->MMisi->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status misi berhasil diubah.');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status misi.');
		}
		redirect('admsistem');
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

	// public function mitraById($id)
	// {
	// 	// 1. Get the ID from the URL query string (e.g., ?id=123)
	// 	// $id = $this->input->get('id');

	// 	// Check if an ID was provided
	// 	if (!$id) {
	// 		// Handle the case where no ID is provided (e.g., return an error or empty array)
	// 		$mitra = ['error' => 'Mitra ID is required.'];
	// 		$status_code = 400;  // Bad Request
	// 	} else {
	// 		// 2. Call a new model method (you must create this!) to get a single record by ID
	// 		$mitra = $this->MMasterMitra->get($id);
	// 		$status_code = 200;
	// 	}

	// 	$res = [
	// 		'status' => 'success',
	// 		'data' => $mitra
	// 	];
	// 	// 3. Set the JSON response
	// 	$this
	// 		->output
	// 		->set_content_type('application/json')
	// 		->set_status_header($status_code)
	// 		->set_output(json_encode($res));
	// }

	public function userById($id)
	{
		// Check if an ID was provided
		if ($id != 0 && !$id) {
			// Handle the case where no ID is provided (e.g., return an error or empty array)
			$user = ['error' => 'User ID is required.'];
			$status_code = 400;  // Bad Request
		} else {
			// Call the model method to get a single record by ID
			$user = $this->MMasterUser->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $user
		];
		// Set the JSON response
		$this
			->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}


	/**
	 * Handle POST to save visi
	 */
	public function save_visi()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$id = $this->input->post('id');  // optional for update

		$this->load->library('form_validation');
		// Allow up to 1000 characters for visi; trim input
		$this->form_validation->set_rules('visi', 'Visi', 'required|max_length[5000]|trim');

		// Preserve old input so the form can be repopulated in case of error
		$old_visi = $this->input->post('visi');
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			$this->session->set_flashdata('old_visi', $old_visi);
			redirect('admsistem');
			return;
		}

		$visi_new = $this->input->post('visi');
		$data = array(
			'visi' => $this->input->post('visi'),
		);

		if ($id) {
			$ok = $this->MVisi->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Visi berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan visi.');
			}
		} else {
			$ok = $this->MVisi->insert($visi_new);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Visi berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal menyimpan visi.');
			}
		}
		// Clean input (XSS filter) before inserting

		redirect('admsistem');
	}

	public function visiById($id)
	{
		if (!$id) {
			$visi = ['error' => 'Visi ID is required.'];
			$status_code = 400;
		} else {
			$visi = $this->MVisi->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $visi
		];
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	public function setStatus_visi($id)
	{
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';
		$visi = $this->MVisi->get($id);
		if (!$visi) {
			$this->session->set_flashdata('error-' . $tag1, 'Visi not found.');
			redirect('admsistem');
			return;
		}

		$new_status = ((int) $visi->status === 1) ? 0 : 1;
		$ok = $this->MVisi->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status visi berhasil diubah.');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status visi.');
		}
		redirect('admsistem');
	}

	/* Master Mitra CRUD */
	// public function save_master_mitra()
	// {
	// 	if ($this->input->method() !== 'post') {
	// 		show_error('Method not allowed', 405);
	// 		return;
	// 	}

	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('namamitra', 'Nama Mitra', 'required|max_length[50]');
	// 	$this->form_validation->set_rules('urut', 'Urut', 'integer');
	// 	$this->form_validation->set_rules('kepala', 'Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');
	// 	$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

	// 	$id = $this->input->post('id');  // optional for update
	// 	$tag1 = $this->input->post('tag1');

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->session->set_flashdata('error-' . $tag1, validation_errors());
	// 		redirect('admsistem');
	// 		return;
	// 	}

	// 	$data = array(
	// 		'urut' => $this->input->post('urut'),
	// 		'namamitra' => $this->input->post('namamitra'),
	// 		'kepala' => $this->input->post('kepala'),
	// 		'nipkepala' => $this->input->post('nipkepala'),
	// 		'pangkepala' => $this->input->post('pangkepala'),
	// 		'jabatan' => $this->input->post('jabatan'),
	// 		'status' => $this->input->post('status') ?: 'Aktif'
	// 	);

	// 	if ($id) {
	// 		$ok = $this->MMasterMitra->update($id, $data);
	// 		if ($ok) {
	// 			$this->session->set_flashdata('success-' . $tag1, 'Mitra updated.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag1, 'Failed to update mitra.');
	// 		}
	// 	} else {
	// 		$ok = $this->MMasterMitra->insert($data);
	// 		if ($ok) {
	// 			$this->session->set_flashdata('success-' . $tag1, 'Mitra created.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag1, 'Failed to create mitra.');
	// 		}
	// 	}

	// 	redirect('admsistem');
	// }

	// public function setStatus_mitra($id)
	// {
	// 	// Get the tag1 from POST or GET for flashdata grouping (optional)
	// 	$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

	// 	// Fetch the mitra record
	// 	$mitra = $this->MMasterMitra->get($id);
	// 	if (!$mitra) {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Mitra not found.');
	// 		redirect('admsistem');
	// 		return;
	// 	}

	// 	// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
	// 	$new_status = (strtolower($mitra->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

	// 	$ok = $this->MMasterMitra->update($id, ['status' => $new_status]);
	// 	if ($ok) {
	// 		$this->session->set_flashdata('success-' . $tag1, 'Status mitra berhasil diubah menjadi "' . $new_status . '".');
	// 	} else {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status mitra.');
	// 	}

	// 	redirect('admsistem');
	// }

	// public function setStatus_opd($id)
	// {
	// 	// Get the tag1 from POST or GET for flashdata grouping (optional)
	// 	$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

	// 	// Fetch the OPD record
	// 	$opd = $this->MMasterOpd->get($id);
	// 	if (!$opd) {
	// 		$this->session->set_flashdata('error-' . $tag1, 'OPD not found.');
	// 		redirect('admsistem');
	// 		return;
	// 	}

	// 	// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
	// 	$new_status = (strtolower($opd->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

	// 	$ok = $this->MMasterOpd->update($id, ['status' => $new_status]);
	// 	if ($ok) {
	// 		$this->session->set_flashdata('success-' . $tag1, 'Status OPD berhasil diubah menjadi "' . $new_status . '".');
	// 	} else {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status OPD.');
	// 	}

	// 	redirect('admsistem');
	// }

	// public function edit_master_mitra($id)
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

	// public function delete_master_mitra($id, $tag1)
	// {
	// 	if ($this->MMasterMitra->delete($id)) {
	// 		$this->session->set_flashdata('success-' . $tag1, 'Mitra deleted.');
	// 	} else {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Failed to delete mitra.');
	// 	}
	// 	redirect('admsistem');
	// }

	/* Master OPD CRUD */
	public function opdById($id)
	{
		// Check if an ID was provided
		if (!$id) {
			// Handle the case where no ID is provided (e.g., return an error or empty array)
			$opd = ['error' => 'OPD ID is required.'];
			$status_code = 400;  // Bad Request
		} else {
			// Call the model method to get a single record by ID
			$opd = $this->MMasterOpd->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $opd
		];
		// Set the JSON response
		$this
			->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	// public function save_master_opd()
	// {
	// 	if ($this->input->method() !== 'post') {
	// 		show_error('Method not allowed', 405);
	// 		return;
	// 	}

	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('namaopd', 'Nama OPD', 'required|max_length[50]');
	// 	$this->form_validation->set_rules('urut', 'Urut', 'integer');
	// 	$this->form_validation->set_rules('mitra_id', 'Mitra', 'required|integer');
	// 	$this->form_validation->set_rules('kepala', 'Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
	// 	$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');
	// 	$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

	// 	$id = $this->input->post('id');  // optional for update
	// 	$tag1 = $this->input->post('tag1');

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->session->set_flashdata('error-' . $tag1, validation_errors());
	// 		redirect('admsistem');
	// 		return;
	// 	}

	// 	$data = array(
	// 		'urut' => $this->input->post('urut'),
	// 		'namaopd' => $this->input->post('namaopd'),
	// 		'mitra' => $this->input->post('mitra_id'),
	// 		'kepala' => $this->input->post('kepala'),
	// 		'nipkepala' => $this->input->post('nipkepala'),
	// 		'pangkepala' => $this->input->post('pangkepala'),
	// 		'jabatan' => $this->input->post('jabatan'),
	// 		'status' => $this->input->post('status') ?: 'Aktif'
	// 	);

	// 	if ($id) {
	// 		$ok = $this->MMasterOpd->update($id, $data);
	// 		if ($ok) {
	// 			$this->session->set_flashdata('success-' . $tag1, 'OPD updated.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag1, 'Failed to update OPD.');
	// 		}
	// 	} else {
	// 		$ok = $this->MMasterOpd->insert($data);
	// 		if ($ok) {
	// 			$this->session->set_flashdata('success-' . $tag1, 'OPD created.');
	// 		} else {
	// 			$this->session->set_flashdata('error-' . $tag1, 'Failed to create OPD.');
	// 		}
	// 	}

	// 	redirect('admsistem');
	// }

	// public function edit_master_opd($id)
	// {
	// 	$data['title'] = 'Administrasi Sistem';
	// 	$data['visi_list'] = $this->MVisi->getAll();
	// 	$data['master_users'] = $this->MMasterUser->getAll();
	// 	$data['master_mitra'] = $this->MMasterMitra->getAll();
	// 	$data['master_opd'] = $this->MMasterOpd->getAll();
	// 	$data['edit_master_opd'] = $this->MMasterOpd->get($id);
	// 	if (!$data['edit_master_opd']) {
	// 		show_404();
	// 		return;
	// 	}
	// 	$this->load->view('administrator/admsistem', $data);
	// }

	// public function delete_master_opd($id, $tag1)
	// {
	// 	if ($this->MMasterOpd->delete($id)) {
	// 		$this->session->set_flashdata('success-' . $tag1, 'OPD deleted.');
	// 	} else {
	// 		$this->session->set_flashdata('error-' . $tag1, 'Failed to delete OPD.');
	// 	}
	// 	redirect('admsistem');
	// }

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
