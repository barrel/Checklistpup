<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Example extends MY_Model
{
	protected $example_data = array();
	
	// Construct
	
	function __construct(){
		parent::__construct();
		
		// Get the data from the DB
		
		$this->db->select('*');
		$this->db->from('example_table');
		$query = $this->db->get();
		$this->example_data = $query->result_array();
	}
	
	// Get example data
	
	function example_data_array(){
		return $this->example_data;
	}
	
	// Get a list
	
	function get_a_list($unique_id){
		$sort_data = $this->sort_example_data('unique_id');
		
		return $sort_data[$unique_id];
	}
	
	// Sort example data
	
	function sort_example_data($str){
		// This is redundant, sort_results is in MY_Model
	
		return $this->sort_results($this->example_data, $str);
	}
	
	// Add list 
	
	function ajax_func($post) {
		$list = $post["list"];
		$list = explode("\n", $list);
		$count = count($list);
		$jsoned = json_encode($list, JSON_FORCE_OBJECT);
		
		$unique = uniqid();
		$unique = md5($unique);
		$unique = substr($unique, -5);
		
		$name = $post["name"];
		$values = array();
		for ($i=0; $i<$count; $i++) {
			$values[$i] = "0"; 
		}
		$jsoned_values = json_encode($values, JSON_FORCE_OBJECT);
		
		// Query
		
		$data = array(
			'checklist' => $jsoned,
			'unique_id' => $unique,
			'list_name' => $name,
			'set_value' => $jsoned_values
		);
		
		// Add to database

		if (!$this->db->insert('example_table', $data)){
			return 'FALSE';	
		}
		
		$output = $unique;
		
		return $output;
	}
	
	// Delete list
	
	function delete_list($post) {
		$unique = $post['unique_id'];
		
		// Query 
		
		$this->db->where('unique_id', $unique);
		if (!$this->db->delete('example_table')){
			return 'FALSE';	
		}
		
		return 'TRUE';
	}
	
	// Reset list
	
	function reset_list($post) {
		$unique = $post['unique_id'];
		
		//Get array from db
		
		$this->db->select('set_value');
		$this->db->from('example_table');
		$this->db->where('unique_id', $unique);
		$query = $this->db->get(); 
		$results = $query->result_array(); 
		$results = json_decode($results[0]['set_value'], true); 
		//$results[$which] = $set_to; 
		$count = count($results);
		for ($i=0; $i<$count; $i++) {
			$results[$i] = "0"; 
		}
		$jsoned_results = json_encode($results, JSON_FORCE_OBJECT); 
		
		// Query 
		
		$data = array(
			'set_value' => $jsoned_results
		);
		
		$this->db->where('unique_id', $unique);
		if (!$this->db->update('example_table', $data)){
			return 'FALSE';	
		}
		
		return 'TRUE';
	}
	
	// Edit list
	
	function edit_list($post) {
		$unique = $post['unique_id'];
		
		return $unique;
	}
	
	// Set checked value
	
	function set_check_value($post) {
		$which = $post['which_box'];
		$unique = $post['unique_id'];
		$class = $post['class'];
		if ($class == "list-check") {
			$set_to = "1";
		} else {
			$set_to = "0";
		}
		
		// Get array from db
		
		$this->db->select('set_value');
		$this->db->from('example_table');
		$this->db->where('unique_id', $unique);
		$query = $this->db->get(); 
		$results = $query->result_array(); 
		$results = json_decode($results[0]['set_value'], true); ;
		$results[$which] = $set_to; 
		$jsoned_results = json_encode($results, JSON_FORCE_OBJECT); 
		
		// Query 
		
		$data = array(
			'set_value' => $jsoned_results
		);
		
		$this->db->where('unique_id', $unique);
		if (!$this->db->update('example_table', $data)){
			return 'FALSE';	
		}
		
		return 'TRUE';
	}
}
