<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MitraVerData extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url']);
		$this->load->database();
	}

	public function index()
	{
		// $this->load->view('admin/oprmaster');
		$this->load->view('mitra/mitraverdata');
		// return $this->users();
	}

}


