<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MRpjmdperiode extends MY_Model
{
	protected $table = 'rpjmdperiode';


	/**
	 * Deactivate all visi entries (set status = 0)
	 * @return bool
	 */
	public function deactivate_all()
	{
		return (bool) $this->db->update($this->table, array('status' => 0));
	}
	
	public function get_active()
	{
		return $this->db->where('status', 1)->order_by('id', 'DESC')->get($this->table)->result();
	}

}
