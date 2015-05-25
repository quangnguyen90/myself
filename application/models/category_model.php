<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author	Quang Nguyen
 */
class Category_model extends CI_Model
{
	private $table_name = 'category';

	function __construct()
	{
		parent::__construct();
	}

	//===============================================================================================================================================
	/**
	 * EXTEND - Get category list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function get_category_list($type='p', $column = 'category_id', $order = 'desc')
	{
		$this->db->distinct();
		$this->db->where('LOWER(category_type)=', strtolower($type));
		$this->db->where('category_status', 1);
		
		$this->db->order_by($this->table_name.'.'.$column, $order);
		$query = $this->db->get($this->table_name);

		return $query->num_rows() > 0 ? $query->result() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * ADMIN = Get all category list
	 *
	 * @param	int,  string
	 * @return	array or NULL
	 */
	function get_all_category_list($record = '', $page = '', $column = 'category_id', $order = 'desc')
	{
		if($page == 0 || $page == null) $page = 1;// page co the thay the offsets o phan khai bao ham
     		$offset = ($page - 1) * $record;

		$this->db->distinct();
		$this->db->order_by($this->table_name.'.'.$column, $order);
		
		if (!empty($record)){
			$this->db->limit($record, $offset);
		}
		$query = $this->db->get($this->table_name);

		//return $query->num_rows() > 0 ? $query->result_array() : NULL;
		return $query->num_rows() > 0 ? $query->result() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * Get category
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_category_by_id($category_id)
	{
		$this->db->where('category_id', $category_id);
		$query = $this->db->get($this->table_name);
		
		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	//===============================================================================================================================================
	/**
	 * check exist category
	 *
	 * @param   string, string/int
	 * @return	bool
	 */
	function check_category_exist($type, $category_value)
	{
		// Check category exist by id
		if(strtolower($type)=="id")
		{
			$this->db->where('category_id', $category_value);
			$query = $this->db->get($this->table_name);

			return $query->num_rows() == 1;
		}
		// Check category exist by title
		else {
			$this->db->select('1', FALSE);
			$this->db->where('LOWER(category_title)=', strtolower($category_value));
			$query = $this->db->get($this->table_name);
			return $query->num_rows() == 1;
		}
	}
	//===============================================================================================================================================
	/**
	 * Create category
	 *
	 * @param	array
	 * @return	array or NULL
	 */
	function create_category($category)
	{
		$category['category_status'] = 1;
		if ($this->db->insert($this->table_name, $category)) {
			$category['category_id'] = $this->db->insert_id();
			return $category;
		}
		return NULL;
	}

	//===============================================================================================================================================
	/**
	 * Update category
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_category($category)
	{
		$this->db->where('category_id', $category['category_id']);

		return $this->db->update($this->table_name, $category);
	}

	//===============================================================================================================================================
	/**
	 * Delete category
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_category($category_id)
	{
		$this->db->where('category_id', $category_id);
		$this->db->delete($this->table_name);

		return $this->db->affected_rows() == 1 ? TRUE : FALSE;
	}

	//===============================================================================================================================================
	/**
	* Count all number of category
	* 
	* @return	int
	*
	*/
	function count_all_category()
	{
		$this->db->distinct();
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */