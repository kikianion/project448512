<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterUser extends MY_Controller
{

	protected $defaultModel = 'MMasterUser';
	protected $defaultName = 'User';

	public function save()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[30]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('role', 'Role', 'required|max_length[20]');
		$this->form_validation->set_rules('opd', 'OPD', 'max_length[10]');
		$this->form_validation->set_rules('status', 'Status', 'max_length[50]');

		$post_data = $this->input->post();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag1, validation_errors());
			$this->session->set_flashdata($post_data);
			redirect('admsistem');
			return;
		}

		$this->_savedata = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'role' => $this->input->post('role'),
			'opd' => $this->input->post('opd'),
			'status' => $this->input->post('status') ?: 'active'
		);

		// Only set password if provided; hash it
		$password = $this->input->post('password');
		if (!empty($password)) {
			$this->_savedata['password'] = password_hash($password, PASSWORD_DEFAULT);
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
	public function delete_master_user($username)
	{
		if ($this->MMasterUser->delete($username)) {
			$this->session->set_flashdata('success', 'Master user deleted.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete master user.');
		}
		redirect('admsistem');
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
