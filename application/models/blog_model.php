<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author	Quang Nguyen
 */
class Blog_model extends CI_Model
{
	private $table_name	= 'blog_brief';
	private $category_table_name = 'category';

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	//===============================================================================================================================================
	/**
	 * FRONT END - Get blog list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function get_blog_list($record = '', $page = '', $column = 'blog_id', $order = 'desc')
	{
		if($page == 0 || $page == null) $page = 1;// page co the thay the offsets o phan khai bao ham
     		$offset = ($page - 1) * $record;

		$this->db->distinct();
		$this->db->select($this->table_name. '.blog_id');
		$this->db->select($this->table_name. '.blog_title');
		$this->db->select($this->table_name. '.blog_brief');
		$this->db->select($this->table_name. '.blog_description');
		$this->db->select($this->table_name. '.blog_date');
		$this->db->select($this->table_name. '.blog_avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.blog_status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		//only get actived blog
		$this->db->where($this->table_name. '.blog_status', 1);
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
	 * BACK END - Get blog list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function admin_get_blog_list($record = '', $page = '', $column = 'blog_id', $order = 'desc')
	{
		if($page == 0 || $page == null) $page = 1;// page co the thay the offsets o phan khai bao ham
     		$offset = ($page - 1) * $record;

		$this->db->distinct();
		$this->db->select($this->table_name. '.blog_id');
		$this->db->select($this->table_name. '.blog_title');
		$this->db->select($this->table_name. '.blog_brief');
		$this->db->select($this->table_name. '.blog_description');
		$this->db->select($this->table_name. '.blog_date');
		$this->db->select($this->table_name. '.blog_avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.blog_status');
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
	 * Get blog
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_blog_by_id($blog_id)
	{
		// ======== C1
		// $this->db->where('id', $blog_id);
		// $query = $this->db->get($this->table_name);
		
		// return $query->num_rows() == 1 ? $query->row_array() : NULL;
		
		// ======== C2
	    return $this->db->select()
				        ->from($this->table_name)
				        ->where('blog_id', $blog_id)
				        ->get()
				        ->row();
	}
	//===============================================================================================================================================
	/**
	 * Get blog detail
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_blog_detail($blog_id){
		$this->db->distinct();
		$this->db->select($this->table_name. '.blog_id');
		$this->db->select($this->table_name. '.blog_title');
		$this->db->select($this->table_name. '.blog_brief');
		$this->db->select($this->table_name. '.blog_description');
		$this->db->select($this->table_name. '.blog_date');
		$this->db->select($this->table_name. '.blog_avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.blog_status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		$this->db->where($this->table_name.'.blog_id',$blog_id);
		$query = $this->db->get();

		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * FRONT END - Get blog list by title
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_blog_list_by_title($blog_title){
		$this->db->distinct();
		$this->db->select($this->table_name. '.blog_id');
		$this->db->select($this->table_name. '.blog_title');
		$this->db->select($this->table_name. '.blog_brief');
		$this->db->select($this->table_name. '.blog_date');
		$this->db->select($this->table_name. '.blog_avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.blog_status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		//only get actived blog
		$this->db->where($this->table_name. '.blog_status', 1);
		$this->db->where($this->category_table_name. '.category_status', 1);

		$this->db->like('LOWER(blog_title)', strtolower($blog_title));
		$query = $this->db->get();

		return $query->num_rows() > 0 ? $query->result() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * FRONT END - Get blog list by category id
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_blog_list_by_category_id($category_id){
		$this->db->distinct();
		$this->db->select($this->table_name. '.blog_id');
		$this->db->select($this->table_name. '.blog_title');
		$this->db->select($this->table_name. '.blog_brief');
		$this->db->select($this->table_name. '.blog_date');
		$this->db->select($this->table_name. '.blog_avatar_name');
		$this->db->select($this->table_name. '.category_id');
		$this->db->select($this->table_name. '.blog_status');
		$this->db->select($this->category_table_name. '.category_title');
		$this->db->from($this->table_name);
		$this->db->join($this->category_table_name, $this->table_name. '.category_id ='.$this->category_table_name.'.category_id');
		
		//only get actived blog
		$this->db->where($this->table_name. '.blog_status', 1);
		$this->db->where($this->category_table_name. '.category_status', 1);

		$this->db->where($this->table_name. '.category_id', $category_id);
		$query = $this->db->get();

		return $query->num_rows() > 0 ? $query->result() : NULL;
	}



	//===============================================================================================================================================
	/**
	 * check exist blog
	 *
	 * @param   string, string/int
	 * @return	bool
	 */
	function check_blog_exist($type, $blog_value)
	{
		// Check blog exist by id
		if(strtolower($type)=="id")
		{
			$this->db->where('blog_id', $blog_value);
			$query = $this->db->get($this->table_name);

			return $query->num_rows() == 1;
		}
		// Check blog exist by title
		else {
			$this->db->select('1', FALSE);
			$this->db->where('LOWER(blog_title)=', strtolower($blog_value));
			$query = $this->db->get($this->table_name);
			return $query->num_rows() == 1;
		}
	}
	//===============================================================================================================================================
	/**
	 * Create blog
	 *
	 * @param	array
	 * @return	array or NULL
	 */
	function create_blog($blog)
	{
		$blog['blog_date'] = date('Y-m-d G:i:s', time()); 
		$blog['blog_status'] = 1; 

		if ($this->db->insert($this->table_name, $blog)) {
			$blog['blog_id'] = $this->db->insert_id();
			return $blog;
		}
		return NULL;
	}

	//===============================================================================================================================================
	/**
	 * Update blog
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_blog($blog)
	{
		$blog['blog_date'] = date('Y-m-d G:i:s', time()); 
		$this->db->where('blog_id', $blog['blog_id']);

		return $this->db->update($this->table_name, $blog);
	}

	//===============================================================================================================================================
	/**
	 * Update blog with avatar
	 *
	 * @param	array
	 * @return	bool
	 */
	function delete_old_avatar($blog_id)
	{
		$file = $this->get_blog_by_id($blog_id);
		unlink('./userfiles/blog/' . $file->blog_avatar_name); 
	}

	//===============================================================================================================================================
	/**
	 * Delete blog
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_blog($blog_id)
	{
		// ======== C1
		/*$fileUpload =  $this->get_blog_by_id($blog_id);
		if($fileUpload == "" || $fileUpload == NULL)
		{
        	return FALSE;
        }
        else {
			$this->db->where('blog_id', $blog_id);
			$this->db->delete($this->table_name);

			if ($this->db->affected_rows() == 1) 
			{
				unlink("./userfiles/" . $fileUpload[0]['blog_avatar_name']); //Delete file upload in folder
            	return TRUE;
			}
			else 
			{
			  return FALSE;
			}
		}*/

		// ======== C2
		$file = $this->get_blog_by_id($blog_id);
	    if (!$this->db->where('blog_id', $blog_id)->delete($this->table_name))
	    {
	        return FALSE;
	    }
		    unlink('./userfiles/blog/' . $file->blog_avatar_name);   
		    return TRUE;
	}

	//===============================================================================================================================================
	/**
	* Count all number of blog
	* 
	* @return	int
	*
	*/
	function count_all_blog()
	{
		$this->db->distinct();
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

	//====================================================================================================
	/**
	* Count all number of blog by title
	* 
	* @param	string
	* @return	int
	*/
	function count_all_blog_by_title($blog_title)
	{
		$this->db->distinct();
		$this->db->like('LOWER(blog_title)', strtolower($blog_title));
		
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

	//====================================================================================================
	/**
	* Count all number of blog by title
	* 
	* @param	string
	* @return	int
	*/
	function count_all_blog_by_category_id($category_id)
	{
		$this->db->distinct();
		$this->db->where($this->table_name. '.category_id', $category_id);
		
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

}

/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */