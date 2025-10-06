<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Authenticate user with email and password
     * @param string $email
     * @param string $password
     * @return object|false
     */
    public function authenticate($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('status', 'active'); // Only active users
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            
            // Verify password (assuming passwords are hashed)
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        
        return false;
    }

    /**
     * Get user by ID
     * @param int $id
     * @return object|false
     */
    public function get_user($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return false;
    }

    /**
     * Create new user
     * @param array $data
     * @return int|false
     */
    public function create_user($data)
    {
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        if ($this->db->insert('user', $data)) {
            return $this->db->insert_id();
        }
        
        return false;
    }

    /**
     * Update user
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_user($id, $data)
    {
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    /**
     * Check if email exists
     * @param string $email
     * @return bool
     */
    public function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        
        return $query->num_rows() > 0;
    }
}
