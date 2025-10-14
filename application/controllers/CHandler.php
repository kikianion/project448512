<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CHandler extends MY_Controller
{
	public function card1()
	{
		$this->load->view('test/card1');
	}

	public function set_status($table_name, $id)
	{
		$table_id = real_table_name($table_name);
		$r = $this->db->get_where($table_id, array('id' => $id), 1)->row();

		if (!$r) {
			$this->flash('error---' . $table_name, $table_name . ' not found.');
			redirect($this->agent->referrer());
			return;
		}

		$new_status = ($r->status) === 'Aktif' ? 'Tidak Aktif' : 'Aktif';

		$ok = $this->db->update($table_id, ['status' => $new_status], ['id' => $id]);

		if ($ok) {
			$this->flash('dlgsuccess---' . $table_name, 'Status ' . $table_name . ' berhasil diubah menjadi "' . $new_status . '".');
			// log2("setStatus " . $ok);
		} else {
			$this->flash('error---' . $table_name, 'Gagal mengubah status ' . $this->defaultName . '.');
		}

		$this->redirectBack();
	}

	public function by_id($table_name, $id)
	{
		$table_id = real_table_name($table_name);
		$this->db->reset_query();
		$pos1 = strpos($table_name, 'user');
		if ($pos1 === false) {
			$r = $this->db->get_where($table_id, array('id' => $id), 1)->row();
		} else {
			$this->db->select('id,username,nama,role,opd___id___nama,status');
			$r = $this->db->get_where($table_id, array('id' => $id), 1)->row();
		}

		if ($r) {
			$res = [
				'status' => 'success',
				'data' => $r
			];
			$this
				->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output(json_encode($res));

		}

	}

	protected $_savedata;
	public function save($table_name)
	{
		if ($this->input->method() !== 'post') {
			show_error('Method not allowed', 405);
			return;
		}

		$post_data = $this->input->post();

		$table_id = real_table_name($table_name);

		$cols = $this->columns($table_id);
		$rules = [];
		foreach ($cols as $c) {
			if ($c['validation'] && count($c['validation']) > 0) {
				$rules[] = $c['validation'];
			}

		}

		foreach ($rules as $rule) {
			$this->form_validation->set_rules(...$rule);
		}

		if ($this->form_validation->run() === FALSE) {
			$this->flash('error---' . $table_name, validation_errors());
			$this->session->set_flashdata($post_data);

			$this->redirectBack();
		}

		$id = $this->input->post('id') ?? $this->input->get('id') ?? '';


		if ($id && $id != 0) {
			$this->cut_section_array_compare($post_data, $cols);
			$ok = $this->db->update($table_id, $post_data, ['id' => $id]);
			if ($ok) {
				$this->flash('success---' . $table_name, $table_name . ' updated.');
			} else {
				$this->flash('error---' . $table_name, 'Failed to update ' . $table_name . '.');
			}
		} else {
			$post_data['urut'] = isset($post_data['urut']) ? $post_data['urut'] : 0;
			$post_data['status'] = 'Aktif';

			$this->cut_section_array_compare($post_data, $cols);
			// foreach ($post_data as $k => $p1) {
			// 	$rel = 0;
			// 	foreach ($cols as $k2 => $p2) {
			// 		if ($p2['name'] == $k) {
			// 			$rel = 1;
			// 		}
			// 	}
			// 	if ($rel == 0) {
			// 		unset($post_data[$k]);
			// 	}
			// }
	
			$ok = $this->db->insert($table_id, $post_data);
			if ($ok) {
				$this->flash('success---' . $table_name, $table_name . ' created.');
			} else {
				$this->flash('error---' . $table_name, 'Failed to create ' . $table_name . '.');
			}
		}

		$this->redirectBack();
	}


	function cut_section_array_compare(&$post_data, $cols){
		foreach ($post_data as $k => $p1) {
			$rel = 0;
			foreach ($cols as $k2 => $p2) {
				if ($p2['name'] == $k) {
					$rel = 1;
				}
			}
			if ($rel == 0) {
				unset($post_data[$k]);
			}
		}
	}

}
