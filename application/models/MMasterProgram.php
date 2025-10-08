<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMasterProgram extends MY_Model {

	protected $table = 'program';
	protected $primary_key = 'id';
	protected $status_field = 'status';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// /**
	//  * Get all program with joined urusan
	//  * @param string|null $status
	//  * @return array
	//  */
	// public function get_all($status = null)
	// {
	// 	$this->db->select('p.*, u.urusan');
	// 	$this->db->from($this->table . ' p');
	// 	$this->db->join('urusan u', 'p.urusan_id = u.id', 'left');
	// 	if ($status !== null) {
	// 		$this->db->where('p.status', $status);
	// 	}
	// 	$this->db->order_by('p.kode', 'ASC');
	// 	$this->db->order_by('p.namaprogram', 'ASC');
	// 	return $this->db->get()->result();
	// }

	// /**
	//  * Get single program by id
	//  */
	// public function get_by_id($id)
	// {
	// 	$this->db->select('p.*, u.urusan');
	// 	$this->db->from($this->table . ' p');
	// 	$this->db->join('urusan u', 'p.urusan_id = u.id', 'left');
	// 	$this->db->where('p.' . $this->primary_key, $id);
	// 	return $this->db->get()->row();
	// }

	// /**
	//  * Insert program
	//  * @param array $data
	//  * @return int|false
	//  */
	// public function insert($data)
	// {
	// 	$insert_data = array(
	// 		'namaprogram' => isset($data['namaprogram']) ? $data['namaprogram'] : null,
	// 		'kode' => isset($data['kode']) ? $data['kode'] : null,
	// 		'urusan_id' => isset($data['urusan_id']) && $data['urusan_id'] !== '' ? (int)$data['urusan_id'] : null,
	// 		'status' => 'Aktif',
	// 	);

	// 	if (empty($insert_data['namaprogram'])) {
	// 		return false;
	// 	}

	// 	if (!empty($insert_data['kode']) && $this->is_duplicate_kode($insert_data['kode'])) {
	// 		return false;
	// 	}

	// 	$this->db->insert($this->table, $insert_data);
	// 	if ($this->db->affected_rows() > 0) {
	// 		return $this->db->insert_id();
	// 	}
	// 	return false;
	// }

	// /**
	//  * Update program
	//  */
	// public function update($id, $data)
	// {
	// 	$update_data = array();
	// 	if (isset($data['namaprogram'])) {
	// 		$update_data['namaprogram'] = $data['namaprogram'];
	// 	}
	// 	if (isset($data['kode'])) {
	// 		$update_data['kode'] = $data['kode'];
	// 		if (!empty($update_data['kode']) && $this->is_duplicate_kode($update_data['kode'], $id)) {
	// 			return false;
	// 		}
	// 	}
	// 	if (isset($data['urusan_id'])) {
	// 		$update_data['urusan_id'] = $data['urusan_id'] !== '' ? (int)$data['urusan_id'] : null;
	// 	}
	// 	if (isset($data['status'])) {
	// 		$update_data['status'] = $data['status'];
	// 	}

	// 	if (array_key_exists('namaprogram', $update_data) && empty($update_data['namaprogram'])) {
	// 		return false;
	// 	}

	// 	$this->db->where($this->primary_key, (int)$id);
	// 	$this->db->update($this->table, $update_data);
	// 	return $this->db->affected_rows() > 0;
	// }

	// /**
	//  * Delete program
	//  */
	// public function delete($id)
	// {
	// 	$this->db->where($this->primary_key, (int)$id);
	// 	$this->db->delete($this->table);
	// 	return $this->db->affected_rows() > 0;
	// }

	// /**
	//  * Toggle status
	//  */
	// public function toggle_status($id)
	// {
	// 	$current = $this->get_by_id($id);
	// 	if (!$current) { return false; }
	// 	$new_status = ($current->status === 'Aktif') ? 'Tidak Aktif' : 'Aktif';
	// 	return $this->update($id, array('status' => $new_status));
	// }

	// private function is_duplicate_kode($kode, $exclude_id = null)
	// {
	// 	$this->db->select('id');
	// 	$this->db->from($this->table);
	// 	$this->db->where('LOWER(kode)', strtolower($kode));
	// 	if ($exclude_id !== null) {
	// 		$this->db->where('id !=', (int)$exclude_id);
	// 	}
	// 	return $this->db->get()->num_rows() > 0;
	// }
}


