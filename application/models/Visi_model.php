<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_model extends CI_Model {

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
     * Insert a visi row
     * @param string $visi_text
     * @return int|bool inserted id or false
     */
    public function insert($visi_text)
    {
        $data = array(
            'visi' => $visi_text,
            'status' => 1
        );

        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }

        return false;
    }
}
