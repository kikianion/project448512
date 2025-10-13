<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	protected $defaultName = 'xxx';
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('url', 'form', 'text', 'log2', 'common'));
		$this->load->library(array('session'));

		// $this->data['site_title'] = 'Simela Gen2';
		$this->data['user'] = $this->session->userdata('user') ?: null;


		// Check if user is logged in and has admin privileges
		if (!$this->session->userdata('logged_in')) {
			// redirect('login');
		}

		// Check admin role (you can modify this based on your user roles)
		if ($this->session->userdata('role') !== 'admin') {
			// show_error('Access denied. Admin privileges required.', 403);
		}


		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('user_agent');

	}

	public function flash($key, $val)
	{
		$this->session->set_flashdata($key, $val);
	}

	public function redirectBack()
	{
		redirect($this->agent->referrer());
	}
	// function getFullTableName($partialName, $sqlContent)
	// {
	// 	// Initialize variable to store the full table name
	// 	$fullTableName = null;

	// 	// Split the SQL content into lines
	// 	$lines = explode("\n", $sqlContent);

	// 	// Regular expression to match CREATE TABLE statements
	// 	$pattern = "/CREATE TABLE\s+`?([^`]+)`?\s*\(/i";

	// 	// Iterate through each line to find CREATE TABLE statements
	// 	foreach ($lines as $line) {
	// 		if (preg_match($pattern, $line, $matches)) {
	// 			$tableName = trim($matches[1]);
	// 			// Check if the partial name is contained in the table name
	// 			if (stripos($tableName, $partialName) !== false) {
	// 				$fullTableName = $tableName;
	// 				break;
	// 			}
	// 		}
	// 	}

	// 	return $fullTableName;
	// }

	public function columns($table_name = '')
	{
		// Check if table name is provided
		if (empty($table_name)) {
			$response = array(
				'status' => 'error',
				'message' => 'Table name is required'
			);
			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}

		// Verify if table exists
		if (!$this->db->table_exists($table_name)) {
			$response = array(
				'status' => 'error',
				'message' => 'Table does not exist'
			);
			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}

		try {
			// Get basic column information using CodeIgniter's field_data
			$columns = $this->db->field_data($table_name);

			// Get detailed schema information using SHOW COLUMNS for validation and not_null
			$show_query = $this->db->query("SHOW COLUMNS FROM `$table_name`");
			$show_columns = $show_query->result_array();

			// Create a map for quick lookup by field name
			$show_map = [];
			foreach ($show_columns as $row) {
				$show_map[$row['Field']] = $row;
			}

			// Generate validation rules using the SHOW COLUMNS data
			$validation_rules = $this->generateValidationRules($show_columns);

			// Prepare column details
			$column_data = array();
			foreach ($columns as $column) {
				$show_row = isset($show_map[$column->name]) ? $show_map[$column->name] : null;
				if (!$show_row) {
					continue;
				}

				$not_null = ($show_row['Null'] == 'NO');

				// Find validation rules for this column
				$column_validation = array();
				foreach ($validation_rules as $rule) {
					if ($rule[0] === $column->name) {
						$column_validation = array(
							'field' => $rule[0],
							'label' => $rule[1],
							'rules' => $rule[2]
						);
						break;
					}
				}

				$column_data[] = array(
					'name' => $column->name,
					'type' => $column->type,
					'max_length' => $column->max_length,
					'primary_key' => $column->primary_key,
					'default' => $column->default,
					'not_null' => $not_null,
					'validation' => $column_validation
				);
			}

			return $column_data;

		} catch (Exception $e) {
			$response = array(
				'status' => 'error',
				'message' => 'Error retrieving columns: ' . $e->getMessage()
			);

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}

	protected function generateValidationRules($show_columns)
	{
		$rules = [];

		foreach ($show_columns as $row) {
			$field = $row['Field'];
			$type = $row['Type'];
			$is_not_null = ($row['Null'] == 'NO');
			$default_val = $row['Default'];
			$has_default = ($default_val !== null && $default_val !== 'NULL');
			$is_auto_increment = (stripos($row['Extra'], 'AUTO_INCREMENT') !== false);

			if ($is_auto_increment) {
				continue;
			}

			$rule_parts = [];

			// Type-based rules
			if (preg_match('/varchar\((\d+)\)/i', $type, $tm)) {
				$rule_parts[] = 'max_length[' . $tm[1] . ']';
			} elseif (preg_match('/int/i', $type)) {
				$rule_parts[] = 'integer';
			}
			// Add more type handlers as needed

			// Required rule
			if ($is_not_null && !$has_default) {
				array_unshift($rule_parts, 'required');
			}

			if (!empty($rule_parts)) {
				$label = ucwords(str_replace('_', ' ', $field));
				$rules[] = [$field, $label, implode('|', $rule_parts)];
			}
		}

		return $rules;
	}

	function tabel_fk_display($f,$val){
		$val2 = "*" . $val;
		$table2 = substr($f, 0, strpos($f, '___'));
		$table_id2 = real_table_name($table2);
		$rows2 = $GLOBALS[$table_id2];

		$pos2 = strrpos($f, '___');
		$nameField = substr($f, $pos2 +3);

		foreach ($rows2 as $r2) {
			if ($r2['id'] == $val) {
				$val2 = $r2[$nameField];
				break;
			}
		}
		return ___("fk:" . $table_id2) . $val2;

	}
	function expandTableCard($table_name)
	{
		$table_id = real_table_name($table_name);
		$rows = $GLOBALS[$table_id];
		?>
		<?php if (!empty($rows)):
			foreach ($rows as $r): ?>
				<tr>
					<?php
					foreach ($r as $k => $col) {
						if ($k == "id")
							continue;
						?>
						<td><?= ___($k) ?>
							<?php
							if (strpos($k, '___') == false) {
								echo $col;

							} else {
								echo $this->tabel_fk_display($k,$col);
							}
							?>
						</td>
						<?php
					}
					?>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default">Tindakan</button>
							<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
								<span class="sr-only"></span>
							</button>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-mitra" onclick="editModal('<?= $table_name ?>',<?= $r['id'] ?>)">Edit</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= site_url('handler/set_status/' . $table_name . '/' . $r['id']) ?>">Ubah Status</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach;
		else: ?>
			<tr>
				<td colspan="8">Tidak ada <?= $table_name ?>.
				</td>
			</tr>
		<?php endif;

	}

}























