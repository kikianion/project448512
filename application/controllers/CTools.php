<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTools extends MY_Controller
{

	public function list_tables()
	{
		$this->index();
	}

	public function index() {
        // Read the SQL file from application/_db/simela-gen2.sql.txt
        $file_path = APPPATH . '../_db/simela-gen2.sql';
        if (!file_exists($file_path)) {
            echo json_encode(['error' => 'File not found']);
            return;
        }
        $sql = file_get_contents($file_path);

        // Parse the SQL content
        $lines = explode("\n", $sql);
        $tables = array();
        $current_table = null;

        foreach ($lines as $line) {
            $line = trim($line);
            if (strpos($line, 'CREATE TABLE') === 0) {
                if (preg_match("/CREATE TABLE `([^`]+)`/", $line, $matches)) {
                    $current_table = $matches[1];
                    $tables[$current_table] = [
                        'comment' => '',
                        'columns' => []
                    ];
                }
            } elseif ($current_table && strpos($line, '`') === 0) {
                if (preg_match("/`([^`]+)`\s+([^ ,]+)/", $line, $matches)) {
                    $col = $matches[1];
                    $type = $matches[2];
                    $modifier = '';
                    $comment = '';

                    // Extract modifiers and column comment
                    if (preg_match("/`[^`]+`\s+[^ ]+\s*(.*?)(COMMENT\s*'.*?')?,?$/", $line, $mod_matches)) {
                        $modifier = trim($mod_matches[1], ',');
                        $comment = isset($mod_matches[2]) ? trim(str_replace("COMMENT '", '', rtrim($mod_matches[2], "'"))) : '';
                    } elseif (preg_match("/`[^`]+`\s+[^ ]+\s*(.*?),?$/", $line, $mod_matches)) {
                        $modifier = trim($mod_matches[1], ',');
                    }

                    $tables[$current_table]['columns'][$col] = [
                        'type' => $type,
                        'modifier' => $modifier,
                        'comment' => $comment
                    ];
                }
            } elseif ($current_table && strpos($line, ')') === 0) {
                // Parse table comment
                if (preg_match("/COMMENT\s*=\s*'(.*?)'/", $line, $comment_matches)) {
                    $tables[$current_table]['comment'] = $comment_matches[1];
                }
                $current_table = null;
            }
        }

        // Return the array as JSON
        echo json_encode($tables);
    }




}
