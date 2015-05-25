<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author	Quang Nguyen
 */
class Project_model extends CI_Model
{
	private $table_name	= 'project_brief';
	private $category_table_name = 'category';

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	//===============================================================================================================================================
	/**
	 * FRONT END - Get project list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function get_project_list($record = '', $page = '', $column = 'id', $order = 'desc')
	{
		if($page == 0 || $page == null) $page = 1;// page co the thay the offsets o phan khai bao ham
     		$offset = ($page - 1) * $record;

		$this->db->distinct();
		$this->db->select($this->table_name. '.id');
		$this->db->select($this->table_name. '.title');
		$this->db->select($this->table_name. '.brief');
		$this->db->select($this->table_name. '.description');
		$this->db->select($this->table_name. '.date');
		$this->db->select($this->table_name. '.avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		$this->db->where($this->table_name. '.status', 1);
		$this->db->where($this->category_table_name. '.category_status', 1);
		
		$this->db->order_by($this->table_name.'.'.$column, $order);
		if (!empty($record)){
			$this->db->limit($record, $offset);
		}
		$query = $this->db->get();

		//return $query->num_rows() > 0 ? $query->result_array() : NULL;
		return $query->num_rows() > 0 ? $query->result() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * BACK END - Get project list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function admin_get_project_list($record = '', $page = '', $column = 'id', $order = 'desc')
	{
		if($page == 0 || $page == null) $page = 1;// page co the thay the offsets o phan khai bao ham
     		$offset = ($page - 1) * $record;

		$this->db->distinct();
		$this->db->select($this->table_name. '.id');
		$this->db->select($this->table_name. '.title');
		$this->db->select($this->table_name. '.brief');
		$this->db->select($this->table_name. '.description');
		$this->db->select($this->table_name. '.date');
		$this->db->select($this->table_name. '.avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		$this->db->order_by($this->table_name.'.'.$column, $order);
		if (!empty($record)){
			$this->db->limit($record, $offset);
		}
		$query = $this->db->get();

		//return $query->num_rows() > 0 ? $query->result_array() : NULL;
		return $query->num_rows() > 0 ? $query->result() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * Get project
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_project_by_id($project_id)
	{
		// ======== C1
		// $this->db->where('id', $project_id);
		// $query = $this->db->get($this->table_name);
		
		// return $query->num_rows() == 1 ? $query->row_array() : NULL;
		
		// ======== C2
	    return $this->db->select()
				        ->from($this->table_name)
				        ->where('id', $project_id)
				        ->get()
				        ->row();
	}

	//===============================================================================================================================================
	/**
	 * Get project detail
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_project_detail($project_id){
		$this->db->distinct();
		$this->db->select($this->table_name. '.id');
		$this->db->select($this->table_name. '.title');
		$this->db->select($this->table_name. '.brief');
		$this->db->select($this->table_name. '.description');
		$this->db->select($this->table_name. '.date');
		$this->db->select($this->table_name. '.avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		$this->db->where($this->table_name.'.id', $project_id);
		$query = $this->db->get();

		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * check exist project
	 *
	 * @param   string, string/int
	 * @return	bool
	 */
	function check_project_exist($type, $project_value)
	{
		// Check project exist by id
		if(strtolower($type)=="id")
		{
			$this->db->where('id', $project_value);
			$query = $this->db->get($this->table_name);

			return $query->num_rows() == 1;
		}
		// Check project exist by title
		else {
			$this->db->select('1', FALSE);
			$this->db->where('LOWER(title)=', strtolower($project_value));
			$query = $this->db->get($this->table_name);
			return $query->num_rows() == 1;
		}

	}
	//===============================================================================================================================================
	/**
	 * Create project
	 *
	 * @param	array
	 * @return	array or NULL
	 */
	function create_project($project)
	{
		$project['date'] = date('Y-m-d G:i:s', time()); 
		$project['status'] = 1; 

		if ($this->db->insert($this->table_name, $project)) {
			$project['id'] = $this->db->insert_id();
			return $project;
		}
		return NULL;
	}

	//===============================================================================================================================================
	/**
	 * Update project
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_project($project)
	{
		$project['date'] = date('Y-m-d G:i:s', time()); 
		$this->db->where('id', $project['id']);

		return $this->db->update($this->table_name, $project);
	}

	//===============================================================================================================================================
	/**
	 * Update project with avatar
	 *
	 * @param	array
	 * @return	bool
	 */
	function delete_old_avatar($project_id)
	{
		$file = $this->get_project_by_id($project_id);
		unlink('./userfiles/project/' . $file->avatar_name); 
	}

	//===============================================================================================================================================
	/**
	 * Delete project
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_project($project_id)
	{
		// ======== C1
		/*$fileUpload =  $this->get_project_by_id($project_id);
		if($fileUpload == "" || $fileUpload == NULL)
		{
        	return FALSE;
        }
        else {
			$this->db->where('id', $project_id);
			$this->db->delete($this->table_name);

			if ($this->db->affected_rows() == 1) 
			{
				unlink("./userfiles/project" . $fileUpload[0]['avatar_name']); //Delete file upload in folder
            	return TRUE;
			}
			else 
			{
			  return FALSE;
			}
		}*/

		// ======== C2
		$file = $this->get_project_by_id($project_id);
	    if (!$this->db->where('id', $project_id)->delete($this->table_name))
	    {
	        return FALSE;
	    }
		    unlink('./userfiles/project/' . $file->avatar_name);   
		    return TRUE;
	}

	//===============================================================================================================================================
	/**
	* Count all number of project
	* 
	* @return	int
	*
	*/
	function count_all_project()
	{
		$this->db->distinct();
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

	

}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */