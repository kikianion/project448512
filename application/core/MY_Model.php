<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	/**
	 * Override these in child models
	 */
	protected $table = '';
	protected $primary_key = 'id';
	protected $status_field = 'status';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll($filters = null)
	{
		$this->db->from($this->table);
		if (is_string($filters) && $this->status_field) {
			$this->db->where($this->status_field, $filters);
		} elseif (is_array($filters)) {
			foreach ($filters as $field => $value) {
				$this->db->where($field, $value);
			}
		}
		return $this->db->get()->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		return $this->db->get()->row();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function update($id, $data)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows() > 0;
	}

	public function delete($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Toggle enum status between 'Aktif' and 'Tidak Aktif'
	 */
	public function toggle_status($id)
	{
		if (!$this->status_field) { return false; }
		$current = $this->get_by_id($id);
		if (!$current) { return false; }
		$current_status = isset($current->{$this->status_field}) ? $current->{$this->status_field} : null;
		if ($current_status === null) { return false; }
		$new_status = ($current_status === 'Aktif') ? 'Tidak Aktif' : 'Aktif';
		return $this->update($id, array($this->status_field => $new_status));
	}

	/**
	 * Check duplicate by a field
	 */
	protected function is_duplicate_field($field, $value, $exclude_id = null)
	{
		$this->db->select($this->primary_key);
		$this->db->from($this->table);
		$this->db->where('LOWER(' . $field . ')', strtolower($value));
		if ($exclude_id !== null) {
			$this->db->where($this->primary_key . ' !=', $exclude_id);
		}
		return $this->db->get()->num_rows() > 0;
	}
}


