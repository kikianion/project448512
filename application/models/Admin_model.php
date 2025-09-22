<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function get_total_users()
    {
        return $this->db->count_all('users');
    }

    public function get_active_users()
    {
        $this->db->where('is_active', 1);
        return $this->db->count_all_results('users');
    }

    public function get_system_settings()
    {
        $this->db->select('*');
        $this->db->from('system_settings');
        $result = $this->db->get()->row();
        
        // Return default settings if none exist
        if (!$result) {
            return (object) array(
                'site_name' => 'Simela Gen2',
                'site_description' => 'Sistem Pemantauan Simela Generasi 2.0',
                'maintenance_mode' => 0,
                'max_login_attempts' => 5,
                'session_timeout' => 3600
            );
        }
        
        return $result;
    }

    public function update_system_settings($data)
    {
        // Check if settings exist
        $existing = $this->db->get('system_settings')->row();
        
        if ($existing) {
            return $this->db->update('system_settings', $data);
        } else {
            return $this->db->insert('system_settings', $data);
        }
    }

    public function get_recent_logs($limit = 10)
    {
        $this->db->select('*');
        $this->db->from('system_logs');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_logs($limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('system_logs');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function get_logs_count()
    {
        return $this->db->count_all('system_logs');
    }

    public function log_activity($user_id, $action, $description = '')
    {
        $log_data = array(
            'user_id' => $user_id,
            'action' => $action,
            'description' => $description,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'created_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->insert('system_logs', $log_data);
    }

    public function get_user_statistics()
    {
        $stats = array();
        
        // Total users by role
        $this->db->select('role, COUNT(*) as count');
        $this->db->from('users');
        $this->db->group_by('role');
        $role_stats = $this->db->get()->result();
        
        foreach ($role_stats as $stat) {
            $stats['by_role'][$stat->role] = $stat->count;
        }
        
        // Active vs Inactive users
        $this->db->select('is_active, COUNT(*) as count');
        $this->db->from('users');
        $this->db->group_by('is_active');
        $status_stats = $this->db->get()->result();
        
        foreach ($status_stats as $stat) {
            $stats['by_status'][$stat->is_active ? 'active' : 'inactive'] = $stat->count;
        }
        
        // Users created this month
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $stats['this_month'] = $this->db->count_all_results('users');
        
        return $stats;
    }
}
