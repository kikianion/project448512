<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // redirect('login');
        }
    }

    public function index()
    {

        $data['user'] = $this->session->userdata();
        $this->load->view('dashboard/index', $data);
    }
}
