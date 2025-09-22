<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmData extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Data_model');
        $this->load->library('upload');
        $this->load->library('zip');
        
        // Check if user is logged in
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
        $this->load->view('admin/admdata_dashboard');
        // redirect('admdata/dashboard');
    }

    public function dashboard()
    {
        $data['title'] = 'Administrasi Data';
        $data['user'] = $this->session->userdata();
        
        // Get data statistics
        $data['total_records'] = $this->Data_model->get_total_records();
        $data['recent_imports'] = $this->Data_model->get_recent_imports(5);
        $data['backup_files'] = $this->Data_model->get_backup_files();
        $data['data_quality'] = $this->Data_model->get_data_quality_stats();
        
        $this->load->view('admin/admdata_dashboard', $data);
    }

    public function import()
    {
        $data['title'] = 'Import Data';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('import_type', 'Tipe Import', 'required|in_list[excel,csv,json]');
            $this->form_validation->set_rules('data_table', 'Tabel Data', 'required');
            
            if ($this->form_validation->run() === TRUE) {
                $config['upload_path'] = './uploads/import/';
                $config['allowed_types'] = 'xlsx|xls|csv|json';
                $config['max_size'] = 10240; // 10MB
                $config['encrypt_name'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('import_file')) {
                    $upload_data = $this->upload->data();
                    $import_type = $this->input->post('import_type');
                    $data_table = $this->input->post('data_table');
                    
                    $result = $this->Data_model->import_data($upload_data['full_path'], $import_type, $data_table);
                    
                    if ($result['success']) {
                        $this->session->set_flashdata('success', "Data berhasil diimport. {$result['imported']} record berhasil diproses.");
                    } else {
                        $this->session->set_flashdata('error', "Gagal mengimport data: " . $result['message']);
                    }
                    
                    // Clean up uploaded file
                    unlink($upload_data['full_path']);
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengupload file: ' . $this->upload->display_errors());
                }
            }
        }
        
        $data['available_tables'] = $this->Data_model->get_available_tables();
        $this->load->view('admin/admdata_import', $data);
    }

    public function export()
    {
        $data['title'] = 'Export Data';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('export_type', 'Tipe Export', 'required|in_list[excel,csv,json]');
            $this->form_validation->set_rules('data_table', 'Tabel Data', 'required');
            $this->form_validation->set_rules('date_from', 'Tanggal Mulai', 'valid_date');
            $this->form_validation->set_rules('date_to', 'Tanggal Akhir', 'valid_date');
            
            if ($this->form_validation->run() === TRUE) {
                $export_type = $this->input->post('export_type');
                $data_table = $this->input->post('data_table');
                $date_from = $this->input->post('date_from');
                $date_to = $this->input->post('date_to');
                $filters = array(
                    'date_from' => $date_from,
                    'date_to' => $date_to
                );
                
                $result = $this->Data_model->export_data($data_table, $export_type, $filters);
                
                if ($result['success']) {
                    $this->session->set_flashdata('success', 'Data berhasil diexport. File akan didownload.');
                    // Force download
                    force_download($result['filename'], $result['data']);
                } else {
                    $this->session->set_flashdata('error', "Gagal mengexport data: " . $result['message']);
                }
            }
        }
        
        $data['available_tables'] = $this->Data_model->get_available_tables();
        $this->load->view('admin/admdata_export', $data);
    }

    public function backup()
    {
        $data['title'] = 'Backup Data';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $backup_type = $this->input->post('backup_type');
            $include_data = $this->input->post('include_data') ? true : false;
            
            $result = $this->Data_model->create_backup($backup_type, $include_data);
            
            if ($result['success']) {
                $this->session->set_flashdata('success', "Backup berhasil dibuat: {$result['filename']}");
            } else {
                $this->session->set_flashdata('error', "Gagal membuat backup: " . $result['message']);
            }
        }
        
        $data['backup_files'] = $this->Data_model->get_backup_files();
        $this->load->view('admin/admdata_backup', $data);
    }

    public function restore()
    {
        $data['title'] = 'Restore Data';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $backup_file = $this->input->post('backup_file');
            
            if ($backup_file) {
                $result = $this->Data_model->restore_backup($backup_file);
                
                if ($result['success']) {
                    $this->session->set_flashdata('success', 'Data berhasil direstore dari backup.');
                } else {
                    $this->session->set_flashdata('error', "Gagal restore data: " . $result['message']);
                }
            } else {
                $this->session->set_flashdata('error', 'Pilih file backup yang akan direstore.');
            }
        }
        
        $data['backup_files'] = $this->Data_model->get_backup_files();
        $this->load->view('admin/admdata_restore', $data);
    }

    public function cleanup()
    {
        $data['title'] = 'Pembersihan Data';
        $data['user'] = $this->session->userdata();
        
        if ($this->input->method() === 'post') {
            $cleanup_type = $this->input->post('cleanup_type');
            $days_old = $this->input->post('days_old');
            
            $result = $this->Data_model->cleanup_data($cleanup_type, $days_old);
            
            if ($result['success']) {
                $this->session->set_flashdata('success', "Pembersihan berhasil: {$result['deleted']} record dihapus.");
            } else {
                $this->session->set_flashdata('error', "Gagal membersihkan data: " . $result['message']);
            }
        }
        
        $data['cleanup_stats'] = $this->Data_model->get_cleanup_stats();
        $this->load->view('admin/admdata_cleanup', $data);
    }

    public function statistics()
    {
        $data['title'] = 'Statistik Data';
        $data['user'] = $this->session->userdata();
        
        $data['table_stats'] = $this->Data_model->get_table_statistics();
        $data['growth_stats'] = $this->Data_model->get_growth_statistics();
        $data['quality_stats'] = $this->Data_model->get_data_quality_stats();
        
        $this->load->view('admin/admdata_statistics', $data);
    }

    public function download_backup($filename)
    {
        $file_path = './backups/' . $filename;
        
        if (file_exists($file_path)) {
            force_download($filename, file_get_contents($file_path));
        } else {
            show_404();
        }
    }

    public function delete_backup($filename)
    {
        $file_path = './backups/' . $filename;
        
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                $this->session->set_flashdata('success', 'File backup berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus file backup.');
            }
        } else {
            $this->session->set_flashdata('error', 'File backup tidak ditemukan.');
        }
        
        redirect('admdata/backup');
    }
}
