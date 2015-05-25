<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ckeditorcontroller extends CI_Controller {
  function __construct() {
    parent::__construct();

    ob_start();
    $this->load->helper('form');
    $this->load->library('form_validation','url');
    //$this->load->helper('ckeditor');
  }

  public function index() {
    $path = base_url().'assets/js/ckfinder';
    $width = '850px';
    $this->editor($path, $width);
    $this->form_validation->set_rules('description', 'Page Description', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('myself/ckeditor_message');
    }
    else {
      // do your stuff with post data.
      echo $this->input->post('description');
    }
  }
  function editor($path,$width) {
    //Loading Library For Ckeditor
    $this->load->library('ckeditor');
    $this->load->library('ckfinder');
    //configure base path of ckeditor folder 
    $this->ckeditor->basePath = base_url().'assets/js/ckeditor/';
    $this->ckeditor->config['toolbar'] = 'Full';
    $this->ckeditor->config['language'] = 'en';
    $this->ckeditor->config['width'] = $width;
    //configure ckfinder with ckeditor config 
    $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
  }
}