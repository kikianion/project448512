<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPeriode extends MY_Model
{

	protected $table = 'periodeanggaran';

	public function get_all()
	{
		$this->db->order_by('kode', 'ASC');
		return $this->db->get($this->table)->result();
	}

	public function get($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

}

