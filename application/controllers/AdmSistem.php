<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdmSistem extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		$this->load->model('Master_user_model');
		$this->load->model('Master_mitra_model');
		$this->load->model('Master_opd_model');
		$this->load->model('Master_branding_model');
		$this->load->model('Visi_model');

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
		$data['title'] = 'Administrasi Sistem';
		// load visi list for the view
		$data['visi_list'] = $this->Visi_model->get_all();
		// load master users for the view
		$data['master_users'] = $this->Master_user_model->get_all();
		// load master mitra for the view
		$data['master_mitra'] = $this->Master_mitra_model->get_all();
		// load master opd for the view
		$data['master_opd'] = $this->Master_opd_model->get_all();
		// load branding data
		$data['master_branding'] = $this->Master_branding_model->get_all();
		// $data['user'] = $this->session->userdata();

		// Get system statistics
		// $data['total_users'] = $this->Admin_model->get_total_users();
		// $data['active_users'] = $this->Admin_model->get_active_users();
		// $data['system_logs'] = $this->Admin_model->get_recent_logs(10);

		// $this->load->view('admin/dashboard', $data);
		$this->load->view('administrator/admsistem', $data);
	}

	public function mitraById($id)
	{
		// 1. Get the ID from the URL query string (e.g., ?id=123)
		// $id = $this->input->get('id');

		// Check if an ID was provided
		if (!$id) {
			// Handle the case where no ID is provided (e.g., return an error or empty array)
			$mitra = ['error' => 'Mitra ID is required.'];
			$status_code = 400;  // Bad Request
		} else {
			// 2. Call a new model method (you must create this!) to get a single record by ID
			$mitra = $this->Master_mitra_model->get($id);
			$status_code = 200;
		}

		$res = [
			'status' => 'success',
			'data' => $mitra
		];
		// 3. Set the JSON response
		$this
			->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($res));
	}

	public function userById($id)
	{
		// Check if an ID was provided
		if (!$id) {
			// Handle the case where no ID is provided (e.g., return an error or empty array)
			$user = ['error' => 'User ID is required.'];
			$status_code = 400;  // Bad Request
		} else {
			// Call the model method to get a single record by ID
			$user = $this->Master_user_model->get($id);
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
	 * Create or update a master user (table `user`)
	 */
	public function save_master_user()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[30]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('role', 'Role', 'required|max_length[20]');
		$this->form_validation->set_rules('opd', 'OPD', 'max_length[10]');
		$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

		$id = $this->input->post('id');  // optional for update
		$tag1 = $this->input->post('tag1');

		$post_data = $this->input->post();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			$this->session->set_flashdata($post_data);
			redirect('admsistem');
			return;
		}

		$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'role' => $this->input->post('role'),
			'opd' => $this->input->post('opd'),
			'status' => $this->input->post('status') ?: 'active'
		);

		// Only set password if provided; hash it
		$password = $this->input->post('password');
		if (!empty($password)) {
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		}

		if ($id) {
			// Update existing
			$update_key = $id ? $id : $original;
			$ok = $this->Master_user_model->update($update_key, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Master user updated.');
			} else {
				$this->session->set_flashdata($post_data);
				$this->session->set_flashdata('error-' . $tag1, 'Failed to update master user.');
			}
		} else {
			// Create new
			// Ensure username doesn't already exist
			if ($this->Master_user_model->get($data['username'])) {
				$this->session->set_flashdata($post_data);
				$this->session->set_flashdata('error-' . $tag1, 'Username already exists.');
			} else {
				// Password is required for new user
				if (empty($data['password'])) {
					$this->session->set_flashdata($post_data);

					$this->session->set_flashdata('error-' . $tag1, 'Password is required for new users.');
					redirect('admsistem');
					return;
				}

				$ok = $this->Master_user_model->insert($data);
				if ($ok) {
					$this->session->set_flashdata('success-' . $tag1, 'Master user created.');
				} else {
					$this->session->set_flashdata('error-' . $tag1, 'Failed to create master user.');
				}
			}
		}

		redirect('admsistem');
	}

	public function edit_master_user($username)
	{
		$data['title'] = 'Administrasi Sistem';
		$data['visi_list'] = $this->Visi_model->get_all();
		$data['master_users'] = $this->Master_user_model->get_all();
		$data['edit_master_user'] = $this->Master_user_model->get($username);
		if (!$data['edit_master_user']) {
			show_404();
			return;
		}
		$this->load->view('administrator/admsistem', $data);
	}

	public function delete_master_user($username)
	{
		if ($this->Master_user_model->delete($username)) {
			$this->session->set_flashdata('success', 'Master user deleted.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete master user.');
		}
		redirect('admsistem');
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

		$this->load->library('form_validation');
		// Allow up to 1000 characters for visi; trim input
		$this->form_validation->set_rules('visi', 'Visi', 'required|max_length[5000]|trim');

		// Preserve old input so the form can be repopulated in case of error
		$old_visi = $this->input->post('visi');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('old_visi', $old_visi);
			redirect('admsistem');
			return;
		}

		// Clean input (XSS filter) before inserting
		$visi_text = $this->input->post('visi', TRUE);
		$inserted = $this->Visi_model->insert($visi_text);

		if ($inserted) {
			$this->session->set_flashdata('success', 'Visi berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menyimpan visi.');
		}

		redirect('admsistem');
	}

	/* Master Mitra CRUD */
	public function save_master_mitra()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('namamitra', 'Nama Mitra', 'required|max_length[50]');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('kepala', 'Kepala', 'max_length[50]');
		$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
		$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');
		$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

		$id = $this->input->post('id');  // optional for update
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			redirect('admsistem');
			return;
		}

		$data = array(
			'urut' => $this->input->post('urut'),
			'namamitra' => $this->input->post('namamitra'),
			'kepala' => $this->input->post('kepala'),
			'nipkepala' => $this->input->post('nipkepala'),
			'pangkepala' => $this->input->post('pangkepala'),
			'jabatan' => $this->input->post('jabatan'),
			'status' => $this->input->post('status') ?: 'Aktif'
		);

		if ($id) {
			$ok = $this->Master_mitra_model->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Mitra updated.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Failed to update mitra.');
			}
		} else {
			$ok = $this->Master_mitra_model->insert($data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Mitra created.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Failed to create mitra.');
			}
		}

		redirect('admsistem');
	}

	public function setStatus_mitra($id)
	{
		// Get the tag1 from POST or GET for flashdata grouping (optional)
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

		// Fetch the mitra record
		$mitra = $this->Master_mitra_model->get($id);
		if (!$mitra) {
			$this->session->set_flashdata('error-' . $tag1, 'Mitra not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
		$new_status = (strtolower($mitra->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->Master_mitra_model->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status mitra berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status mitra.');
		}

		redirect('admsistem');
	}

	public function setStatus_user($id)
	{
		// Get the tag1 from POST or GET for flashdata grouping (optional)
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

		// Fetch the user record
		$user = $this->Master_user_model->get($id);
		if (!$user) {
			$this->session->set_flashdata('error-' . $tag1, 'User not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'active' -> 'inactive', else -> 'active'
		$new_status = (strtolower($user->status) === 'active') ? 'inactive' : 'active';

		$ok = $this->Master_user_model->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status user berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status user.');
		}

		redirect('admsistem');
	}

	public function setStatus_opd($id)
	{
		// Get the tag1 from POST or GET for flashdata grouping (optional)
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

		// Fetch the OPD record
		$opd = $this->Master_opd_model->get($id);
		if (!$opd) {
			$this->session->set_flashdata('error-' . $tag1, 'OPD not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'Aktif' -> 'Tidak Aktif', else -> 'Aktif'
		$new_status = (strtolower($opd->status) === 'aktif') ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->Master_opd_model->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status OPD berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status OPD.');
		}

		redirect('admsistem');
	}

	public function edit_master_mitra($id)
	{
		$data['title'] = 'Administrasi Sistem';
		$data['visi_list'] = $this->Visi_model->get_all();
		$data['master_users'] = $this->Master_user_model->get_all();
		$data['master_mitra'] = $this->Master_mitra_model->get_all();
		$data['edit_master_mitra'] = $this->Master_mitra_model->get($id);
		if (!$data['edit_master_mitra']) {
			show_404();
			return;
		}
		$this->load->view('administrator/admsistem', $data);
	}

	public function delete_master_mitra($id, $tag1)
	{
		if ($this->Master_mitra_model->delete($id)) {
			$this->session->set_flashdata('success-' . $tag1, 'Mitra deleted.');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Failed to delete mitra.');
		}
		redirect('admsistem');
	}

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
			$opd = $this->Master_opd_model->get($id);
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

	public function save_master_opd()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('namaopd', 'Nama OPD', 'required|max_length[50]');
		$this->form_validation->set_rules('urut', 'Urut', 'integer');
		$this->form_validation->set_rules('mitra_id', 'Mitra', 'required|integer');
		$this->form_validation->set_rules('kepala', 'Kepala', 'max_length[50]');
		$this->form_validation->set_rules('nipkepala', 'NIP Kepala', 'max_length[50]');
		$this->form_validation->set_rules('pangkepala', 'Pangkat Kepala', 'max_length[50]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'max_length[50]');
		$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

		$id = $this->input->post('id');  // optional for update
		$tag1 = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			redirect('admsistem');
			return;
		}

		$data = array(
			'urut' => $this->input->post('urut'),
			'namaopd' => $this->input->post('namaopd'),
			'mitra' => $this->input->post('mitra_id'),
			'kepala' => $this->input->post('kepala'),
			'nipkepala' => $this->input->post('nipkepala'),
			'pangkepala' => $this->input->post('pangkepala'),
			'jabatan' => $this->input->post('jabatan'),
			'status' => $this->input->post('status') ?: 'Aktif'
		);

		if ($id) {
			$ok = $this->Master_opd_model->update($id, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'OPD updated.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Failed to update OPD.');
			}
		} else {
			$ok = $this->Master_opd_model->insert($data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'OPD created.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Failed to create OPD.');
			}
		}

		redirect('admsistem');
	}

	public function edit_master_opd($id)
	{
		$data['title'] = 'Administrasi Sistem';
		$data['visi_list'] = $this->Visi_model->get_all();
		$data['master_users'] = $this->Master_user_model->get_all();
		$data['master_mitra'] = $this->Master_mitra_model->get_all();
		$data['master_opd'] = $this->Master_opd_model->get_all();
		$data['edit_master_opd'] = $this->Master_opd_model->get($id);
		if (!$data['edit_master_opd']) {
			show_404();
			return;
		}
		$this->load->view('administrator/admsistem', $data);
	}

	public function delete_master_opd($id, $tag1)
	{
		if ($this->Master_opd_model->delete($id)) {
			$this->session->set_flashdata('success-' . $tag1, 'OPD deleted.');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Failed to delete OPD.');
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
		$existing = $this->Master_branding_model->get_by_id($branding_id);
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
				$ok = $this->Master_branding_model->update_by_id($branding_id, $data);
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
				$ok = $this->Master_branding_model->update_by_id($branding_id, $data);
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
				$ok = $this->Master_branding_model->update_by_id($branding_id, $data);
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
		if ($this->Master_branding_model->delete($nama)) {
			$this->session->set_flashdata('success', 'Branding deleted.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete branding.');
		}
		redirect('admsistem');
	}

	public function users()
	{
		$data['title'] = 'Manajemen Pengguna';
		$data['users'] = $this->Admin_model->get_all_users();
		$data['user'] = $this->session->userdata();

		$this->load->view('admin/users', $data);
	}

	public function create_user()
	{
		$data['title'] = 'Tambah Pengguna Baru';
		$data['user'] = $this->session->userdata();

		if ($this->input->method() === 'post') {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,mitra]');
			$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');

			if ($this->form_validation->run() === TRUE) {
				$user_data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role' => $this->input->post('role'),
					'full_name' => $this->input->post('full_name'),
					'is_active' => 1,
					'created_at' => date('Y-m-d H:i:s')
				);

				if ($this->Admin_model->create_user($user_data)) {
					$this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
					redirect('admin/users');
				} else {
					$this->session->set_flashdata('error', 'Gagal menambahkan pengguna.');
				}
			}
		}

		$this->load->view('admin/create_user', $data);
	}

	public function edit_user($id)
	{
		$data['title'] = 'Edit Pengguna';
		$data['user'] = $this->session->userdata();
		$data['edit_user'] = $this->Admin_model->get_user_by_id($id);

		if (!$data['edit_user']) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,mitra]');
			$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');

			if ($this->form_validation->run() === TRUE) {
				$user_data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'role' => $this->input->post('role'),
					'full_name' => $this->input->post('full_name'),
					'is_active' => $this->input->post('is_active') ? 1 : 0,
					'updated_at' => date('Y-m-d H:i:s')
				);

				// Only update password if provided
				if ($this->input->post('password')) {
					$user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}

				if ($this->Admin_model->update_user($id, $user_data)) {
					$this->session->set_flashdata('success', 'Pengguna berhasil diperbarui.');
					redirect('admin/users');
				} else {
					$this->session->set_flashdata('error', 'Gagal memperbarui pengguna.');
				}
			}
		}

		$this->load->view('admin/edit_user', $data);
	}

	public function delete_user($id)
	{
		if ($this->Admin_model->delete_user($id)) {
			$this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
		}

		redirect('admin/users');
	}

	public function settings()
	{
		$data['title'] = 'Pengaturan Sistem';
		$data['user'] = $this->session->userdata();
		$data['settings'] = $this->Admin_model->get_system_settings();

		if ($this->input->method() === 'post') {
			$settings_data = array(
				'site_name' => $this->input->post('site_name'),
				'site_description' => $this->input->post('site_description'),
				'maintenance_mode' => $this->input->post('maintenance_mode') ? 1 : 0,
				'max_login_attempts' => $this->input->post('max_login_attempts'),
				'session_timeout' => $this->input->post('session_timeout')
			);

			if ($this->Admin_model->update_system_settings($settings_data)) {
				$this->session->set_flashdata('success', 'Pengaturan berhasil diperbarui.');
				redirect('admin/settings');
			} else {
				$this->session->set_flashdata('error', 'Gagal memperbarui pengaturan.');
			}
		}

		$this->load->view('admin/settings', $data);
	}

	public function logs()
	{
		$data['title'] = 'Log Sistem';
		$data['user'] = $this->session->userdata();

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/logs');
		$config['total_rows'] = $this->Admin_model->get_logs_count();
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['logs'] = $this->Admin_model->get_logs($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/logs', $data);
	}

	public function toggle_user_status($id)
	{
		$user = $this->Admin_model->get_user_by_id($id);
		if ($user) {
			$new_status = $user->is_active ? 0 : 1;
			if ($this->Admin_model->update_user($id, array('is_active' => $new_status))) {
				$status_text = $new_status ? 'diaktifkan' : 'dinonaktifkan';
				$this->session->set_flashdata('success', "Pengguna berhasil {$status_text}.");
			} else {
				$this->session->set_flashdata('error', 'Gagal mengubah status pengguna.');
			}
		}

		redirect('admin/users');
	}
}
