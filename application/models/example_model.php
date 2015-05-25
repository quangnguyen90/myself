<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author	Phat Pham
 */
class example_model extends CI_Model
{
	private $table_name	= 'example';

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get examples list
	 *
	 * @param	int, int, string, string
	 * @return	array or NULL
	 */
	function get_examples_list($num = '', $offset = '', $column = 'date_created', $order = 'desc')
	{
		if (!empty($num)){
			$offset = empty($offset) ? 0 : $offset;
			$this->db->limit($num, $offset);
		}
		$this->db->order_by($column, $order);
		$query = $this->db->get($this->table_name);

		return $query->num_rows() > 0 ? $query->result_array() : NULL;
	}

	/**
	 * Get example
	 *
	 * @param   int
	 * @return	array or NULL
	 */
	function get_example($example_id)
	{
		$this->db->where('id', $example_id);
		$query = $this->db->get($this->table_name);
		
		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	/**
	 * check exist example
	 *
	 * @param   int
	 * @return	bool
	 */
	function check_exist($example_id)
	{
		$this->db->where('id', $example_id);
		$query = $this->db->get($this->table_name);

		return $query->num_rows() == 1;
	}

	/**
	 * Create example
	 *
	 * @param	array
	 * @return	array or NULL
	 */
	function create_example($example)
	{
		$example['user_id'] = $this->session->userdata['user_id'];

		if ($this->db->insert($this->table_name, $example)) {
			$example['id'] = $this->db->insert_id();

			return $example;
		} else {
			return NULL;
		}
	}

	/**
	 * Update example
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_example($example)
	{
		$this->db->where('id', $example['id']);

		return $this->db->update($this->table_name, $example);
	}

	/**
	 * Delete example
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_example($example_id)
	{
		$this->db->where('id', $example_id);
		$this->db->delete($this->table_name);

		return $this->db->affected_rows() == 1;
	}
}

/* End of file example_model.php */
/* Location: ./application/models/example_model.php */