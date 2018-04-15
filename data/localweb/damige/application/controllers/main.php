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
		$crud->columns('Supplier_ID', 'Supplier_Name', 'Goods_Services', 'Based_In');
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
		$crud->columns('Driver_ID', 'Title', 'Driver_name');
		$crud->fields('Driver_ID','Title', 'Driver_name');
		$crud->required_fields('Driver_ID');
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
		$crud->columns('Card_ID', 'Driver_Name', 'Start_Date', 'End_Date');
		$crud->fields('Card_ID', 'Driver_Name', 'Start_Date', 'End_Date');
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
		$crud->columns('Supplier_ID', 'Make', 'Model');
		$crud->fields('Supplier_ID', 'Make', 'Model');
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
		$crud->columns('Delivery_ID', 'Supplier_ID', 'Vehicle_VRN', 'Venue_ID');
		$crud->fields('Delivery_ID', 'Supplier_ID', 'Vehicle_VRN', 'Venue_ID');
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
		$crud->columns('Venue_ID', 'Area', 'Address', 'Phone');
		$crud->fields('Venue_ID', 'Area', 'Address', 'Phone');
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
    
    public function validate() {
        $form_data = $this->input->post();
        echo $form_data;
    }
}
