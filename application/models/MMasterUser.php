<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMasterUser extends MY_Model
{
	protected $table = 'user';
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get($this->table)->row();
	}

	public function byId($id)
	{
		$this->db->select('id,username,nama,role,opd,status');
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		return $this->db->get()->row();
	}

	// public function get($id)
	// {
	// 	$this->db->select('id,username,nama,role,opd,status');
	// 	$this->db->where('id', $id);
	// 	return $this->db->get($this->table)->row();
	// }

	// public function insert($data)
	// {
	// 	return $this->db->insert($this->table, $data);
	// }

	// public function update($id, $data)
	// {
	// 	$this->db->where('id', $id);
	// 	return $this->db->update($this->table, $data);
	// }

	// public function delete($username)
	// {
	// 	$this->db->where('username', $username);
	// 	return $this->db->delete($this->table);
	// }
}
