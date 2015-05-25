<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
class Admin_project extends CI_Controller {
	public function __construct() {
		parent::__construct();

		ob_start();
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->model('project_model');
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
	 * Check project exist by title
	 * @param string
	 * @return bool
	 *
	 */
	function check_project_exist_by_title($str){
		if($this->project_model->check_project_exist("title",$str)) {
			$this->form_validation->set_message('check_project_exist_by_title','The %s '. $str.' is existed. Try another title');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	//=========================================================================================================
	/**
	 *
	 * Check project exist by id
	 * @param string
	 * @return bool
	 *
	 */
	function check_project_exist_by_id($str){
		if($this->project_model->check_project_exist("id",$str)) {
			$this->form_validation->set_message('check_project_exist_by_id','The project with %s '. $str.' is existed. Try another ID');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	function un_check_project_exist_by_id($str){
		if(!$this->project_model->check_project_exist("id",$str)) {
			$this->form_validation->set_message('un_check_project_exist_by_id','The project with %s '. $str.' is not existed. Try again, please');
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
	* ======== PROJECT ===========
	* ===============================================================================================================================================
	*/

	/**
	 *
	 * Create new project
	 * @param string, string, int, string
	 * @return array
	 *
	 */
	function create_new_project(){
		$this->form_validation->set_rules('ad_project_title', 'Project Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_project_brief', 'Project Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_project_catalog_id', 'Project Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_project_description', 'Project Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['title'] = $this->form_validation->set_value('ad_project_title');
			$data['brief'] = $this->form_validation->set_value('ad_project_brief');
			$data['description'] = $this->form_validation->set_value('ad_project_description');
			$data['category_id'] = $this->form_validation->set_value('ad_project_catalog_id');
			
			$rand = random_string('alnum',12);

			//=============CONFIG FOR UPLOAD FILE
			$file_element_name = 'ad_project_avatar';
			$config['upload_path'] = './userfiles/project';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = "project_".$rand;
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
			   		$data['avatar_name'] = "project_".$rand.$uploaded_file['file_ext']; // Save image name + imagetype
					// Insert to DB
					if (!is_null($this->project_model->create_project($data))) {
						//if(IS_AJAX){}
						//else{}
						
						$result['code'] = 1;
						$result['info'] = 'Create project successfully';
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
	 * Create new project without avatar
	 * @param string, string, int, string
	 * @return array
	 *
	 */
	function create_project(){
		$this->form_validation->set_rules('ad_project_title', 'Project Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_project_brief', 'Project Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_project_catalog_id', 'Project Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_project_description', 'Project Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) 
		{
			$data['title'] = $this->form_validation->set_value('ad_project_title');
			$data['brief'] = $this->form_validation->set_value('ad_project_brief');
			$data['description'] = $this->form_validation->set_value('ad_project_description');
			$data['category_id'] = $this->form_validation->set_value('ad_project_catalog_id');
			// Insert to DB
			if (!is_null($this->project_model->create_project($data))) {
				//if(IS_AJAX){}
				//else{}
				$result['code'] = 1;
				$result['info'] = 'Create project successfully';
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
	 * Update project without avatar
	 * @param int, string, string, int, string
	 * @return array
	 *
	 */
	function update_project(){
		$this->form_validation->set_rules('ad_project_id', 'Project ID', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('ad_project_title', 'Project Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_project_brief', 'Project Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_project_catalog_id', 'Project Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_project_description', 'Project Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['id'] = $this->form_validation->set_value('ad_project_id');
			$data['title'] = $this->form_validation->set_value('ad_project_title');
			$data['brief'] = $this->form_validation->set_value('ad_project_brief');
			$data['description'] = $this->form_validation->set_value('ad_project_description');
			$data['category_id'] = $this->form_validation->set_value('ad_project_catalog_id');
			
			if (!is_null($this->project_model->update_project($data))) {
				$result['code'] = 1;
				$result['info'] = 'Update project successfully';
			} else {
				$result['code'] = 0;
				$result['info'] = 'Error happens. Can not update project. Please try again.';
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
	 * Update project with avatar
	 * @param int, string, string, int, string
	 * @return array
	 *
	 */
	function update_project_with_avatar(){
		$this->form_validation->set_rules('ad_project_id', 'Project ID', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('ad_project_title', 'Project Title', 'trim|required|xss_clean|min_length[2]|max_lenght[256]');
		$this->form_validation->set_rules('ad_project_brief', 'Project Brief', 'trim|required|xss_clean|min_length[2]|max_lenght[500]');
		$this->form_validation->set_rules('ad_project_catalog_id', 'Project Catalog', 'trim|required|xss_clean|integer|callback_field_empty');
		$this->form_validation->set_rules('ad_project_description', 'Project Description', 'trim|required|xss_clean|min_length[2]');
		
		$data = array();
		$result = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['id'] = $this->form_validation->set_value('ad_project_id');		
			$data['title'] = $this->form_validation->set_value('ad_project_title');
			$data['brief'] = $this->form_validation->set_value('ad_project_brief');
			$data['description'] = $this->form_validation->set_value('ad_project_description');
			$data['category_id'] = $this->form_validation->set_value('ad_project_catalog_id');
			
			$rand = random_string('alnum',12);

			//=============CONFIG FOR UPLOAD FILE
			$file_element_name = 'ad_project_avatar';
			$config['upload_path'] = './userfiles/project';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = "project_".$rand;
			$config['overwrite'] = TRUE;
			$config['max_size']	= '10485760'; // equals 10MB
			$config['max_width']  = '512';
			$config['max_height']  = '512';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//=======================
			// Delete old avatar
			$this->project_model->delete_old_avatar($data['id']);

			// upload ok
			if ($this->upload->do_upload($file_element_name)) 
			{
				$uploaded_file = $this->upload->data();
				$image_path = $uploaded_file['full_path'];
			   	if(file_exists($image_path))
			   	{
			   		$data['avatar_name'] = "project_".$rand.$uploaded_file['file_ext']; // Save image name + imagetype
					// Insert to DB
					if (!is_null($this->project_model->update_project($data))) {
						$result['code'] = 1;
						$result['info'] = 'Update project successfully';
					} else {
						unlink($image_path);
						$result['code'] = 0;
						$result['info'] = 'Error happens. Can not update project.Please try again.';
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
	 * Change status project
	 * @param int
	 * @return array
	 *
	 */
	function change_status_project(){
		$this->form_validation->set_rules('project_id', 'Project ID', 'trim|required|xss_clean|integer|callback_un_check_project_exist_by_id');
		$this->form_validation->set_rules('type', 'Type Change', 'trim|required|xss_clean');
		
		$result = array();
		$data = array();
		// validation ok
		if ($this->form_validation->run()) {
			$data['id'] = $this->form_validation->set_value('project_id');
			$type_change = $this->form_validation->set_value('type');

			if ($type_change == "enable") 
			{
				$data['status'] = 1;
				if (!is_null($this->project_model->update_project($data))) {
					$result['code'] = 1;
					$result['info'] = 'Enable project successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not enable project.Please try again.';
				}	
			}
			else
			{
				$data['status'] = 0;
				if (!is_null($this->project_model->update_project($data))) {
					$result['code'] = 1;
					$result['info'] = 'Disable project successfully';
				} else {
					$result['code'] = 0;
					$result['info'] = 'Error happens. Can not Disable project.Please try again.';
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
	 * Delete project 
	 * @param int
	 * @return array
	 *
	 */
	function delete_project(){
		$this->form_validation->set_rules('project_id', 'Project ID', 'trim|required|xss_clean|integer');
		
		$result = array();
		$data = array();

		$project_id = $this->form_validation->set_rules('project_id');
		// validation ok
		if ($this->form_validation->run()) 
		{
			$project_id = $this->form_validation->set_value('project_id');
			
			if ($this->project_model->delete_project($project_id)) 
			{
				$result['code'] = 1;
				$result['info'] = 'Delete project successfully';
			} 
			else 
			{
				$result['code'] = 0;
				$result['info'] = 'Error happens. Cannot delete project. Please try again.';
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
	 * Show list project
	 * @param ints
	 * @return html
	 *
	 */
	function view_project_list($offset=0){
		$data = array();
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/project/project.js',
			'assets/js/project/project_event.js',
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
		$config['base_url'] = base_url().'index.php/admin_project/view_project_list';
		
		// Set total rows in the result set you are creating pagination for
		$config['total_rows'] = $this->project_model->count_all_project();
		
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
		// Ko can phai lay tu segment vi CI se tu hieu khi khai bao 	function view_project_list($offset=0){)
		//$off__set = $this->uri->segment(3,0); 
		// End of pagination config
		//--------------------------------------
		$data['pagination_link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$data['keyword'] = null;
		$data['projectList'] = $this->project_model->admin_get_project_list($config['per_page'], $offset);
		$data['baseURL'] = base_url();
		$this->smarty->view('admin_project/admin_view_project_index',$data);	
	}

	//===============================================================================================================================================
	/**
	 *
	 * Show form to create new project
	 * @param ints
	 * @return html
	 *
	 */
	function show_form_to_create_project(){
		$data = array();
		$data['form_name'] = "Create new project";
		
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/project/project.js',
			'assets/js/project/project_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		if (!is_null($category_list = $this->category_model->get_category_list()))
		{
			$data['code'] = 1;
			$data['category_list'] = $category_list;
		}
		else
		{
			$data['code'] = 0;
			$data['info'] = "Error happens. Can not get the list of category. Please try to check server.";
		}

		$this->smarty->view('admin_project/admin_view_describe_project_form', $data);
	}

	//===============================================================================================================================================
	/**
	 *
	 * View detail project
	 * @param int
	 * @return array
	 *
	 */
	function view_detail_project($project_id)
	{
		$data = array();
		$data['form_name'] = "Detail Info";
		
		// external css
		$data['ext_css'] = array(
			);
		// external js
		$data['ext_js'] = array(
			'assets/js/project/project.js',
			'assets/js/project/project_event.js',
			);

		// To show Admin Menu
		if($this->tank_auth->is_logged_in())
		{
			$data['is_logged_in'] = $this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
		}

		if (!is_null($category_list = $this->category_model->get_category_list()))
		{
			$data['code'] = 1;
			$data['category_list'] = $category_list;
		}
		else
		{
			$data['code'] = 0;
			$data['info'] = "Error happens. Can not get the list of category. Please try to check server.";
		}

		if (!is_null($project_info = $this->project_model->get_project_detail($project_id))) {
			$data['code'] = 1;
			$data['project_info'] = $project_info;
		} else {
			$data['code'] = 0;
			$data['info'] = 'Error happens. Can not view detail this project.Please try again.';
		}

		$data['baseURL'] = base_url();
		$this->smarty->view('admin_project/admin_view_describe_project_form', $data);
	}
}