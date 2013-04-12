<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  MY_Session
* 
* Author:  Kevin Kneifel
* Created:  10.22.2012
* 
* Description:  Class to extend the CodeIgniter Session Class.
* 
*/

class MY_Session extends CI_Session
{
	// Construct
	
	function __construct(){
		parent::__construct();
		
		// Pass the controller
		
		$this->CI =& get_instance();
	}
	
	// Session update fix for AJAX
	
	public function sess_update(){
		if (!$this->CI->input->is_ajax_request()){
			parent::sess_update();
		}
	}
	
	// Keep flashdata
	
	function keep_all_flashdata($key = NULL){
		// 'old' flashdata gets removed.  Here we mark all
		// flashdata as 'new' to preserve it from _flashdata_sweep()
		// Note the function will NOT return FALSE if the $key
		// provided cannot be found, it will retain ALL flashdata
		
		if($key === NULL){
			foreach($this->userdata as $k => $v){
				$old_flashdata_key = $this->flashdata_key.':old:';
				if (strpos($k, $old_flashdata_key) !== false){
					$new_flashdata_key = $this->flashdata_key.':new:';
					$new_flashdata_key = str_replace($old_flashdata_key, $new_flashdata_key, $k);
					$this->set_userdata($new_flashdata_key, $v);
				}
			}
			return true;
			
		}elseif (is_array($key)){
			foreach($key as $k){
				$this->keep_flashdata($k);
			}
		}
		
		$old_flashdata_key = $this->flashdata_key.':old:'.$key;
		$value = $this->userdata($old_flashdata_key);

		$new_flashdata_key = $this->flashdata_key.':new:'.$key;
		$this->set_userdata($new_flashdata_key, $value);
	}
	
	// Start timeout
	
	function start_timeout(){
		$data = array(
			'start' => time(),
			'timeout' => 600
		);
		
		$this->set_userdata($data);
	}
	
	// Refresh timeout
	
	function refresh_timeout(){
		$this->set_userdata('start', time());
	}
	
	// Validate timeout
	
	function validate_timeout(){
		$start = $this->userdata('start');
		$timeout = $this->userdata('timeout');
		
		if (time() > ($start + $timeout)){
			return FALSE;	
		}else{
			return TRUE;	
		}
	}
	
	// Clear timeout
	
	function clear_timeout(){
		$this->unset_userdata('start');
		$this->unset_userdata('timeout');	
	}
}
