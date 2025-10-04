<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MMasterUser');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Check if user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('login');
    }

    public function authenticate()
    {

        $this->load->helper("url");

        redirect("dashboard");
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload login page with errors
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Authenticate user
            $user = $this->User_model->authenticate($email, $password);

            if ($user) {
                // Set session data
                $session_data = array(
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->name,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                redirect('dashboard/index');
            } else {
                // Authentication failed
                $data['error'] = 'Invalid email or password';
                $this->load->view('login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
