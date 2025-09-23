<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application base controller
 * All application controllers should extend this class to share common
 * functionality (helpers, libraries, site-wide data, render helper, etc.)
 */
/**
 * @property CI_Session $session
 * @property CI_Output $output
 */
class MY_Controller extends CI_Controller {

    /**
     * Shared data passed to views
     * @var array
     */
    protected $data = array();

    public function __construct()
    {
        parent::__construct();

        // Load common helpers/libraries used across controllers
        $this->load->helper(array('url', 'form', 'text'));
        $this->load->library(array('session'));

        // Default site data (can be overridden by child controllers)
        $this->data['site_title'] = 'Simela Gen2';
        $this->data['user'] = $this->session->userdata('user') ?: null;
    }

    /**
     * Render view with header/footer using app shells if present.
     * Usage: $this->render('view_name', $data);
     */
    protected function render($view, $data = array(), $return = FALSE)
    {
        $data = array_merge($this->data, (array) $data);

        // If the app uses an appshell header/footer, use them; otherwise fallback
        // to loading the view directly.
        if (file_exists(APPPATH . 'views/_appshell/1head.php')) {
            $this->load->view('_appshell/1head', $data);
        }

        $this->load->view($view, $data);

        if (file_exists(APPPATH . 'views/_appshell/1foot.php')) {
            $this->load->view('_appshell/1foot', $data);
        }

        if ($return) {
            // If requested, capture output buffer (simple approach)
            return $this->output->get_output();
        }
    }
}
