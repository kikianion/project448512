<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_total_records()
    {
        $tables = $this->get_available_tables();
        $total = 0;
        
        foreach ($tables as $table) {
            $total += $this->db->count_all($table);
        }
        
        return $total;
    }

    public function get_available_tables()
    {
        $tables = array();
        $query = $this->db->query("SHOW TABLES");
        
        foreach ($query->result() as $row) {
            $table_name = array_values((array) $row)[0];
            if (!in_array($table_name, array('ci_sessions', 'migrations'))) {
                $tables[] = $table_name;
            }
        }
        
        return $tables;
    }

    public function get_recent_imports($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('import_logs');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_backup_files()
    {
        $backup_dir = './backups/';
        $files = array();
        
        if (is_dir($backup_dir)) {
            $files = scandir($backup_dir);
            $files = array_filter($files, function($file) {
                return !in_array($file, array('.', '..')) && pathinfo($file, PATHINFO_EXTENSION) === 'sql';
            });
            
            // Sort by modification time (newest first)
            usort($files, function($a, $b) use ($backup_dir) {
                return filemtime($backup_dir . $b) - filemtime($backup_dir . $a);
            });
        }
        
        return $files;
    }

    public function get_data_quality_stats()
    {
        $stats = array();
        $tables = $this->get_available_tables();
        
        foreach ($tables as $table) {
            $total_records = $this->db->count_all($table);
            $null_records = 0;
            
            // Check for null values in common fields
            $columns = $this->db->field_data($table);
            foreach ($columns as $column) {
                if (in_array($column->name, array('name', 'email', 'phone'))) {
                    $this->db->where($column->name . ' IS NULL');
                    $null_records += $this->db->count_all_results($table);
                }
            }
            
            $stats[$table] = array(
                'total' => $total_records,
                'null_records' => $null_records,
                'quality_percentage' => $total_records > 0 ? round((($total_records - $null_records) / $total_records) * 100, 2) : 100
            );
        }
        
        return $stats;
    }

    public function import_data($file_path, $import_type, $table)
    {
        try {
            $imported = 0;
            $errors = array();
            
            switch ($import_type) {
                case 'excel':
                    $result = $this->import_excel($file_path, $table);
                    break;
                case 'csv':
                    $result = $this->import_csv($file_path, $table);
                    break;
                case 'json':
                    $result = $this->import_json($file_path, $table);
                    break;
                default:
                    return array('success' => false, 'message' => 'Tipe import tidak didukung');
            }
            
            if ($result['success']) {
                $imported = $result['imported'];
                
                // Log import activity
                $this->log_import($table, $import_type, $imported);
            }
            
            return $result;
            
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    private function import_excel($file_path, $table)
    {
        // This would require PhpSpreadsheet library
        // For now, return a placeholder
        return array('success' => false, 'message' => 'Import Excel belum diimplementasi. Silakan gunakan CSV.');
    }

    private function import_csv($file_path, $table)
    {
        $imported = 0;
        $errors = array();
        
        if (($handle = fopen($file_path, "r")) !== FALSE) {
            $headers = fgetcsv($handle, 1000, ",");
            
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $row_data = array_combine($headers, $data);
                
                // Add created_at timestamp
                $row_data['created_at'] = date('Y-m-d H:i:s');
                
                if ($this->db->insert($table, $row_data)) {
                    $imported++;
                } else {
                    $errors[] = "Error inserting row: " . $this->db->last_query();
                }
            }
            fclose($handle);
        }
        
        return array(
            'success' => true,
            'imported' => $imported,
            'errors' => $errors
        );
    }

    private function import_json($file_path, $table)
    {
        $imported = 0;
        $errors = array();
        
        $json_data = json_decode(file_get_contents($file_path), true);
        
        if (is_array($json_data)) {
            foreach ($json_data as $row_data) {
                // Add created_at timestamp
                $row_data['created_at'] = date('Y-m-d H:i:s');
                
                if ($this->db->insert($table, $row_data)) {
                    $imported++;
                } else {
                    $errors[] = "Error inserting row: " . $this->db->last_query();
                }
            }
        }
        
        return array(
            'success' => true,
            'imported' => $imported,
            'errors' => $errors
        );
    }

    public function export_data($table, $export_type, $filters = array())
    {
        try {
            $this->db->select('*');
            $this->db->from($table);
            
            // Apply filters
            if (!empty($filters['date_from'])) {
                $this->db->where('created_at >=', $filters['date_from']);
            }
            if (!empty($filters['date_to'])) {
                $this->db->where('created_at <=', $filters['date_to']);
            }
            
            $query = $this->db->get();
            $data = $query->result_array();
            
            $filename = $table . '_export_' . date('Y-m-d_H-i-s') . '.' . $export_type;
            
            switch ($export_type) {
                case 'csv':
                    $csv_data = $this->array_to_csv($data);
                    return array('success' => true, 'filename' => $filename, 'data' => $csv_data);
                case 'json':
                    $json_data = json_encode($data, JSON_PRETTY_PRINT);
                    return array('success' => true, 'filename' => $filename, 'data' => $json_data);
                default:
                    return array('success' => false, 'message' => 'Tipe export tidak didukung');
            }
            
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    private function array_to_csv($data)
    {
        if (empty($data)) return '';
        
        $output = fopen('php://temp', 'r+');
        
        // Write headers
        fputcsv($output, array_keys($data[0]));
        
        // Write data
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        
        rewind($output);
        $csv = stream_get_contents($output);
        fclose($output);
        
        return $csv;
    }

    public function create_backup($backup_type, $include_data = true)
    {
        try {
            $backup_dir = './backups/';
            if (!is_dir($backup_dir)) {
                mkdir($backup_dir, 0755, true);
            }
            
            $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
            $file_path = $backup_dir . $filename;
            
            if ($backup_type === 'full') {
                $this->create_full_backup($file_path, $include_data);
            } else {
                $this->create_table_backup($file_path, $include_data);
            }
            
            return array('success' => true, 'filename' => $filename);
            
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    private function create_full_backup($file_path, $include_data)
    {
        $tables = $this->get_available_tables();
        $backup_content = "-- Database Backup\n";
        $backup_content .= "-- Generated: " . date('Y-m-d H:i:s') . "\n\n";
        
        foreach ($tables as $table) {
            $backup_content .= "-- Table structure for table `$table`\n";
            $backup_content .= "DROP TABLE IF EXISTS `$table`;\n";
            
            $create_table = $this->db->query("SHOW CREATE TABLE `$table`")->row_array();
            $backup_content .= $create_table['Create Table'] . ";\n\n";
            
            if ($include_data) {
                $backup_content .= "-- Data for table `$table`\n";
                $data = $this->db->get($table)->result_array();
                
                if (!empty($data)) {
                    $columns = array_keys($data[0]);
                    $backup_content .= "INSERT INTO `$table` (`" . implode('`, `', $columns) . "`) VALUES\n";
                    
                    $values = array();
                    foreach ($data as $row) {
                        $row_values = array();
                        foreach ($row as $value) {
                            $row_values[] = $this->db->escape($value);
                        }
                        $values[] = "(" . implode(', ', $row_values) . ")";
                    }
                    
                    $backup_content .= implode(",\n", $values) . ";\n\n";
                }
            }
        }
        
        file_put_contents($file_path, $backup_content);
    }

    private function create_table_backup($file_path, $include_data)
    {
        // Simplified table backup
        $this->create_full_backup($file_path, $include_data);
    }

    public function restore_backup($filename)
    {
        try {
            $file_path = './backups/' . $filename;
            
            if (!file_exists($file_path)) {
                return array('success' => false, 'message' => 'File backup tidak ditemukan');
            }
            
            $sql = file_get_contents($file_path);
            $queries = explode(';', $sql);
            
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $this->db->query($query);
                }
            }
            
            return array('success' => true);
            
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    public function cleanup_data($cleanup_type, $days_old)
    {
        try {
            $deleted = 0;
            $cutoff_date = date('Y-m-d H:i:s', strtotime("-{$days_old} days"));
            
            switch ($cleanup_type) {
                case 'logs':
                    $this->db->where('created_at <', $cutoff_date);
                    $deleted = $this->db->count_all_results('system_logs');
                    $this->db->where('created_at <', $cutoff_date);
                    $this->db->delete('system_logs');
                    break;
                    
                case 'sessions':
                    $this->db->where('timestamp <', strtotime($cutoff_date));
                    $deleted = $this->db->count_all_results('ci_sessions');
                    $this->db->where('timestamp <', strtotime($cutoff_date));
                    $this->db->delete('ci_sessions');
                    break;
                    
                case 'import_logs':
                    $this->db->where('created_at <', $cutoff_date);
                    $deleted = $this->db->count_all_results('import_logs');
                    $this->db->where('created_at <', $cutoff_date);
                    $this->db->delete('import_logs');
                    break;
            }
            
            return array('success' => true, 'deleted' => $deleted);
            
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    public function get_cleanup_stats()
    {
        $stats = array();
        
        // Logs older than 30 days
        $this->db->where('created_at <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $stats['old_logs'] = $this->db->count_all_results('system_logs');
        
        // Sessions older than 7 days
        $this->db->where('timestamp <', strtotime('-7 days'));
        $stats['old_sessions'] = $this->db->count_all_results('ci_sessions');
        
        // Import logs older than 30 days
        $this->db->where('created_at <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $stats['old_import_logs'] = $this->db->count_all_results('import_logs');
        
        return $stats;
    }

    public function get_table_statistics()
    {
        $stats = array();
        $tables = $this->get_available_tables();
        
        foreach ($tables as $table) {
            $count = $this->db->count_all($table);
            $size = $this->get_table_size($table);
            
            $stats[$table] = array(
                'records' => $count,
                'size' => $size
            );
        }
        
        return $stats;
    }

    private function get_table_size($table)
    {
        $query = $this->db->query("
            SELECT 
                ROUND(((data_length + index_length) / 1024 / 1024), 2) AS 'Size_MB'
            FROM information_schema.TABLES 
            WHERE table_schema = DATABASE() 
            AND table_name = '$table'
        ");
        
        $result = $query->row();
        return $result ? $result->Size_MB . ' MB' : '0 MB';
    }

    public function get_growth_statistics()
    {
        $stats = array();
        $tables = $this->get_available_tables();
        
        foreach ($tables as $table) {
            // Records created this month
            $this->db->where('MONTH(created_at)', date('m'));
            $this->db->where('YEAR(created_at)', date('Y'));
            $this_month = $this->db->count_all_results($table);
            
            // Records created last month
            $last_month = date('m', strtotime('-1 month'));
            $last_year = date('Y', strtotime('-1 month'));
            $this->db->where('MONTH(created_at)', $last_month);
            $this->db->where('YEAR(created_at)', $last_year);
            $last_month_count = $this->db->count_all_results($table);
            
            $growth = $last_month_count > 0 ? round((($this_month - $last_month_count) / $last_month_count) * 100, 2) : 0;
            
            $stats[$table] = array(
                'this_month' => $this_month,
                'last_month' => $last_month_count,
                'growth_percentage' => $growth
            );
        }
        
        return $stats;
    }

    private function log_import($table, $type, $imported)
    {
        $log_data = array(
            'table_name' => $table,
            'import_type' => $type,
            'records_imported' => $imported,
            'created_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('import_logs', $log_data);
    }
}
