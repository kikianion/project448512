<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MVisi extends MY_Model
{
	protected $table = 'visi';

	// public function get($id)
	// {
	// 	return $this->db->where('id', (int) $id)->get($this->table)->row();
	// }

	/**
	 * Deactivate all visi entries (set status = 0)
	 * @return bool
	 */
	public function deactivate_all()
	{
		return (bool) $this->db->update($this->table, array('status' => 0));
	}

	// public function insert($visi_text)
	// {
	// 	// prepare data
	// 	$data = array(
	// 		'visi' => $visi_text,
	// 		'status' => 1
	// 	);

	// 	// transaction: deactivate existing active visi then insert new
	// 	$this->db->trans_start();

	// 	// set all existing visi to inactive
	// 	// $this->db->update($this->table, array('status' => 0));

	// 	$this->db->insert($this->table, $data);
	// 	$id1 = $this->db->insert_id();

	// 	$this->db->trans_complete();

	// 	if ($this->db->trans_status() === TRUE) {
	// 		return $id1;
	// 	}

	// 	return false;
	// }

	// public function update($id, $data)
	// {
	// 	return (bool) $this->db->where('id', (int) $id)->update($this->table, $data);
	// }

	public function get_active()
	{
		return $this->db->where('status', 1)->order_by('id', 'DESC')->get($this->table)->result();
	}

	// public function set_status($id, $status)
	// {
	// 	return (bool) $this->db->where('id', (int) $id)->update($this->table, array('status' => (int) $status));
	// }
}
