<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmData extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		// $this->load->helper('flash');
		$this->load->model('MMasterFungsi');
		$this->load->model('MMasterUrusan');
		$this->load->model('MMasterProgram');
		$this->load->model('MRpjmdperiode');
		$this->load->model('MRpjmdtujuan');
		$this->load->model('MRpjmdsasaran');
		$this->load->model('MRpjmdindikatorsasaran');
		$this->load->model('MRpjmdindikatortujuan');
		$this->load->model('MMisi');
		// $this->load->library('upload');
		// $this->load->library('zip');
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();

		// Load data for all master components
		$data['master_fungsi'] = $this->MMasterFungsi->getAll();
		$data['master_urusan'] = $this->MMasterUrusan->getAll();
		// $data['master_urusan_active'] = $this->MMasterUrusan->get_active();
		$data['master_program'] = $this->MMasterProgram->getAll();
		$data['rpjmdperiode'] = $this->MRpjmdperiode->getAll();
		$data['rpjmdtujuan_list'] = $this->MRpjmdtujuan->getAll();
		$data['rpjmdsasaran_list'] = $this->MRpjmdsasaran->getAll();
		$data['rpjmdindikatorsasaran_list'] = $this->MRpjmdindikatorsasaran->getAll();
		$data['rpjmdindikatortujuan_list'] = $this->MRpjmdindikatortujuan->getAll();
		
		$data['misi_list'] = $this->MMisi->getAll();

		// Load edit data if editing
		$edit_id = $this->session->flashdata('edit_master_fungsi_id');
		if ($edit_id) {
			$data['edit_master_fungsi'] = $this->MMasterFungsi->get_by_id($edit_id);
		}

		$edit_urusan_id = $this->session->flashdata('edit_master_urusan_id');
		if ($edit_urusan_id) {
			$data['edit_master_urusan'] = $this->MMasterUrusan->get_by_id($edit_urusan_id);
		}

		$this->load->view('administrator/admdata', $data);
	}

}
