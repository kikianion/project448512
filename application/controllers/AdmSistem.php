<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmSistem extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    $this->load->model('Visi_model');
        
        // Check if user is logged in and has admin privileges
        if (!$this->session->userdata('logged_in')) {
            // redirect('login');
        }
        
        // Check admin role (you can modify this based on your user roles)
        if ($this->session->userdata('role') !== 'admin') {
            // show_error('Access denied. Admin privileges required.', 403);
        }
    }

    public function index()
    {
        $data['title'] = 'Administrasi Sistem';
        // load visi list for the view
        $data['visi_list'] = $this->Visi_model->get_all();
        // $data['user'] = $this->session->userdata();
        
        // Get system statistics
        // $data['total_users'] = $this->Admin_model->get_total_users();
        // $data['active_users'] = $this->Admin_model->get_active_users();
        // $data['system_logs'] = $this->Admin_model->get_recent_logs(10);
        
        // $this->load->view('admin/dashboard', $data);
        $this->load->view('administrator/admsistem', $data);
    }

    /**
     * Handle POST to save visi
     */
    public function save_visi()
    {
        if ($this->input->method() !== 'post') {
            show_error('Method not allowed', 405);
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('visi', 'Visi', 'required|max_length[500]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admsistem');
            return;
        }

        $visi_text = $this->input->post('visi');
        $inserted = $this->Visi_model->insert($visi_text);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Visi berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan visi.');
        }

        redirect('admsistem');
    }

    public function users()
    {
        $data['title'] = 'Manajemen Pengguna';
        $data['users'] = $this->Admin_model->get_all_users();
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/users', $data);
    }

    public function create_user()
    {
        $data['title'] = 'Tambah Pengguna Baru';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,mitra]');
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
            
            if ($this->form_validation->run() === TRUE) {
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role'),
                    'full_name' => $this->input->post('full_name'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                );
                
                if ($this->Admin_model->create_user($user_data)) {
                    $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan pengguna.');
                }
            }
        }
        
        $this->load->view('admin/create_user', $data);
    }

    public function edit_user($id)
    {
        $data['title'] = 'Edit Pengguna';
        $data['user'] = $this->session->userdata();
        $data['edit_user'] = $this->Admin_model->get_user_by_id($id);
        
        if (!$data['edit_user']) {
            show_404();
        }
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,mitra]');
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
            
            if ($this->form_validation->run() === TRUE) {
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role'),
                    'full_name' => $this->input->post('full_name'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                // Only update password if provided
                if ($this->input->post('password')) {
                    $user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }
                
                if ($this->Admin_model->update_user($id, $user_data)) {
                    $this->session->set_flashdata('success', 'Pengguna berhasil diperbarui.');
                    redirect('admin/users');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui pengguna.');
                }
            }
        }
        
        $this->load->view('admin/edit_user', $data);
    }

    public function delete_user($id)
    {
        if ($this->Admin_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
        }
        
        redirect('admin/users');
    }

    public function settings()
    {
        $data['title'] = 'Pengaturan Sistem';
        $data['user'] = $this->session->userdata();
        $data['settings'] = $this->Admin_model->get_system_settings();
        
        if ($this->input->method() === 'post') {
            $settings_data = array(
                'site_name' => $this->input->post('site_name'),
                'site_description' => $this->input->post('site_description'),
                'maintenance_mode' => $this->input->post('maintenance_mode') ? 1 : 0,
                'max_login_attempts' => $this->input->post('max_login_attempts'),
                'session_timeout' => $this->input->post('session_timeout')
            );
            
            if ($this->Admin_model->update_system_settings($settings_data)) {
                $this->session->set_flashdata('success', 'Pengaturan berhasil diperbarui.');
                redirect('admin/settings');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui pengaturan.');
            }
        }
        
        $this->load->view('admin/settings', $data);
    }

    public function logs()
    {
        $data['title'] = 'Log Sistem';
        $data['user'] = $this->session->userdata();
        
        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/logs');
        $config['total_rows'] = $this->Admin_model->get_logs_count();
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['logs'] = $this->Admin_model->get_logs($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('admin/logs', $data);
    }

    public function toggle_user_status($id)
    {
        $user = $this->Admin_model->get_user_by_id($id);
        if ($user) {
            $new_status = $user->is_active ? 0 : 1;
            if ($this->Admin_model->update_user($id, array('is_active' => $new_status))) {
                $status_text = $new_status ? 'diaktifkan' : 'dinonaktifkan';
                $this->session->set_flashdata('success', "Pengguna berhasil {$status_text}.");
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah status pengguna.');
            }
        }
        
        redirect('admin/users');
    }
}
