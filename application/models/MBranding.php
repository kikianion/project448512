<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MBranding extends MY_Model
{
	protected $table = '_master_99__branding';

	public function get($nama)
	{
		$this->db->where('nama', $nama);
		return $this->db->get($this->table)->row();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}

	public function insert_or_update($data)
	{
		// $data must contain 'nama'
		if (empty($data['nama']))
			return FALSE;
		$exists = $this->get($data['nama']);
		if ($exists) {
			$this->db->where('nama', $data['nama']);
			return $this->db->update($this->table, $data);
		}
		return $this->db->insert($this->table, $data);
	}

	public function update_by_original($original_nama, $data)
	{
		if (empty($original_nama))
			return FALSE;
		$this->db->where('nama', $original_nama);
		return $this->db->update($this->table, $data);
	}

	public function update_by_id($id, $data)
	{
		if (empty($id))
			return FALSE;
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

}
