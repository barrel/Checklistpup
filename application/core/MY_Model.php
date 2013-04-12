<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  MY_Model
* 
* Author:  Kevin Kneifel
* Created:  10.22.2012
* 
* Description:  Class to extend the CodeIgniter Model Class.  All models should extend this class.
* 
*/

class MY_Model extends CI_Model
{
	protected $_countries;
	
	// Construct
	
	function __construct(){
		parent::__construct();
		
		// Populate data arrays
		
		$this->_countries = $this->get_countries();
	}
	
	// Sort results
	
	function sort_results($results, $key, $sort = FALSE){
		// Create the output array
		
		$sorted = array();
		
		// Order results by key
		
		if (isset($results)){
			foreach ($results as $result){
				$kstr = $result[$key];
				$sorted[$kstr] = array();
				
				foreach ($result as $k => $v){
					$sorted[$kstr][$k] = $v;
				}
			}
			
			// Sort the results by key
			
			if ($sort){
				ksort($sorted);
			}
			
			// Return the array
			
			return $sorted;
		}
	}
	
	// Countries array
	
	function array_countries(){
		return $this->sort_results($this->_countries, 'id');
	}
	
	// Get countries
	
	function get_countries(){
		// Get the data
		
		$this->db->select('*');
		$this->db->from('countries');
		
		$query = $this->db->get();
		
		// Return the object
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}
