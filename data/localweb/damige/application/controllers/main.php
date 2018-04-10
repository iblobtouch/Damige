<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	 function __construct()
	{
		parent::__construct();	 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
	}
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('home');
	}
    
    public function supplier()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('supplier');
		$crud->set_subject('supplier');
		$crud->columns('Supplier Name', 'Goods Services', 'Based_In');
		$crud->fields('Supplier Name', 'Goods Services', 'Based_In');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->supplier_output($output);
	}
	
	function supplier_output($output = null)
	{
		$this->load->view('supplier_view.php', $output);
	}
    
    public function driver()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('driver');
		$crud->set_subject('driver');
		$crud->columns('Title', 'Driver name');
		$crud->fields('Title', 'Driver name');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->driver_output($output);
	}
	
	function driver_output($output = null)
	{
		$this->load->view('driver_view.php', $output);
	}
    
    public function driverId()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('idcard');
		$crud->set_subject('idcard');
		$crud->columns('Driver Name', 'Start Date', 'End Date');
		$crud->fields('Driver Name', 'Start Date', 'End Date');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->driverId_output($output);
	}
	
	function driverId_output($output = null)
	{
		$this->load->view('driverId_view.php', $output);
	}
    
    public function vehicle()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('vehicle');
		$crud->set_subject('vehicle');
		$crud->columns('Supplier_Supplier ID', 'Make', 'Model');
		$crud->fields('Supplier_Supplier ID', 'Make', 'Model');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->vehicle_output($output);
	}
	
	function vehicle_output($output = null)
	{
		$this->load->view('vehicle_view.php', $output);
	}
    
    public function delivery()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('delivery');
		$crud->set_subject('delivery');
		$crud->columns('Delivery ID', 'Supplier_Supplier ID', 'Vehicle_VRN', 'Venue_Venue ID');
		$crud->fields('Delivery ID', 'Supplier_Supplier ID', 'Vehicle_VRN', 'Venue_Venue ID');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->delivery_output($output);
	}
	
	function delivery_output($output = null)
	{
		$this->load->view('delivery_view.php', $output);
	}
    
    public function venue()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('venue');
		$crud->set_subject('venue');
		$crud->columns('Venue ID', 'Area', 'Address', 'Phone');
		$crud->fields('Venue ID', 'Area', 'Address', 'Phone');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->driver_output($output);
	}
	
	function venue_output($output = null)
	{
		$this->load->view('venue_view.php', $output);
	}
	
	
	public function querynav()
	{	
		$this->load->view('header');
		$this->load->view('querynav_view');
	}
		
	public function query1()
	{	
		$this->load->view('header');
		$this->load->view('query1_view');
	}
	
	public function query2()
	{	
		$this->load->view('header');
		$this->load->view('query2_view');
	}
	
	public function blank()
	{	
		$this->load->view('header');
		$this->load->view('blank_view');
	}
}
