<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user_model extends CI_Model {

    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($username)
    {
        $this->db->where('username', $username);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($username, $data)
    {
        $this->db->where('username', $username);
        return $this->db->update($this->table, $data);
    }

    public function delete($username)
    {
        $this->db->where('username', $username);
        return $this->db->delete($this->table);
    }
}
