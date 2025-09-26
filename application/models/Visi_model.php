<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visi_model extends CI_Model
{

    protected $table = 'visi';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all visi entries ordered by id desc
     * @return array
     */
    public function get_all()
    {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result();
    }

    /**
     * Deactivate all visi entries (set status = 0)
     * @return bool
     */
    public function deactivate_all()
    {
        return (bool) $this->db->update($this->table, array('status' => 0));
    }

    /**
     * Insert a visi row and make it active. This runs inside a DB transaction
     * so that deactivation of previous records and insertion of the new one
     * happen atomically.
     * @param string $visi_text
     * @return int|bool inserted id or false
     */
    public function insert($visi_text)
    {
        // prepare data
        $data = array(
            'visi' => $visi_text,
            'status' => 1
        );

        // transaction: deactivate existing active visi then insert new
        $this->db->trans_start();

        // set all existing visi to inactive
        $this->db->update($this->table, array('status' => 0));

        $this->db->insert($this->table, $data);
        $id1=$this->db->insert_id();

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            return $id1;
        }

        return false;
    }

    /**
     * Set status for a specific visi id
     * @param int $id
     * @param int $status
     * @return bool
     */
    public function set_status($id, $status)
    {
        return (bool) $this->db->where('id', (int) $id)->update($this->table, array('status' => (int) $status));
    }
}
