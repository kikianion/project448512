<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COprMaster extends MY_Controller {
	public function index()
	{
		$this->load->view('operator/oprmaster');
	}
}


