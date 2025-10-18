<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterBranding extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('MMasterBranding');
	}

	public function save()
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$table_name = 'branding';

		// Determine which form was submitted
		$form = $this->input->post('form_name');

		$table_id = real_table_name('branding');
		$id1 = 1;
		$existing = $this->db->get_where($table_id, array('id' => 1), $id1)->row();

		if (!$existing) {
			$this->flash('error---' . $table_name, 'Branding record (id=1) not found. Cannot update.');
			$this->redirectBack();
		}

		// Ensure upload directory exists for file forms
		$upload_rel = 'assets/img/branding';
		$upload_path = FCPATH . $upload_rel;

		if (!is_dir($upload_path)) {
			@mkdir($upload_path, 0755, TRUE);
		}

		switch ($form) {
			case 'form_nama':
				$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
				if ($this->form_validation->run() === FALSE) {
					$this->flash('error---' . $table_name, validation_errors());
					$this->redirectBack();
				}
				$data = ['nama' => $this->input->post('nama')];
				$ok = $this->db->update($table_id, $data, ['id' => $id1]);
				if ($ok)
					$this->flash('success---' . $table_name, 'Nama branding updated.');
				else
					$this->flash('error---' . $table_name, 'Failed to update nama.');
				break;

			case 'form_subnote':
				$this->form_validation->set_rules('subnote', 'Subnote', 'required|max_length[255]');
				if ($this->form_validation->run() === FALSE) {
					$this->flash('error---' . $table_name, validation_errors());
					$this->redirectBack();
				}
				$data = ['subnote' => $this->input->post('subnote')];
				$ok = $this->db->update($table_id, $data, ['id' => $id1]);
				if ($ok)
					$this->flash('success---' . $table_name, 'Subnote updated.');
				else
					$this->flash('error---' . $table_name, 'Failed to update subnote.');
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
					$this->flash('error---' . $table_name, 'No file uploaded for ' . $field . '.');
					$this->redirectBack();
				}

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

				if (!$this->upload->do_upload($field)) {
					$err = $this->upload->display_errors('', '');
					$this->flash('error---' . $table_name, 'Upload failed: ' . $err);
					$this->redirectBack();
				}

				$file = $this->upload->data();
				$new_path = $upload_rel . '/' . $file['file_name'];

				$data = [$field => $new_path];
				$ok = $this->db->update($table_id, $data, ['id' => $id1]);
				if ($ok)
					$this->flash('success---' . $table_name, ucfirst($field) . ' updated.');
				else
					$this->flash('error---' . $table_name, 'Failed to update ' . $field . '.');
				break;

			default:
				$this->flash('error---' . $table_name, 'Unknown form submitted.');
				break;
		}

		$this->redirectBack();
	}

}
