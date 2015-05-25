<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	// USE TO LOAD ALL BLOG & PROJECT PAGE FOR FRONT END
	public function __construct() {
		parent::__construct();

		ob_start();
		$this->load->helper('form');
		$this->load->library('form_validation','url');
		$this->load->library('tank_auth');

		$this->load->model(array(
			'project_model',
			'blog_model',
			'category_model'));
	}

	/*
	|
	|---------------------------------------------------------------------------------------------------------------------
	| FRONT END HOME PAGE AREA
	|---------------------------------------------------------------------------------------------------------------------
	|
	*/
	// =========== USE TO LOAD INDEX FILE
	function index($offset=0) 
	{
		// data to send to view
		$data = array();
		
		// your code
		// write code here
		// end your code

		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			);

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		//=============================================================================
		// Get Project category list
		if (!is_null($project_category_list = $this->category_model->get_category_list('p')))
		{
			$data['code_project_Category'] = 1;
			$data['project_category_list'] = $project_category_list;
		} 
		else
		{
			$data['code_project_Category'] = 0;
			$data['project_category_list'] = "Found no project category. Please try to check server.";
		}

		//=============================================================================
		// Get blog list
		if (!is_null($blog_list = $this->blog_model->get_blog_list(6,0)))
		{
			$data['code_blog'] = 1;
			$data['blog_list'] = $blog_list;
		} 
		else
		{
			$data['code_blog'] = 0;
			$data['blog_list'] = "Found no blog. Please try to check server.";
		}

		//=============================================================================
		// Get project list
		if (!is_null($project_list = $this->project_model->get_project_list(8,0)))
		{
			$data['code_project'] = 1;
			$data['project_list'] = $project_list;
		} 
		else
		{
			$data['code_project'] = 0;
			$data['project_list'] = "Found no project. Please try to check server.";
		}
		
		$data['baseURL'] = base_url();
		// load view by smarty
		$this->smarty->view('myself/index', $data);
	}

	/*
	|
	|---------------------------------------------------------------------------------------------------------------------
	| FRONT END PROJECT AREA
	|---------------------------------------------------------------------------------------------------------------------
	|
	*/
	//=============================================================================
	// View detail project brief
	function view_project_detail($project_id=1){
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		
		//=============================================================================
		// Get Project category list
		if (!is_null($project_category_list = $this->category_model->get_category_list('p')))
		{
			$data['code_project_Category'] = 1;
			$data['project_category_list'] = $project_category_list;
		} 
		else
		{
			$data['code_project_Category'] = 0;
			$data['project_category_list'] = "Found no project category. Please try to check server.";
		}

		//=============================================================================
		// Get project list
		if (!is_null($project_list = $this->project_model->get_project_list(12,0)))
		{
			$data['code_project'] = 1;
			$data['project_list'] = $project_list;
		} 
		else
		{
			$data['code_project'] = 0;
			$data['project_list'] = "Found no project. Please try to check server.";
		}

		//=============================================================================
		// View project detail
		if (!is_null($project_detail = $this->project_model->get_project_detail($project_id)))
		{
			$data['code_project_detail'] = 1;
			$data['project_detail'] = $project_detail;
		} 
		else
		{
			$data['code_project_detail'] = 0;
			$data['project_detail'] = "Found no project. Please try to check server.";
		}
		$data['baseURL'] = base_url();
		$this->smarty->view("myself/project_detail", $data);
	}

	//=============================================================================
	// view project list
	function view_project_list()
	{
		$data = array();
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/main-js/myself_project.js',
			'assets/js/main-js/myself_project_event.js',
			);

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		
	    //=============================================================================
		// Get project list
		if (!is_null($project_list = $this->project_model->get_project_list(8,0)))
		{
			$data['code_project'] = 1;
			$data['project_list'] = $project_list;
			$data['total_rows'] = $this->project_model->count_all_project();
		} 
		else
		{
			$data['code_project'] = 0;
			$data['project_list'] = "Found no project. Please try to check server.";
		}

		//=============================================================================
		// Get Project category list
		if (!is_null($project_category_list = $this->category_model->get_category_list('p')))
		{
			$data['code_project_Category'] = 1;
			$data['project_category_list'] = $project_category_list;
		} 
		else
		{
			$data['code_project_Category'] = 0;
			$data['project_category_list'] = "Found no project category. Please try to check server.";
		}

		$data['baseURL'] = base_url();
		$this->smarty->view('myself/project_list',$data);	
	}

	//=============================================================================
	//Load more project list
	function load_more_project_list()
	{
		$this->form_validation->set_rules('next_page', 'Next page', 'trim|required|xss_clean|integer');
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		
		// validation ok
		if ($this->form_validation->run()) {
			$next_page = $this->form_validation->set_value('next_page');
			// Get blog list
			if (!is_null($project_list = $this->project_model->get_project_list(8, $next_page)))
			{
				$data['code'] = 1;
				$data['project_list'] = $project_list;
			} 
			else
			{
				$data['code'] = 0;
				$data['project_list'] = null;
				$data['info'] = "No more projects posted";
			}
		}
		else {
			$data['code'] = 0;
			$data['info'] = validation_errors();
		}

		$data['baseURL'] = base_url();	
		//$this->load->view('myself/ajax_lazy_project_list',$data);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	/*
	|
	|---------------------------------------------------------------------------------------------------------------------
	| FRONT END BLOG AREA
	|---------------------------------------------------------------------------------------------------------------------
	|
	*/

	//=============================================================================
	// View detail blog post
	function view_blog_detail($blog_id=1){
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		//=============================================================================
		// Get blog list
		if (!is_null($blog_list = $this->blog_model->get_blog_list(12,0)))
		{
			$data['code_blog'] = 1;
			$data['blog_list'] = $blog_list;
		} 
		else
		{
			$data['code_blog'] = 0;
			$data['blog_list'] = "Found no blog. Please try to check server.";
		}

		//=============================================================================
		// View detail blog
		if (!is_null($blog_detail = $this->blog_model->get_blog_detail($blog_id)))
		{
			$data['code_blog_detail'] = 1;
			$data['blog_detail'] = $blog_detail;
		} 
		else
		{
			$data['code_blog_detail'] = 0;
			$data['blog_detail'] = "Found no project. Please try to check server.";
		}
		$data['baseURL'] = base_url();
		
		$this->smarty->view("myself/blog_detail", $data);
	}
	
	//=============================================================================
	// view blog list
	function view_blog_list()
	{
		$data = array();
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/main-js/myself_blog.js',
			'assets/js/main-js/myself_blog_event.js',
			);

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		//=============================================================================
		// Get blog list
		if (!is_null($blog_list = $this->blog_model->get_blog_list(2,0)))
		{
			$data['code_blog'] = 1;
			$data['blog_list'] = $blog_list;
			$data['total_rows'] = $this->blog_model->count_all_blog();
		} 
		else
		{
			$data['code_blog'] = 0;
			$data['blog_list'] = "Found no blog. Please try to check server.";
		}

		// Get blog category list
		if (!is_null($blog_category_list = $this->category_model->get_category_list('b')))
		{
			$data['code_blog_category'] = 1;
			$data['blog_category_list'] = $blog_category_list;
		} 
		else
		{
			$data['code_blog_category'] = 0;
			$data['blog_category_list'] = "Found no blog category. Please try to check server.";
		}


		$data['baseURL'] = base_url();
		$this->smarty->view('myself/blog_list',$data);	
	}

	//=============================================================================
	// Load more blog list
	function load_more_blog_list()
	{
		$this->form_validation->set_rules('next_page', 'Next page', 'trim|required|xss_clean|integer');
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		
		// validation ok
		if ($this->form_validation->run()) {
			$next_page = $this->form_validation->set_value('next_page');
			// Get blog list
			if (!is_null($blog_list = $this->blog_model->get_blog_list(2, $next_page)))
			{
				$data['code'] = 1;
				$data['blog_list'] = $blog_list;
			} 
			else
			{
				$data['code'] = 0;
				$data['blog_list'] = null;
				$data['info'] = "No more blogs posted";
			}
		}
		else {
			$data['code'] = 0;
			$data['info'] = validation_errors();
		}
		
		$data['baseURL'] = base_url();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	//=============================================================================
	// view more blog brief
	function view_more_blog_brief()
	{
		$this->form_validation->set_rules('blog_id', 'Blog ID', 'trim|required|xss_clean|integer');
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		// validation ok
		if ($this->form_validation->run()) {
			$blog_id = $this->form_validation->set_value('blog_id');
			
			if (!is_null($blog_detail = $this->blog_model->get_blog_detail($blog_id)))
			{
				$data['code'] = 1;
				$data['info'] = "Get blog brief successfully";
				$data['blog_detail'] = $blog_detail;
				$data['blog_brief_content'] = nl2br($data['blog_detail']['blog_brief']);
			} 
			else
			{
				$data['code'] = 0;
				$data['info'] = "Blog not found. Please try again.";
			}
		// validation fail
		} else {
			$data['code'] = 0;
			$data['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));

	}

	//=============================================================================
	// search blog
	function search_blog()
	{
		$this->form_validation->set_rules('blog_title', 'Blog Title', 'trim|xss_clean');
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		// validation ok
		if ($this->form_validation->run()) {
			$blog_title = $this->form_validation->set_value('blog_title');
			
			if (!is_null($blog_list = $this->blog_model->get_blog_list_by_title($blog_title)))
			{
				$data['code'] = 1;
				$data['info'] = "Get blog brief successfully";
				$data['blog_list'] = $blog_list;
				$data['total_rows'] = $this->blog_model->count_all_blog_by_title($blog_title);
			} 
			else
			{
				$data['code'] = 0;
				$data['info'] = "Blog not found. Please try again.";
			}
		// validation fail
		} else {
			$data['code'] = 0;
			$data['info'] = validation_errors();
		}

		/*$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));*/
		$this->load->view('myself/ajax_lazy_blog_list',$data);	
	}

	//=============================================================================
	// View  blog by category_id
	function view_blog_list_by_category_id()
	{
		$this->form_validation->set_rules('category_id', 'Category', 'trim|xss_clean|integer');
		$data = array();

		// To show Admin Menu
		$data['is_logged_in'] = $this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();

		// validation ok
		if ($this->form_validation->run()) {
			$category_id = $this->form_validation->set_value('category_id');
			
			if (!is_null($blog_list = $this->blog_model->get_blog_list_by_category_id($category_id)))
			{
				$data['code'] = 1;
				$data['info'] = "Get blog brief successfully";
				$data['blog_list'] = $blog_list;
				$data['total_rows'] = $this->blog_model->count_all_blog_by_category_id($category_id);
			} 
			else
			{
				$data['code'] = 0;
				$data['info'] = "Blog not found. Please try again.";
			}
		// validation fail
		} else {
			$data['code'] = 0;
			$data['info'] = validation_errors();
		}
		/*$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));*/
		$this->load->view('myself/ajax_lazy_blog_list',$data);	
	}
}