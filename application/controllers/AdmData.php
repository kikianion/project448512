<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdmData extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		// $this->load->helper('flash');
		$this->load->model('Data_model');
		$this->load->model('Master_fungsi_model');
		$this->load->model('Master_urusan_model');
		$this->load->model('Master_program_model');
		$this->load->library('upload');
		$this->load->library('zip');
		$this->load->library('form_validation');

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
		$data = array();

		// Load data for all master components
		$data['master_fungsi'] = $this->Master_fungsi_model->get_all();
		$data['master_urusan'] = $this->Master_urusan_model->get_all();
		$data['master_urusan_active'] = $this->Master_urusan_model->get_active();
		$data['master_program'] = $this->Master_program_model->get_all();

		// Load edit data if editing
		$edit_id = $this->session->flashdata('edit_master_fungsi_id');
		if ($edit_id) {
			$data['edit_master_fungsi'] = $this->Master_fungsi_model->get_by_id($edit_id);
		}

		$edit_urusan_id = $this->session->flashdata('edit_master_urusan_id');
		if ($edit_urusan_id) {
			$data['edit_master_urusan'] = $this->Master_urusan_model->get_by_id($edit_urusan_id);
		}

		$this->load->view('administrator/admdata', $data);
	}

	// public function dashboard()
	// {
	// 	$data['title'] = 'Administrasi Data';
	// 	$data['user'] = $this->session->userdata();

	// 	// Get data statistics
	// 	$data['total_records'] = $this->Data_model->get_total_records();
	// 	$data['recent_imports'] = $this->Data_model->get_recent_imports(5);
	// 	$data['backup_files'] = $this->Data_model->get_backup_files();
	// 	$data['data_quality'] = $this->Data_model->get_data_quality_stats();

	// 	$this->load->view('admin/admdata_dashboard', $data);
	// }

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

	// ========================================
	// MASTER FUNGSI CRUD METHODS
	// ========================================

	/**
	 * Save master fungsi (Create/Update)
	 */
	public function save_master_fungsi()
	{
		$this->form_validation->set_rules('namafungsi', 'Nama Fungsi', 'required|max_length[100]');
		$this->form_validation->set_rules('urut', 'Urutan', 'integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		if ($this->form_validation->run() === FALSE) {
			$tag = $this->input->post('tag1');
			$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
			redirect('admdata');
			return;
		}

		$data = array(
			'namafungsi' => $this->input->post('namafungsi'),
			'urut' => $this->input->post('urut')
		);

		$id = $this->input->post('id');
		$tag = $this->input->post('tag1');

		if ($id) {
			// Update
			$result = $this->Master_fungsi_model->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data fungsi berhasil diperbarui.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data fungsi. Nama mungkin sudah ada.');
			}
		} else {
			// Create
			$result = $this->Master_fungsi_model->insert($data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data fungsi berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data fungsi. Nama mungkin sudah ada.');
			}
		}

		redirect('admdata');
	}

	/**
	 * Get fungsi by ID (AJAX)
	 */
	public function fungsiById($id)
	{
		$fungsi = $this->Master_fungsi_model->get_by_id($id);

		if ($fungsi) {
			$response = array(
				'status' => 'success',
				'data' => $fungsi
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Data tidak ditemukan'
			);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/**
	 * Toggle fungsi status
	 */
	public function setStatus_fungsi($id)
	{
		$result = $this->Master_fungsi_model->toggle_status($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Status fungsi berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status fungsi.');
		}

		redirect('admdata');
	}

	/**
	 * Delete fungsi
	 */
	public function delete_fungsi($id)
	{
		$result = $this->Master_fungsi_model->delete($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data fungsi berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus data fungsi. Data mungkin masih digunakan.');
		}

		redirect('admdata');
	}

	// ========================================
	// HELPER METHODS FOR MASTER DATA
	// ========================================

	/**
	 * Initialize database tables and sample data
	 */
	public function init_database()
	{
		// Create tables
		$this->Master_fungsi_model->create_table();

		// Insert sample data
		$this->Master_fungsi_model->insert_sample_data();

		$this->session->set_flashdata('success', 'Database berhasil diinisialisasi dengan data contoh.');
		redirect('admdata');
	}

	/**
	 * Get statistics for dashboard
	 */
	public function get_statistics()
	{
		$stats = array(
			'fungsi' => $this->Master_fungsi_model->get_statistics(),
			'urusan' => $this->Master_urusan_model->get_statistics()
		);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($stats));
	}

	// ========================================
	// MASTER URUSAN CRUD METHODS
	// ========================================

	/**
	 * Save master urusan (Create/Update)
	 */
	public function save_master_urusan()
	{
		$this->form_validation->set_rules('namaurusan', 'Nama Urusan', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[4]');
		$this->form_validation->set_rules('fungsi_id', 'Fungsi', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$tag = $this->input->post('tag1');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
			redirect('admdata');
			return;
		}

		$data = array(
			'urusan' => $this->input->post('namaurusan'),
			'kode' => $this->input->post('kode'),
			'fungsi' => $this->input->post('fungsi_id')
		);

		$id = $this->input->post('id');

		if ($id) {
			// Update
			$result = $this->Master_urusan_model->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data urusan berhasil diperbarui.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data urusan. Nama atau kode mungkin sudah ada.');
			}
		} else {
			// Create
			$result = $this->Master_urusan_model->insert($data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data urusan berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data urusan. Nama atau kode mungkin sudah ada.');
			}
		}

		redirect('admdata');
	}

	// ========================================
	// MASTER PROGRAM CRUD METHODS
	// ========================================

	/**
	 * Save master program (Create/Update)
	 */
	public function save_master_program()
	{
		$this->form_validation->set_rules('namaprogram', 'Nama Program', 'required|max_length[100]');
		$this->form_validation->set_rules('kode', 'Kode', 'required|max_length[20]');
		$this->form_validation->set_rules('urusan_id', 'Urusan', 'required|integer');
		$this->form_validation->set_rules('tag1', 'Tag', 'required');

		$tag = $this->input->post('tag1');
		$post = $this->input->post();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error-' . $tag, 'Validasi gagal: ' . validation_errors());
			redirect('admdata');
			return;
		}

		$data = array(
			'namaprogram' => $this->input->post('namaprogram'),
			'kode' => $this->input->post('kode'),
			'urusan_id' => $this->input->post('urusan_id')
		);

		$id = $this->input->post('id');

		if ($id) {
			$result = $this->Master_program_model->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data program berhasil diperbarui.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal memperbarui data program. Kode mungkin sudah ada.');
			}
		} else {
			$result = $this->Master_program_model->insert($data);
			if ($result) {
				$this->session->set_flashdata('success-' . $tag, 'Data program berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error-' . $tag, 'Gagal menambahkan data program. Kode mungkin sudah ada.');
			}
		}

		redirect('admdata');
	}

	/**
	 * Get program by ID (AJAX)
	 */
	public function programById($id)
	{
		$program = $this->Master_program_model->get_by_id($id);

		if ($program) {
			$response = array('status' => 'success', 'data' => $program);
		} else {
			$response = array('status' => 'error', 'message' => 'Data tidak ditemukan');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	/**
	 * Toggle program status
	 */
	public function setStatus_program($id)
	{
		$result = $this->Master_program_model->toggle_status($id);
		if ($result) {
			$this->session->set_flashdata('success', 'Status program berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status program.');
		}
		redirect('admdata');
	}

	/**
	 * Delete program
	 */
	public function delete_program($id)
	{
		$result = $this->Master_program_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('success', 'Data program berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus data program.');
		}
		redirect('admdata');
	}

	/**
	 * Get urusan by ID (AJAX)
	 */
	public function urusanById($id)
	{
		$urusan = $this->Master_urusan_model->get_by_id($id);

		if ($urusan) {
			$response = array(
				'status' => 'success',
				'data' => $urusan
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Data tidak ditemukan'
			);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/**
	 * Toggle urusan status
	 */
	public function setStatus_urusan($id)
	{
		$result = $this->Master_urusan_model->toggle_status($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Status urusan berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status urusan.');
		}

		redirect('admdata');
	}

	/**
	 * Delete urusan
	 */
	public function delete_urusan($id)
	{
		$result = $this->Master_urusan_model->delete($id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data urusan berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus data urusan. Data mungkin masih digunakan.');
		}

		redirect('admdata');
	}
}
