<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_urusan_model extends MY_Model {

    protected $table = 'urusan';
    protected $primary_key = 'id';
    protected $status_field = 'status';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all urusan records with fungsi information
     * @param string $status - Filter by status (optional)
     * @return array
     */
    public function get_all($status = null)
    {
        $this->db->select('mu.*, f.namafungsi');
        $this->db->from($this->table . ' mu');
        $this->db->join('fungsi f', 'mu.fungsi= f.id', 'left');
        
        if ($status !== null) {
            $this->db->where('mu.status', $status);
        }
        
        $this->db->order_by('mu.kode', 'ASC');
        $this->db->order_by('mu.urusan', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get urusan by ID
     * @param int $id
     * @return object|null
     */
    public function get_by_id($id)
    {
        $this->db->select('mu.*, f.namafungsi');
        $this->db->from($this->table . ' mu');
        $this->db->join('fungsi f', 'mu.fungsi = f.id', 'left');
        $this->db->where('mu.' . $this->primary_key, $id);
        
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get active urusan for dropdown
     * @return array
     */
    public function get_active()
    {
        return $this->get_all('Aktif');
    }

    /**
     * Insert new urusan
     * @param array $data
     * @return bool|int - Returns insert ID on success, false on failure
     */
    public function insert($data)
    {
        // Set default values
        $insert_data = array(
            'urusan' => $data['namaurusan'],
            'kode' => isset($data['kode']) ? $data['kode'] : '',
            'fungsi' => isset($data['fungsi_id']) ? (int)$data['fungsi_id'] : null,
            'status' => 'Aktif',
        );

        // Validate required fields
        if (empty($insert_data['urusan'])) {
            return false;
        }

        // Check for duplicate name
        if ($this->is_duplicate_name($insert_data['urusan'])) {
            return false;
        }

        // Check for duplicate kode if provided
        if (!empty($insert_data['kode']) && $this->is_duplicate_kode($insert_data['kode'])) {
            return false;
        }

        $this->db->insert($this->table, $insert_data);
        
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        
        return false;
    }

    /**
     * Update urusan
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        $update_data = array();
        
        // Only update fields that are provided
        if (isset($data['namaurusan'])) {
            $update_data['namaurusan'] = $data['namaurusan'];
        }
       
        if (isset($data['kode'])) {
            $update_data['kode'] = $data['kode'];
        }
        
        if (isset($data['fungsi_id'])) {
            $update_data['fungsi_id'] = !empty($data['fungsi_id']) ? (int)$data['fungsi_id'] : null;
        }
        
        if (isset($data['status'])) {
            $update_data['status'] = $data['status'];
        }

        // Validate required fields
        if (isset($update_data['namaurusan']) && empty($update_data['namaurusan'])) {
            return false;
        }

        // Check for duplicate name (excluding current record)
        if (isset($update_data['namaurusan']) && $this->is_duplicate_name($update_data['namaurusan'], $id)) {
            return false;
        }

        // Check for duplicate kode (excluding current record)
        if (isset($update_data['kode']) && !empty($update_data['kode']) && $this->is_duplicate_kode($update_data['kode'], $id)) {
            return false;
        }

        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $update_data);
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * Delete urusan
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        // Check if urusan is being used in other tables
        if ($this->is_urusan_used($id)) {
            return false;
        }

        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
        
        return $this->db->affected_rows() > 0;
    }

    /**
     * Toggle status (Aktif/Tidak Aktif)
     * @param int $id
     * @return bool
     */
    public function toggle_status($id)
    {
        $current = $this->get_by_id($id);
        
        if (!$current) {
            return false;
        }

        $new_status = ($current->status === 'Aktif') ? 'Tidak Aktif' : 'Aktif';
        
        return $this->update($id, array('status' => $new_status));
    }

    /**
     * Check if urusan name is duplicate
     * @param string $name
     * @param int $exclude_id - ID to exclude from check (for updates)
     * @return bool
     */
    private function is_duplicate_name($name, $exclude_id = null)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('LOWER(urusan)', strtolower($name));
        
        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }
        
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

    /**
     * Check if urusan kode is duplicate
     * @param string $kode
     * @param int $exclude_id - ID to exclude from check (for updates)
     * @return bool
     */
    private function is_duplicate_kode($kode, $exclude_id = null)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('LOWER(kode)', strtolower($kode));
        
        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }
        
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

    /**
     * Check if urusan is being used in other tables
     * @param int $id
     * @return bool
     */
    private function is_urusan_used($id)
    {
        // Check in master_program table (if exists)
        $this->db->select('id');
        $this->db->from('master_program');
        $this->db->where('urusan_id', $id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return true;
        }

        // Add more checks for other related tables as needed
        // Example: activities, sub-activities, etc.
        
        return false;
    }

    /**
     * Get urusan statistics
     * @return array
     */
    public function get_statistics()
    {
        $stats = array();
        
        // Total count
        $this->db->select('COUNT(*) as total');
        $this->db->from($this->table);
        $query = $this->db->get();
        $stats['total'] = $query->row()->total;
        
        // Active count
        $this->db->select('COUNT(*) as active');
        $this->db->from($this->table);
        $this->db->where('status', 'Aktif');
        $query = $this->db->get();
        $stats['active'] = $query->row()->active;
        
        // Inactive count
        $stats['inactive'] = $stats['total'] - $stats['active'];
        
        // Count by fungsi
        $this->db->select('f.namafungsi, COUNT(mu.id) as count');
        $this->db->from($this->table . ' mu');
        $this->db->join('fungsi f', 'mu.fungsi_id = f.id', 'left');
        $this->db->group_by('f.id, f.namafungsi');
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get();
        $stats['by_fungsi'] = $query->result();
        
        return $stats;
    }

    /**
     * Search urusan by name or kode
     * @param string $search_term
     * @return array
     */
    public function search($search_term)
    {
        $this->db->select('mu.*, f.namafungsi');
        $this->db->from($this->table . ' mu');
        $this->db->join('fungsi f', 'mu.fungsi_id = f.id', 'left');
        $this->db->like('mu.namaurusan', $search_term);
        $this->db->or_like('mu.kode', $search_term);
        $this->db->or_like('f.namafungsi', $search_term);
        $this->db->order_by('mu.kode', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get urusan by fungsi_id
     * @param int $fungsi_id
     * @return array
     */
    public function get_by_fungsi($fungsi_id)
    {
        $this->db->select('mu.*, f.namafungsi');
        $this->db->from($this->table . ' mu');
        $this->db->join('fungsi f', 'mu.fungsi_id = f.id', 'left');
        $this->db->where('mu.fungsi_id', $fungsi_id);
        $this->db->where('mu.status', 'Aktif');
        $this->db->order_by('mu.kode', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Create database table if not exists
     * @return bool
     */
    public function create_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->table}` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `namaurusan` varchar(100) NOT NULL,
            `kode` varchar(20) DEFAULT NULL,
            `fungsi_id` int(11) DEFAULT NULL,
            `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
            `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY `unique_namaurusan` (`namaurusan`),
            UNIQUE KEY `unique_kode` (`kode`),
            KEY `idx_status` (`status`),
            KEY `idx_fungsi_id` (`fungsi_id`),
            CONSTRAINT `fk_urusan_fungsi` FOREIGN KEY (`fungsi_id`) REFERENCES `fungsi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        return $this->db->query($sql);
    }

    /**
     * Insert sample data
     * @return bool
     */
    public function insert_sample_data()
    {
        // First, get some fungsi IDs
        $this->db->select('id');
        $this->db->from('fungsi');
        $this->db->where('status', 'Aktif');
        $this->db->limit(5);
        $fungsi_query = $this->db->get();
        $fungsi_ids = array();
        
        foreach ($fungsi_query->result() as $fungsi) {
            $fungsi_ids[] = $fungsi->id;
        }

        if (empty($fungsi_ids)) {
            return false; // No fungsi available
        }

        $sample_data = array(
            array(
                'namaurusan' => 'Urusan Kesehatan',
                'kode' => '01',
                'fungsi_id' => $fungsi_ids[0] ?? null,
                'status' => 'Aktif'
            ),
            array(
                'namaurusan' => 'Urusan Pendidikan',
                'kode' => '02',
                'fungsi_id' => $fungsi_ids[1] ?? null,
                'status' => 'Aktif'
            ),
            array(
                'namaurusan' => 'Urusan Pekerjaan Umum dan Penataan Ruang',
                'kode' => '03',
                'fungsi_id' => $fungsi_ids[2] ?? null,
                'status' => 'Aktif'
            ),
            array(
                'namaurusan' => 'Urusan Perumahan dan Kawasan Permukiman',
                'kode' => '04',
                'fungsi_id' => $fungsi_ids[3] ?? null,
                'status' => 'Aktif'
            ),
            array(
                'namaurusan' => 'Urusan Ketentraman dan Ketertiban Umum',
                'kode' => '05',
                'fungsi_id' => $fungsi_ids[4] ?? null,
                'status' => 'Tidak Aktif'
            )
        );

        foreach ($sample_data as $data) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            
            // Check if already exists
            if (!$this->is_duplicate_name($data['namaurusan']) && 
                (empty($data['kode']) || !$this->is_duplicate_kode($data['kode']))) {
                $this->db->insert($this->table, $data);
            }
        }

        return true;
    }
}
