<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_category extends CI_Controller {
	public function __construct() {
		parent::__construct();

		ob_start();
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
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
	 * Check category exist by title
	 * @param string
	 * @return bool
	 *
	 */
	function check_category_exist_by_title($str){
		if($this->category_model->check_category_exist("title",$str)) {
			$this->form_validation->set_message('check_category_exist_by_title','The %s : '. $str.' is existed. Try another title');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	//=========================================================================================================
	/**
	 *
	 * Check category exist by id
	 * @param string
	 * @return bool
	 *
	 */
	function check_category_exist_by_id($str){
		if($this->category_model->check_category_exist("id",$str)) {
			$this->form_validation->set_message('check_category_exist_by_id','The category with %s '. $str.' is existed. Try another ID');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	function un_check_category_exist_by_id($str){
		if(!$this->category_model->check_category_exist("id",$str)) {
			$this->form_validation->set_message('un_check_category_exist_by_id','The category with %s '. $str.' is not existed. Try again, please');
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
	* ======== category ===========
	* ===============================================================================================================================================
	*/

	/**
	 *
	 * Create new category
	 * @param string, string, string
	 * @return array
	 *
	 */
	function create_new_category(){
		$this->form_validation->set_rules('category_title', 'Category Title', 'trim|required|xss_clean|min_length[2]|max_length[256]|callback_alpha_dash_space_number|callback_check_category_exist_by_title');
		$this->form_validation->set_rules('category_description', 'category Description', 'trim|xss_clean|max_length[500]');
		$this->form_validation->set_rules('category_for', 'Category Type', 'trim|required|xss_clean');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['category_title'] = $this->form_validation->set_value('category_title');
			$data['category_description']= $this->form_validation->set_value('category_description');
			$data['category_type'] = $this->form_validation->set_value('category_for');
			
			// Insert to DB
			if (!is_null($this->category_model->create_category($data))) {
				$result['code'] = 1;
				$result['info'] = 'Create category successfully';
			} 
			// Insert to DB Fail
			else {
				$result['code'] = 0;
				$result['info'] = 'Error happens. Something went wrong when create this category. Please try again.';
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
	 * Update category
	 * @param int, string, string, int, string
	 * @return array
	 *
	 */
	function update_category(){
		$this->form_validation->set_rules('category_id', 'category ID', 'trim|required|xss_clean|integer|callback_un_check_category_exist_by_id');
		$this->form_validation->set_rules('category_title', 'Category Title', 'trim|required|xss_clean|min_length[2]|max_length[256]|callback_alpha_dash_space_number');
		$this->form_validation->set_rules('category_description', 'category Description', 'trim|xss_clean|max_length[500]');
		$this->form_validation->set_rules('category_for', 'Category Type', 'trim|required|xss_clean');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['category_id'] = $this->form_validation->set_value('category_id');
			$data['category_title'] = $this->form_validation->set_value('category_title');
			$data['category_description']= $this->form_validation->set_value('category_description');
			$data['category_type'] = $this->form_validation->set_value('category_for');
			
			// Insert to DB
			if (!is_null($this->category_model->update_category($data))) {
				$result['code'] = 1;
				$result['info'] = 'Update category successfully';
			} 
			// Insert to DB Fail
			else {
				$result['code'] = 0;
				$result['info'] = 'Error happens. Something went wrong when update this category. Please try again.';
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
	 * Change status category
	 * @param int
	 * @return array
	 *
	 */
	function change_status_category(){
		$this->form_validation->set_rules('category_id', 'category ID', 'trim|required|xss_clean|integer|callback_un_check_category_exist_by_id');
		$this->form_validation->set_rules('type', 'Type Change', 'trim|required|xss_clean');
		
		$result = array();
		$data = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['category_id'] = $this->form_validation->set_value('category_id');
			$type_change = $this->form_validation->set_value('type');

			if ($type_change == "enable") 
			{
				$data['category_status'] = 1;
				if (!is_null($this->category_model->update_category($data))) {
					$result['code'] = 1;
					$result['info'] = 'Enable category successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not enable category.Please try again.';
				}	
			}
			else
			{
				$data['category_status'] = 0;
				if (!is_null($this->category_model->update_category($data))) {
					$result['code'] = 1;
					$result['info'] = 'Disable category successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not Disable category.Please try again.';
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
	 * Delete category 
	 * @param int
	 * @return array
	 *
	 */
	function delete_category(){
		$this->form_validation->set_rules('category_id', 'category ID', 'trim|required|xss_clean|integer');
		
		$result = array();
		$category_id = $this->form_validation->set_rules('ad_category_id');
		// validation ok
		if ($this->form_validation->run()) 
		{
			$category_id = $this->form_validation->set_value('category_id');
			
			if ($this->category_model->delete_category($category_id)) 
			{
				$result['code'] = 1;
				$result['info'] = 'Delete category successfully';
			} 
			else 
			{
				$result['code'] = 0;
				$result['info'] = 'Error happens. Cannot delete category. Please try again.';
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
	 * Show list category
	 * @param ints
	 * @return html
	 *
	 */
	function view_category_list($offset=0){
		$data = array();
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/category/category.js',
			'assets/js/category/category_event.js',
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
		$config['base_url'] = base_url().'index.php/admin_category/view_category_list';
		
		// Set total rows in the result set you are creating pagination for
		$config['total_rows'] = $this->category_model->count_all_category();
		
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
		// Ko can phai lay tu segment vi CI se tu hieu khi khai bao 	function view_category_list($offset=0){)
		//$off__set = $this->uri->segment(3,0); 
		// End of pagination config
		//--------------------------------------
		$data['pagination_link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$data['keyword'] = null;
		$data['categoryList'] = $this->category_model->get_all_category_list($config['per_page'], $offset);
		$data['baseURL'] = base_url();
		$this->smarty->view('admin_category/admin_view_category_index',$data);	
	}

	//===============================================================================================================================================
	/**
	 *
	 * Show form to create new category
	 * @param ints
	 * @return html
	 *
	 */
	function show_form_to_create_category(){
		$data = array();
		$data['form_name'] = "Create new category";
		
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/category/category.js',
			'assets/js/category/category_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		$this->smarty->view('admin_category/admin_view_describe_category_form', $data);
	}
}	