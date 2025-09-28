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
