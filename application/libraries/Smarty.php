<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH . 'libraries/smarty/libs/Smarty.class.php');
 
class CI_Smarty extends Smarty {

    function __construct() {
        parent::__construct();

        $ci = &get_instance();

        $this->setTemplateDir(APPPATH . 'views');
        $this->setCompileDir(APPPATH . 'libraries/smarty/compiled');
        $this->setConfigDir(APPPATH . 'libraries/smarty/configs');
        $this->setCacheDir(APPPATH . 'libraries/smarty/cache');

        $this->assign('APPPATH', APPPATH);
        $this->assign('BASEPATH', BASEPATH);
        $this->assign('base_url', $ci->config->item('base_url'));

        if (method_exists($this, 'assignByRef'))
        {
            $this->assignByRef("ci", $ci);
        }

        $this->force_compile = 1;
        $this->caching = TRUE;
        $this->cache_lifetime = 120;

        log_message('debug', "Smarty Class Initialized");
    }

    /**
     *  Parse a template using the Smarty engine
     *
     * This is a convenience method that combines assign() and
     * display() into one step. 
     *
     * Values to assign are passed in an associative array of
     * name => value pairs.
     *
     * If the output is to be returned as a string to the caller
     * instead of being output, pass true as the third parameter.
     *
     * @access  public
     * @param   string
     * @param   array
     * @param   bool
     * @return  string
     */
    function view($template, $data = array(), $return = FALSE) {
        if (strpos($template, '.') === FALSE && strpos($template, ':') === FALSE) {
            $template .= '.php';
            $this->assign('content_tpl', $template);
        }

        foreach ($data as $key => $val) {
            $this->assign($key, $val);
        }
        
        $layout_tpl = 'layout/default.php';
        if ($return == FALSE) {
            $ci = &get_instance();

            //render page
            if (method_exists($ci->output, 'set_output')) {
                $ci->output->set_output($this->fetch($layout_tpl));
            } else {
                $ci->output->final_output = $this->fetch($layout_tpl);
            }
            return;
        } else {
            //render partial
            return $this->fetch($template);
        }
    }

    function page($template, $data = array()) {
        if (strpos($template, '.') === FALSE && strpos($template, ':') === FALSE) {
            $template .= '.php';
        }

        foreach ($data as $key => $val) {
            $this->assign($key, $val);
        }
        
        $ci = &get_instance();

        //render page
        if (method_exists($ci->output, 'set_output')) {
            $ci->output->set_output($this->fetch($template));
        } else {
            $ci->output->final_output = $this->fetch($template);
        }
        return;
    }
}

/* End of file CI_Smarty.php */
/* Location: ./application/libraries/CI_Smarty.php */