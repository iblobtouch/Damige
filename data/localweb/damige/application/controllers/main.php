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
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Field deletion', 'Supplier deleted', NOW());";
        $this->db->query($sql, array($id));

        $result = $conn->query($sql);
        
        return true;
    }
    
    public function supplier()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('supplier');
		$crud->set_subject('supplier');
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
        
        $crud->callback_delete(array($this,'Remove_All_Drivers'));
        
        $crud->required_fields('Supplier_ID');
		
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
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Field deletion', 'Driver deleted', NOW());";
        $this->db->query($sql, array($id));
        
        return true;
    }
    
    public function Add_ID($post_array, $primary_key) {
        
        $sql = "INSERT INTO `idCard`(`Card_ID`, `Start_Date`, `End_Date`, `Status`) 
VALUES ('" . $post_array['Driver_ID'] . "', NOW(), '2018-06-01' ,'Valid');";
        $this->db->query($sql, array($id));
        
        $sql = "UPDATE driver d1 SET d1.Card_ID = '" . $post_array['Driver_ID'] . "' WHERE d1.Driver_ID = '" . $post_array['Driver_ID'] . "'";
        $this->db->query($sql, array($id));
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Field updated', 'New Driver added', NOW());";
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
        $crud->callback_after_insert(array($this,'Add_ID'));
        
        $crud->set_relation('Supplier_ID', 'supplier', 'Supplier_ID');
        $crud->set_relation('Card_ID', 'idCard', 'Card_ID');
        
        $crud->required_fields('Driver_ID', 'Supplier_ID');
        
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
        
        $sql = "DELETE d1 FROM driver d1 WHERE d1.Card_ID ='" . $primary_key . "'";
        $this->db->query($sql, array($id));
        
        $sql = "INSERT INTO `logs`(`Type`, `Description`, `Date`) 
VALUES ('Field deletion', 'Driver ID deleted', NOW());";
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
        
        $crud->set_relation('Card_ID', 'driver', 'Card_ID');
        
        $crud->required_fields('Card_ID', 'Status');
		
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
		//$crud->required_fields('itemID', 'itemDesc');
		//$crud->display_as('itemDesc', 'Description');
        
        $crud->set_relation('Venue_ID', 'venue', 'Venue_ID');
        $crud->set_relation('Driver_ID', 'driver', 'Driver_ID');
        $crud->set_relation('VRN', 'vehicle', 'VRN');
        $crud->set_relation('Supplier_ID', 'supplier', 'Supplier_ID');
        
        $crud->required_fields('Delivery_ID', 'Venue_ID', 'Driver_ID', 'VRN', 'Supplier_ID', 'Date');
		
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
        
        $crud->required_fields('Venue_ID');
		
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
        $crud->unset_Add();
        $crud->unset_Edit();
		
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
