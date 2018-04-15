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
    
    public function Remove_All_Drivers($primary_key) {
        
        $sql = "DELETE dl1 FROM delivery dl1 JOIN driver dr1 ON dl1.Driver_ID = dr1.Driver_ID 
        WHERE dr1.Supplier_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));

        $sql = "DELETE d1 FROM driver d1 
        WHERE d1.Supplier_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));

        $sql = "DELETE i1 FROM idCard i1 JOIN driver dr1 ON i1.Card_ID = dr1.Card_ID 
        WHERE dr1.Supplier_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));

        $sql = "DELETE v1 FROM vehicle v1 
        WHERE v1.Supplier_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));

        $sql = "DELETE s1 FROM supplier s1 
        WHERE s1.Supplier_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        return true;
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
        
        $crud->callback_delete(array($this,'Remove_All_Drivers'));
		
		$output = $crud->render();
		$this->supplier_output($output);
	}
	
	function supplier_output($output = null)
	{
		$this->load->view('supplier_view.php', $output);
	}
    
    public function Remove_Invalid_Deliveries($primary_key) {
        
        $sql = "DELETE d1 FROM delivery d1 WHERE d1.Driver_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        $sql = "DELETE d1 FROM driver d1 WHERE d1.Card_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        $sql = "DELETE i1 FROM idCard i1 WHERE i1.Card_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        return true;
    }
    
    public function driver()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('driver');
		$crud->set_subject('driver');
		$crud->required_fields('Driver_ID');
		//$crud->display_as('itemDesc', 'Description');
		
        $crud->callback_delete(array($this,'Remove_Invalid_Deliveries'));
        
		$output = $crud->render();
		$this->driver_output($output);
	}
	
	function driver_output($output = null)
	{
		$this->load->view('driver_view.php', $output);
	}
    
    public function Remove_Invalid_Drivers($primary_key) {
        $sql = "UPDATE idCard i1 SET i1.Status = 'Expired' WHERE i1.Card_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        $sql = "DELETE d1 FROM delivery d1 WHERE d1.Driver_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        return true;
    }
    
    public function driverId()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('idcard');
		$crud->set_subject('idcard');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
        
        //$crud->set_relation('State_ID', 'driver_state', 'State_ID');
        
        $crud->callback_delete(array($this,'Remove_Invalid_Drivers'));
		
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
		$crud->columns('Delivery_ID', 'Supplier_ID', 'VRN', 'Venue_ID', 'Driver_ID');
		$crud->fields('Delivery_ID', 'Supplier_ID', 'VRN', 'Venue_ID', 'Driver_ID');
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
    
    public function logs()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('logs');
		$crud->set_subject('logs');
		$crud->columns('LogID', 'Type', 'Date', 'Description');
		$crud->fields('LogID', 'Type', 'Date', 'Description');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
		
		$output = $crud->render();
		$this->log_output($output);
	}
	
	function log_output($output = null)
	{
		$this->load->view('logs_view.php', $output);
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
