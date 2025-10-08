<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Flash helper
 *
 * Provides a small wrapper around the CI session object so callers can pass
 * extended parameters to set_flashdata() without changing existing callsites.
 *
 * Usage: after the session library is loaded, call wrap_ci_session($this)
 * where $this is the controller instance (CI_Controller).
 *
 * The wrapper delegates all methods to the original session object but
 * overloads set_flashdata to accept the following signatures:
 * - set_flashdata($key, $value)
 * - set_flashdata($key, $message, $type = 'info', $title = '', $options = [])
 * - set_flashdata(array $array)  // same as original CI behaviour
 */

class FlashSessionWrapper
{
    /** @var object Underlying CI_Session instance */
    protected $underlying;

    public function __construct($underlying)
    {
        $this->underlying = $underlying;
    }

    /**
     * Overloaded set_flashdata. If extra params are provided it will store an
     * array containing message, type, title and options under the given key.
     */
    public function set_flashdata($key, $value = null, $payload = array())
    {
        // If first argument is an array, delegate to underlying behaviour
        if (is_array($key)) {
            return $this->underlying->set_flashdata($key);
        }

        // If only (key, value) provided (value not null and type === 'info' and title/options default)
        $numArgs = func_num_args();
        if ($numArgs <= 2) {
            return $this->underlying->set_flashdata($key, $value);
        }

        return $this->underlying->set_flashdata($key, $payload);
    }

    /**
     * Delegate any other calls to the underlying session object.
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->underlying, $name), $arguments);
    }

    /**
     * Allow property access to underlying object
     */
    public function __get($name)
    {
        return $this->underlying->{$name};
    }

    public function __set($name, $value)
    {
        $this->underlying->{$name} = $value;
    }
}

/**
 * Replace the controller's session object with the wrapper.
 * Pass the controller instance (usually $this inside a controller).
 */
function wrap_ci_session($controller)
{
    if (!isset($controller->session)) {
        return false;
    }

    // Avoid double-wrapping
    if ($controller->session instanceof FlashSessionWrapper) {
        return true;
    }

    $controller->session = new FlashSessionWrapper($controller->session);
    return true;
}

/**
 * Set flash message with tag support
 * @param string $tag - Tag identifier for the message
 * @param string $type - Message type (success, error, warning, info)
 * @param string $message - The message content
 */
if (!function_exists('set_flash_message')) {
    function set_flash_message($tag, $type, $message)
    {
        $CI =& get_instance();
        $flash_data = array(
            'type' => $type,
            'message' => $message,
            'timestamp' => time()
        );
        $CI->session->set_flashdata('flash_' . $tag, $flash_data);
    }
}

/**
 * Get flash message widget HTML
 * @param string $tag - Tag identifier for the message
 * @return string - HTML for the flash message
 */
if (!function_exists('widget_flash')) {
    function widget_flash($tag)
    {
        $CI =& get_instance();
        $flash_data = $CI->session->flashdata('flash_' . $tag);
        
        if (!$flash_data) {
            return '';
        }
        
        $type = isset($flash_data['type']) ? $flash_data['type'] : 'info';
        $message = isset($flash_data['message']) ? $flash_data['message'] : '';
        
        // Map types to Bootstrap alert classes
        $alert_class = array(
            'success' => 'alert-success',
            'error' => 'alert-danger',
            'warning' => 'alert-warning',
            'info' => 'alert-info'
        );
        
        $class = isset($alert_class[$type]) ? $alert_class[$type] : 'alert-info';
        
        // Map types to icons
        $icons = array(
            'success' => 'fas fa-check-circle',
            'error' => 'fas fa-exclamation-triangle',
            'warning' => 'fas fa-exclamation-circle',
            'info' => 'fas fa-info-circle'
        );
        
        $icon = isset($icons[$type]) ? $icons[$type] : 'fas fa-info-circle';
        
        $html = '<div class="alert ' . $class . ' alert-dismissible fade show" role="alert">';
        $html .= '<i class="' . $icon . '"></i> ';
        $html .= htmlspecialchars($message);
        $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $html .= '<span aria-hidden="true">&times;</span>';
        $html .= '</button>';
        $html .= '</div>';
        
        return $html;
    }
}
