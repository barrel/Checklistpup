<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  MY_Controller
* 
* Author:  Ben Edmunds
* Created:  7.21.2009
* 
* Description:  Class to extend the CodeIgniter Controller Class.  All controllers should extend this class.
* 
*/

class MY_Controller extends CI_Controller
{
	protected $data = array();
	protected $messages = array();
	protected $errors = array();
	protected $controller_name;
	protected $action_name;
	protected $previous_controller_name;
	protected $previous_action_name;
	protected $save_previous_url = false;
	protected $page_title;
	
	// Construct
	
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		
		// Save the previous controller and action name from session
		$this->previous_controller_name = $this->session->flashdata('previous_controller_name'); 
		$this->previous_action_name = $this->session->flashdata('previous_action_name'); 
		
		// Set the current controller and action name
		$this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
		$this->action_name = $this->router->fetch_method();
		
		// Pass the controller
		
		$this->CI =& get_instance();
	}
	
	// Destruct
	
	/*
	function __destruct(){
		// Save the controller and action names in session
		
		if ($this->save_previous_url) {
			$this->session->set_flashdata('previous_controller_name', $this->previous_controller_name);
			$this->session->set_flashdata('previous_action_name', $this->previous_action_name);
		} else {
			$this->session->set_flashdata('previous_controller_name', $this->controller_name);
			$this->session->set_flashdata('previous_action_name', $this->action_name);
		}
	}
	*/
	
	// Render template
	
	protected function render($template = 'main', $view = NULL, $data = NULL){
		$view_path = $view ? $view . '.php' : $this->controller_name . '/' . $this->action_name . '.tpl.php'; // Set the path off the view
		
		if ($data){
			$this->data['data'] = $data; // Pass data if it exists
		}
		
		if (file_exists(APPPATH . 'views/' . $view_path)) {
			$this->data['content'] .= $this->load->view($view_path, $this->data, true); // Load the view
		}
 		
		$this->load->view('layouts/' . $template . '.tpl.php', $this->data); // Load the template
	}
	
	// Save URL switch
	
	protected function save_url(){
		$this->save_previous_url = true;
	}
	
	// Force SSL
	
	protected function force_ssl(){
		// Retain flash-data and force https://
		
		if (!$this->config->config['test_mode']){
			if (!isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'on'){
				$this->session->keep_all_flashdata();
				$url = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				redirect($url);
				exit;
			}
		}
	}
	
	// Force standard
	
	protected function force_standard(){
		// Unset transaction data
		
		$this->session->unset_userdata('tr_trans');
		
		// Retain flash-data and force http://
		
		if (!$this->config->config['test_mode']){
			if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
				$this->session->keep_all_flashdata();
				$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				redirect($url);
				exit;
			}	
		}
	}
	
	// Check selected
	
	function get_selected($str, $val, $checked = FALSE){
		if ($checked == TRUE){
			if ($str == $val) return ' checked="checked"';
		}else{
			if ($str == $val) return ' selected="selected"';
		}
	}
	
	// Set messages
	
	function set_messages(){
		if ($this->session->flashdata('message')){
			$this->messages[] = $this->session->flashdata('message');
		}
		if ($this->session->flashdata('error')){
			$this->errors[] = $this->session->flashdata('error');
		}
		
		$this->data['alerts']['messages'] = $this->messages;
		$this->data['alerts']['errors'] = $this->errors;
	}
	
	// Upload image
	
	function upload_image($field){
		// Configure the upload class
		
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		
		$this->load->library('upload', $config);
		
		// Upload the file
		
		if (!$this->upload->do_upload($field)){
			$this->errors[] = $this->upload->display_errors('', '');
			$this->session->set_flashdata('error', $this->errors);
		}else{
			$img_data = $this->upload->data();
			$image['path'] = $img_data['full_path'];
			$image['href'] = site_url('/uploads/'.$img_data['file_name']);
		}
		
		return $image;
	}
}
