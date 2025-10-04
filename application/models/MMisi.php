<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMisi extends MY_Model
{
    protected $table = 'misi';


    public function get_all()
    {
        // join visi to get visi text and status
        $this->db->select('misi.id, misi.urut, misi.misi, misi.visiinduk, misi.status, visi.visi as visi_text, visi.status as visi_status');
        $this->db->from($this->table . ' as misi');
        $this->db->join('visi', 'visi.id = misi.visiinduk', 'left');
        $this->db->order_by('misi.urut', 'ASC');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', (int)$id);
        return $this->db->update($this->table, $data);
    }

}


