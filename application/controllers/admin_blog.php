<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_blog extends CI_Controller {
	public function __construct() {
		parent::__construct();

		ob_start();
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->model('blog_model');
		$this->load->model('category_model');
		$this->load->library('tank_auth');

		//Session is expired
		if (!$this->tank_auth->is_logged_in()) {
			//redirect('');
			die('{"code": 0,"info":"Your Session is expried. Please login & try again"}');
		}
	}

	//=========================================================================================================
	/**
	 *
	 * Check number
	 * @param string
	 * @return bool
	 *
	 */
	function field_empty($str){
		if ($str == "0") {
			$this->form_validation->set_message('field_empty', 'The %s field is required');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//=========================================================================================================
	/**
	 *
	 * Check blog exist by title
	 * @param string
	 * @return bool
	 *
	 */
	function check_blog_exist_by_title($str){
		if($this->blog_model->check_blog_exist("title",$str)) {
			$this->form_validation->set_message('check_blog_exist_by_title','The %s '. $str.' is existed. Try another title');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	//=========================================================================================================
	/**
	 *
	 * Check blog exist by id
	 * @param string
	 * @return bool
	 *
	 */
	function check_blog_exist_by_id($str){
		if($this->blog_model->check_blog_exist("id",$str)) {
			$this->form_validation->set_message('check_blog_exist_by_id','The blog with %s '. $str.' is existed. Try another ID');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	function un_check_blog_exist_by_id($str){
		if(!$this->blog_model->check_blog_exist("id",$str)) {
			$this->form_validation->set_message('un_check_blog_exist_by_id','The blog with %s '. $str.' is not existed. Try again, please');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	//=========================================================================================================
	/**
	 *
	 * Only allow spaces, alpha and numeric. and and dash(-)
	 * @param string
	 * @return bool
	 *
	 */
	function alpha_dash_space_number($str){
		if (! preg_match("/^([-A-Za-z0-9_ ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_dash_space_number', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	/**
	*
	* ======== blog ===========
	* ===============================================================================================================================================
	*/

	/**
	 *
	 * Create new blog
	 * @param string, string, int, string
	 * @return array
	 *
	 */
	function create_new_blog(){
		$this->form_validation->set_rules('ad_blog_title', 'Blog Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_blog_brief', 'Blog Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_blog_catalog_id', 'Blog Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_blog_description', 'blog Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['blog_title'] = $this->form_validation->set_value('ad_blog_title');
			$data['blog_brief'] = $this->form_validation->set_value('ad_blog_brief');
			$data['blog_description'] = $this->form_validation->set_value('ad_blog_description');
			$data['category_id'] = $this->form_validation->set_value('ad_blog_catalog_id');
			
			$rand = random_string('alnum',12);

			//=============CONFIG FOR UPLOAD FILE
			$file_element_name = 'ad_blog_avatar';
			$config['upload_path'] = './userfiles/blog';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = "blog_".$rand;
			$config['overwrite'] = TRUE;
			$config['max_size']	= '10485760'; // equals 10MB
			$config['max_width']  = '512';
			$config['max_height']  = '512';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//=============

			// upload ok
			if ($this->upload->do_upload($file_element_name)) 
			{
				$uploaded_file = $this->upload->data();
				$image_path = $uploaded_file['full_path'];
			   	if(file_exists($image_path))
			   	{
			   		$data['blog_avatar_name'] = "blog_".$rand.$uploaded_file['file_ext']; // Save image name + imagetype
					// Insert to DB
					if (!is_null($this->blog_model->create_blog($data))) {
						$result['code'] = 1;
						$result['info'] = 'Create blog successfully';
					} 
					// Insert to DB Fail
					else {
						unlink($image_path);
						$result['code'] = 0;
						$result['info'] = 'Error happens. Something went wrong when saving the file. Please try again.';
					}
				}
				// File not found
				else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Image not found. Please try again.';
				}
			}
			//upload fail
			else {
			    $result['code'] = 0;
                $result['info'] = $this->upload->display_errors('<p>','</p>');
                //$result['info'] = "Upload hinh anh co van de roi";
			}
			@unlink($_FILES[$file_element_name]);
		// validation fail
		} else {
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	/**
	 *
	 * Create new blog without avatar
	 * @param string, string, int, string
	 * @return array
	 *
	 */
	function create_blog(){
		$this->form_validation->set_rules('ad_blog_title', 'Blog Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_blog_brief', 'Blog Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_blog_catalog_id', 'Blog Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_blog_description', 'blog Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['blog_title'] = $this->form_validation->set_value('ad_blog_title');
			$data['blog_brief'] = $this->form_validation->set_value('ad_blog_brief');
			$data['blog_description'] = $this->form_validation->set_value('ad_blog_description');
			$data['category_id'] = $this->form_validation->set_value('ad_blog_catalog_id');
	   		// Insert to DB
			if (!is_null($this->blog_model->create_blog($data))) {
				$result['code'] = 1;
				$result['info'] = 'Create blog successfully';
			} 
			// Insert to DB Fail
			else {
				$result['code'] = 0;
				$result['info'] = 'Error happens. Something went wrong when saving the file. Please try again.';
			}
		// validation fail
		} else {
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	//===============================================================================================================================================
	/**
	 *
	 * Update blog
	 * @param int, string, string, int, string
	 * @return array
	 *
	 */
	function update_blog(){
		$this->form_validation->set_rules('ad_blog_id', 'Blog ID', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('ad_blog_title', 'Blog Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_blog_brief', 'Blog Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_blog_catalog_id', 'Blog Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_blog_description', 'Blog Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['blog_id'] = $this->form_validation->set_value('ad_blog_id');
			$data['blog_title'] = $this->form_validation->set_value('ad_blog_title');
			$data['blog_brief'] = $this->form_validation->set_value('ad_blog_brief');
			$data['blog_description'] = $this->form_validation->set_value('ad_blog_description');
			$data['category_id'] = $this->form_validation->set_value('ad_blog_catalog_id');
			
			if (!is_null($this->blog_model->update_blog($data))) {
				$result['code'] = 1;
				$result['info'] = 'Update blog successfully';
			} else {
				$result['code'] = 0;
				$result['info'] = 'Error happens. Can not update blog. Please try again.';
			}
		// validation fail
		} else {
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	//===============================================================================================================================================
	/**
	 *
	 * update blog with avatar
	 * @param string, string, int, string
	 * @return array
	 *
	 */
	function update_blog_with_avatar(){
		$this->form_validation->set_rules('ad_blog_id', 'Blog ID', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('ad_blog_title', 'Blog Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_blog_brief', 'Blog Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_blog_catalog_id', 'Blog Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_blog_description', 'Blog Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['blog_id'] = $this->form_validation->set_value('ad_blog_id');
			$data['blog_title'] = $this->form_validation->set_value('ad_blog_title');
			$data['blog_brief'] = $this->form_validation->set_value('ad_blog_brief');
			$data['blog_description'] = $this->form_validation->set_value('ad_blog_description');
			$data['category_id'] = $this->form_validation->set_value('ad_blog_catalog_id');
			
			$rand = random_string('alnum',12);

			//=============CONFIG FOR UPLOAD FILE
			$file_element_name = 'ad_blog_avatar';
			$config['upload_path'] = './userfiles/blog';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = "blog_".$rand;
			$config['overwrite'] = TRUE;
			$config['max_size']	= '10485760'; // equals 10MB
			$config['max_width']  = '512';
			$config['max_height']  = '512';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//=======================
			// Delete old avatar
			$this->blog_model->delete_old_avatar($data['blog_id']);

			// upload ok
			if ($this->upload->do_upload($file_element_name)) 
			{
				$uploaded_file = $this->upload->data();
				$image_path = $uploaded_file['full_path'];
			   	if(file_exists($image_path))
			   	{
			   		$data['blog_avatar_name'] = "blog_".$rand.$uploaded_file['file_ext']; // Save image name + imagetype
					// Insert to DB
					if (!is_null($this->blog_model->update_blog($data))) {
						$result['code'] = 1;
						$result['info'] = 'Update blog successfully';
					} 
					// Insert to DB Fail
					else {
						unlink($image_path);
						$result['code'] = 0;
				$result['info'] = 'Error happens. Can not update blog. Please try again.';
					}
				}
				// File not found
				else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Image not found. Please try again.';
				}
			}
			//upload fail
			else {
			    $result['code'] = 0;
                $result['info'] = $this->upload->display_errors('<p>','</p>');
			}
			@unlink($_FILES[$file_element_name]);
		// validation fail
		} else {
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	//===============================================================================================================================================
	/**
	 *
	 * Change status blog
	 * @param int
	 * @return array
	 *
	 */
	function change_status_blog(){
		$this->form_validation->set_rules('blog_id', 'blog ID', 'trim|required|xss_clean|integer|callback_un_check_blog_exist_by_id');
		$this->form_validation->set_rules('type', 'Type Change', 'trim|required|xss_clean');
		
		$result = array();
		$data = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['blog_id'] = $this->form_validation->set_value('blog_id');
			$type_change = $this->form_validation->set_value('type');

			if ($type_change == "enable") 
			{
				$data['blog_status'] = 1;
				if (!is_null($this->blog_model->update_blog($data))) {
					$result['code'] = 1;
					$result['info'] = 'Enable blog successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not enable blog.Please try again.';
				}	
			}
			else
			{
				$data['blog_status'] = 0;
				if (!is_null($this->blog_model->update_blog($data))) {
					$result['code'] = 1;
					$result['info'] = 'Disable blog successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not Disable blog.Please try again.';
				}		
			}
		// validation fail
		} else {
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	//===============================================================================================================================================
	/**
	 *
	 * Delete blog 
	 * @param int
	 * @return array
	 *
	 */
	function delete_blog(){
		$this->form_validation->set_rules('blog_id', 'blog ID', 'trim|required|xss_clean|integer');
		
		$result = array();
		$blog_id = $this->form_validation->set_rules('blog_id');
		// validation ok
		if ($this->form_validation->run()) 
		{
			$blog_id = $this->form_validation->set_value('blog_id');
			
			if ($this->blog_model->delete_blog($blog_id)) 
			{
				$result['code'] = 1;
				$result['info'] = 'Delete blog successfully';
			} 
			else 
			{
				$result['code'] = 0;
				$result['info'] = 'Error happens. Cannot delete blog. Please try again.';
			}
		} 
		// validation fail
		else 
		{
			$result['code'] = 0;
			$result['info'] = validation_errors();
		}

		 $this->output
		 	->set_content_type('application/json')
		 	->set_output(json_encode($result));
	}

	//===============================================================================================================================================
	/**
	 *
	 * Show list blog
	 * @param ints
	 * @return html
	 *
	 */
	function view_blog_list($offset=0){
		$data = array();
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/blog/blog.js',
			'assets/js/blog/blog_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		// Pagination config
		// URI binary
		$this->load->library('uri');
		$this->load->library('pagination');

		// Initialize empty array
		$config = array();
		
		// Set base_url for every links
		$config['base_url'] = base_url().'index.php/admin_blog/view_blog_list';
		
		// Set total rows in the result set you are creating pagination for
		$config['total_rows'] = $this->blog_model->count_all_blog();
		
		// Number of items you intend to show per page.
		$config['per_page'] = 2; 

		//$config['uri_segment']	= 3; // tinh tu sau index.php thi segment la vi tri 1

		//Set that how many number of pages you want to view.
		$config['num_links'] = 2;

		$config['full_tag_open'] 	= '<div class="pagination"><ul>';
		$config['full_tag_close'] 	= '</ul></div><!--pagination-->';

	    $config['first_link'] 		= '&laquo; First';
	    $config['first_tag_open'] 	= '<li class="prev page">';
	    $config['first_tag_close'] 	= '</li>';

	    // By clicking on performing PREVIOUS pagination.
		$config['prev_link'] 		= '&larr; Previous';
	    $config['prev_tag_open'] 	= '<li class="prev page">';
	    $config['prev_tag_close'] 	= '</li>';

	    // Open tag for CURRENT link.
	    $config['cur_tag_open'] 	= '<li class="active"><a href="">';

	    // Close tag for CURRENT link.
	    $config['cur_tag_close'] 	= '</a></li>';

	    $config['num_tag_open'] 	= '<li class="page">';
	    $config['num_tag_close'] 	= '</li>';

	    // By clicking on performing NEXT pagination.
	    $config['next_link'] 		= 'Next &rarr;';
	    $config['next_tag_open'] 	= '<li class="next page">';
	    $config['next_tag_close'] 	= '</li>';

	    $config['last_link'] 		= 'Last &raquo;';
	    $config['last_tag_open'] 	= '<li class="next page">';
	    $config['last_tag_close'] 	= '</li>';

	    // Use pagination number for anchor URL.
		//$config['use_page_numbers'] = TRUE;

	    // To initialize "$config" array and set to pagination library.
		$this->pagination->initialize($config);

		//Get offset
		// Ko can phai lay tu segment vi CI se tu hieu khi khai bao 	function view_blog_list($offset=0){)
		//$off__set = $this->uri->segment(3,0); 
		// End of pagination config
		//--------------------------------------
		$data['pagination_link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$data['keyword'] = null;
		$data['blogList'] = $this->blog_model->admin_get_blog_list($config['per_page'], $offset);
		$data['baseURL'] = base_url();
		$this->smarty->view('admin_blog/admin_view_blog_index',$data);	
	}

	//===============================================================================================================================================
	/**
	 *
	 * Show form to create new blog
	 * @param ints
	 * @return html
	 *
	 */
	function show_form_to_create_blog(){
		$data = array();
		$data['form_name'] = "Create new blog";
		
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/blog/blog.js',
			'assets/js/blog/blog_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		if (!is_null($category_list = $this->category_model->get_category_list('b')))
		{
			$data['code'] = 1;
			$data['category_list'] = $category_list;
		} 
		else
		{
			$data['code'] = 0;
			$data['info'] = "Error happens. Can not get the list of category. Please try to check server.";
		}

		$this->smarty->view('admin_blog/admin_view_describe_blog_form', $data);
	}

	//===============================================================================================================================================
	/**
	 *
	 * View detail blog
	 * @param int
	 * @return array
	 *
	 */
	function view_detail_blog($blog_id)
	{
		$data = array();
		$data['form_name'] = "Detail Info";
		
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/ckeditor/ckeditor.js',
			'assets/js/ckfinder/ckfinder.js',
			'assets/js/blog/blog.js',
			'assets/js/blog/blog_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		if (!is_null($category_list = $this->category_model->get_category_list('b')))
		{
			$data['code'] = 1;
			$data['category_list'] = $category_list;
		} 
		else
		{
			$data['code'] = 0;
			$data['info'] = "Error happens. Can not get the list of category. Please try to check server.";
		}

		if (!is_null($blog_info = $this->blog_model->get_blog_detail($blog_id))) {
			$data['code'] = 1;
			$data['blog_info'] = $blog_info;
		} else {
			$data['code'] = 0;
			$data['info'] = 'Error happens. Can not view detail this blog. Please try again.';
		}

		$data['baseURL'] = base_url();
		$this->smarty->view('admin_blog/admin_view_describe_blog_form', $data);
	}
}