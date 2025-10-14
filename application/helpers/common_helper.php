<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('expandFieldAttr')) {
	function expandFieldAttr($f)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$res = htmlspecialchars(isset($flash[$f]) ? $flash[$f] : "");
		return <<<EOD
		name="$f" value="$res"
EOD;
	}
}

if (!function_exists('getNameById')) {
	function getNameById($id, $objs, $nameField)
	{
		if (!empty($objs)) {
			foreach ($objs as $o) {
				if ($id == $o->id) {
					$res = $o->$nameField;
					return $res;
				}
			}
		}
		return "(" . $id . ")";

	}
}

if (!function_exists('expandFieldAttrSelectActive')) {
	function expandFieldAttrSelectActive($f)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$currentVal = isset($flash[$f]) ? $flash[$f] : "";

		$pos1 = strrpos($f, '___');
		$nameField = substr($f, $pos1 + 3);

		$master_table = substr($f, 0, strpos($f, '___'));
		$real1 = real_table_name($master_table);
		$objs = $GLOBALS[$real1];
		$res = <<<EOD
			<select name="$f" class="form-control" required>
				<option value="">Pilih salah satu $nameField yang Aktif</option>
		EOD;

		if (!empty($objs)) {
			foreach ($objs as $m) {
				if ($m['status'] == 'Aktif') {
					$m_id = $m['id'];
					$isSelected = $m_id == $currentVal ? 'selected' : '';
					$namaVal = $m[$nameField];
					$res .= <<<EOD
					<option value="$m_id" $isSelected>
						$namaVal
					</option>
					EOD;

				}
			}
		}

		$res .= <<<EOD
			</select>
		EOD;


		return $res;
	}

	function get_database_tables()
	{
		$tables = array();

		try {
			// Get CodeIgniter instance
			$CI =& get_instance();

			// Load database if not already loaded
			if (!isset($CI->db)) {
				$CI->load->database();
			}

			// Get database connection details from CodeIgniter config
			$host = $CI->db->hostname;
			$dbname = $CI->db->database;
			$username = $CI->db->username;
			$password = $CI->db->password;

			// Create PDO connection
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Query to get all table names
			$query = "SHOW TABLES";
			$stmt = $pdo->query($query);

			// Fetch table names into array
			$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

			// Close PDO connection
			$pdo = null;

		} catch (PDOException $e) {
			log_message('error', 'Database Helper - Connection failed: ' . $e->getMessage());
			return array(); // Return empty array on failure
		}

		return $tables;
	}
}
function real_table_name($s)
{
	// $file_path = APPPATH . '../_db/simela-gen2.sql';
	// if (!file_exists($file_path)) {
	// 	echo json_encode(['error' => 'File not found']);
	// 	return;
	// }
	// $sqlContent = file_get_contents($file_path);
	// $fullTableName = $s;

	// $lines = explode("\n", $sqlContent);

	// $pattern = "/CREATE TABLE\s+`?([^`]+)`?\s*\(/i";

	// Iterate through each line to find CREATE TABLE statements
	// foreach ($lines as $line) {
	// 	if (preg_match($pattern, $line, $matches)) {
	// 		$tableName = trim($matches[1]);
	// 		// Check if the partial name is contained in the table name
	// 		if (stripos($tableName, $s) !== false) {
	// 			$fullTableName = $tableName;
	// 			break;
	// 		}
	// 	}
	// }
	$fullTableName = $s;

	$tables = get_database_tables();
	foreach ($tables as $table) {
		if (stripos($table, $s) !== false) {
			$fullTableName = $table;
			break;
		}
	}

	return $fullTableName;

}
