<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	// Construct
	
	function __construct(){
		parent::__construct();
		
		// Declare models
		
		$this->load->model('m_example');
		
		$this->data['content'] = ''; // empty content
	}
	
	function ajax_func() {
		if ($this->input->post() && $this->input->is_ajax_request()){
			$post = $this->input->post();

			echo $this->m_example->ajax_func($post);
		}
	}
	
	function delete_list() {
		if ($this->input->post() && $this->input->is_ajax_request()){
			$post = $this->input->post();

			echo $this->m_example->delete_list($post);
		}
	}
	
	function reset_list() {
		if ($this->input->post() && $this->input->is_ajax_request()){
			$post = $this->input->post();

			echo $this->m_example->reset_list($post);
		}
	}
	
	function set_check_value() {
		if ($this->input->post() && $this->input->is_ajax_request()){
			$post = $this->input->post();

			echo $this->m_example->set_check_value($post);
		}
	}
	
	// Render Index
	
	function index(){
		// Extend flash data
		
		//$this->session->keep_flashdata('error');
		//$this->session->keep_flashdata('message');
		
		// Get data from the example model
		
		$example_data = $this->m_example->example_data_array();
		
		
		// Give the example data to the view
		
		$this->data['example_data'] = $example_data;
		
		// Render page
		
		$this->render();
	}
	
	// Render 404
	
	function nada(){
		// Render page
		
		$this->render();
	}
	
	// Render list view (http://localhost/welcome/view/12345)
	
	function view($unique_id){
		// Get the individual list data
		
		$this->data['list_data'] = $this->m_example->get_a_list($unique_id);
		
		// Render page
		
		$this->render();
	}
}
