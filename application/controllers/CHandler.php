<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CHandler extends MY_Controller
{
	public function __save($internal_id)
	{
		$id= $this->input->post('id');

	}

	public function card1(){
		$this->load->view('test/card1');
	}
}
