<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterUser extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('User_model');
		$this->load->model('MMasterUser');
	}

	public function index()
	{
		$data['master_users'] = $this->MMasterUser->get_all();
		$this->load->view('administrator/admsistem', $data);
	}

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

	public function save()
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
			$ok = $this->MMasterUser->update($update_key, $data);
			if ($ok) {
				$this->session->set_flashdata('success-' . $tag1, 'Master user updated.');
			} else {
				$this->session->set_flashdata($post_data);
				$this->session->set_flashdata('error-' . $tag1, 'Failed to update master user.');
			}
		} else {
			// Create new
			// Ensure username doesn't already exist
			if ($this->MMasterUser->get($data['username'])) {
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

				$ok = $this->MMasterUser->insert($data);
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
		$data['master_users'] = $this->MMasterUser->get_all();
		$data['edit_master_user'] = $this->MMasterUser->get($username);
		if (!$data['edit_master_user']) {
			show_404();
			return;
		}
		$this->load->view('administrator/admsistem', $data);
	}

	public function delete_master_user($username)
	{
		if ($this->MMasterUser->delete($username)) {
			$this->session->set_flashdata('success', 'Master user deleted.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete master user.');
		}
		redirect('admsistem');
	}

	public function setStatus($id)
	{
		// Get the tag1 from POST or GET for flashdata grouping (optional)
		$tag1 = $this->input->post('tag1') ?? $this->input->get('tag1') ?? '';

		// Fetch the user record
		$user = $this->MMasterUser->get($id);
		if (!$user) {
			$this->session->set_flashdata('error-' . $tag1, 'User not found.');
			redirect('admsistem');
			return;
		}

		// Toggle status: if 'active' -> 'inactive', else -> 'active'
		$new_status = (strtolower($user->status) === 'active') ? 'inactive' : 'active';

		$ok = $this->MMasterUser->update($id, ['status' => $new_status]);
		if ($ok) {
			$this->session->set_flashdata('success-' . $tag1, 'Status user berhasil diubah menjadi "' . $new_status . '".');
		} else {
			$this->session->set_flashdata('error-' . $tag1, 'Gagal mengubah status user.');
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

	public function delete($id)
	{
		if ($this->Admin_model->delete_user($id)) {
			$this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
		}

		redirect('admin/users');
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

	public function reset_password()
	{
		$tag1 = $this->input->post('tag1');
		$id = $this->input->post('id');
		$passwordbaru = $this->input->post('password-baru');
		$passwordbaru2 = $this->input->post('password-baru2');

		// $target_user = $this->Admin_model->get_user_by_id($id);
		$target_user = $this->MMasterUser->get($id);

		if (!$target_user) {
			$this->session->set_flashdata('error-' . $tag1, 'Pengguna tidak ditemukan.');
			// redirect('admin/users');
			redirect('admsistem');

		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password-baru', 'Password Baru', 'required|min_length[6]');
		$this->form_validation->set_rules('password-baru2', 'Konfirmasi Password', 'required|matches[password-baru]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error-' . $tag1, 'Password baru salah.');
			redirect('admsistem');
		} else {
			// Hash password, assuming password_hash is available
			$hashed_password = password_hash($passwordbaru, PASSWORD_DEFAULT);

			if ($this->MMasterUser->update($id, array('password' => $hashed_password))) {
				$this->session->set_flashdata('success-' . $tag1, 'Password berhasil direset.');
			} else {
				$this->session->set_flashdata('error-' . $tag1, 'Gagal mereset password.');
			}
			redirect('admsistem');
		}
	}
}
