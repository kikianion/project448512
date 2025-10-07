<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMasterFungsi extends MY_Model {

    protected $table = 'fungsi';
    // protected $primary_key = 'id';


    /**
     * Get all fungsi records
     * @param string $status - Filter by status (optional)
     * @return array
     */
    // public function get_all($status = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->table);
        
    //     if ($status !== null) {
    //         $this->db->where('status', $status);
    //     }
        
    //     $this->db->order_by('urut', 'ASC');
    //     $this->db->order_by('namafungsi', 'ASC');
        
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // /**
    //  * Get fungsi by ID
    //  * @param int $id
    //  * @return object|null
    //  */
    // public function get_by_id($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->table);
    //     $this->db->where($this->primary_key, $id);
        
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    /**
     * Get active fungsi for dropdown
     * @return array
     */
    // public function get_active()
    // {
    //     return $this->get_all('Aktif');
    // }

    // /**
    //  * Insert new fungsi
    //  * @param array $data
    //  * @return bool|int - Returns insert ID on success, false on failure
    //  */
    // public function insert($data)
    // {
    //     // Set default values
    //     $insert_data = array(
    //         'namafungsi' => $data['namafungsi'],
    //         'urut' => isset($data['urut']) ? (int)$data['urut'] : $this->get_next_urut(),
    //         'status' => 'Aktif',
    //     );

    //     // Validate required fields
    //     if (empty($insert_data['namafungsi'])) {
    //         return false;
    //     }

    //     // Check for duplicate name
    //     if ($this->is_duplicate_name($insert_data['namafungsi'])) {
    //         return false;
    //     }

    //     $this->db->insert($this->table, $insert_data);
        
    //     if ($this->db->affected_rows() > 0) {
    //         return $this->db->insert_id();
    //     }
        
    //     return false;
    // }

    /**
     * Update fungsi
     * @param int $id
     * @param array $data
     * @return bool
     */
    // public function update($id, $data)
    // {
    //     // Only update fields that are provided
    //     if (isset($data['namafungsi'])) {
    //         $update_data['namafungsi'] = $data['namafungsi'];
    //     }
       
    //     if (isset($data['urut'])) {
    //         $update_data['urut'] = (int)$data['urut'];
    //     }
        
    //     if (isset($data['status'])) {
    //         $update_data['status'] = $data['status'];
    //     }

    //     // Validate required fields
    //     if (isset($update_data['namafungsi']) && empty($update_data['namafungsi'])) {
    //         return false;
    //     }

    //     // Check for duplicate name (excluding current record)
    //     if (isset($update_data['namafungsi']) && $this->is_duplicate_name($update_data['namafungsi'], $id)) {
    //         return false;
    //     }

    //     $this->db->where($this->primary_key, $id);
    //     $this->db->update($this->table, $update_data);
        
    //     return $this->db->affected_rows() > 0;
    // }

    /**
     * Delete fungsi
     * @param int $id
     * @return bool
     */
    // public function delete($id)
    // {
    //     // Check if fungsi is being used in other tables
    //     if ($this->is_fungsi_used($id)) {
    //         return false;
    //     }

    //     $this->db->where($this->primary_key, $id);
    //     $this->db->delete($this->table);
        
    //     return $this->db->affected_rows() > 0;
    // }

    /**
     * Toggle status (Aktif/Tidak Aktif)
     * @param int $id
     * @return bool
     */
    // public function toggle_status($id)
    // {
    //     $current = $this->get_by_id($id);
        
    //     if (!$current) {
    //         return false;
    //     }

    //     $new_status = ($current->status === 'Aktif') ? 'Tidak Aktif' : 'Aktif';
        
    //     return $this->update($id, array('status' => $new_status));
    // }

    /**
     * Check if fungsi name is duplicate
     * @param string $name
     * @param int $exclude_id - ID to exclude from check (for updates)
     * @return bool
     */
    // private function is_duplicate_name($name, $exclude_id = null)
    // {
    //     $this->db->select('id');
    //     $this->db->from($this->table);
    //     $this->db->where('LOWER(namafungsi)', strtolower($name));
        
    //     if ($exclude_id !== null) {
    //         $this->db->where('id !=', $exclude_id);
    //     }
        
    //     $query = $this->db->get();
    //     return $query->num_rows() > 0;
    // }

    /**
     * Check if fungsi is being used in other tables
     * @param int $id
     * @return bool
     */
    // private function is_fungsi_used($id)
    // {
    //     // Check in master_urusan table
    //     $this->db->select('id');
    //     $this->db->from('master_urusan');
    //     $this->db->where('fungsi_id', $id);
    //     $query = $this->db->get();
        
    //     if ($query->num_rows() > 0) {
    //         return true;
    //     }

    //     // Add more checks for other related tables as needed
    //     // Example: programs, activities, etc.
        
    //     return false;
    // }

    /**
     * Get next available urut number
     * @return int
     */
    // private function get_next_urut()
    // {
    //     $this->db->select_max('urut');
    //     $this->db->from($this->table);
    //     $query = $this->db->get();
    //     $result = $query->row();
        
    //     return ($result->urut !== null) ? $result->urut + 1 : 1;
    // }



}
