<?php
class Contact extends CI_Controller{
    
	function __construct(){
		parent::__construct();
		$this->load->model('contact_model');
    }
    
	function index(){
		$this->load->view('contact_view');
	}

	function contact_data(){
		$data=$this->contact_model->contact_list();
		echo json_encode($data);
	}

	function postItem(){
		$fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
		$email = $this->input->post('email');
        $contact = $this->input->post('contact');
		$data = $this->contact_model->postItem($fname, $lname, $email, $contact);
		echo json_encode($data);
	}

	function updateItem(){
		$id = $this->input->post('id');
		$fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
		$email = $this->input->post('email');
        $contact = $this->input->post('contact');
		$data=$this->contact_model->updateItem($id, $fname, $lname, $email, $contact);
		echo json_encode($data);
    }
    
    function getID(){
		$id=$this->input->get('id');
		$data=$this->contact_model->getItemID($id);
		echo json_encode($data);
	}

	function deleteItem(){
		$id=$this->input->post('id');
		$data=$this->contact_model->deleteItem($id);
		echo json_encode($data);
	}

}