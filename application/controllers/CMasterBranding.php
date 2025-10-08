<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMasterBranding extends MY_Controller
{
	protected $defaultModel = 'MBranding';
	protected $defaultName = 'Branding';
	protected $tag1 = "form_masterbranding";

	public function save()
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
		$existing = $this->MBranding->byId($branding_id);
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
				$ok = $this->MBranding->update_by_id($branding_id, $data);
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
				$ok = $this->MBranding->update_by_id($branding_id, $data);
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
				$ok = $this->MBranding->update_by_id($branding_id, $data);
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
}


