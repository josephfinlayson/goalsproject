<?php

class goalsproject_model extends CI_Model {



public function __construct() {

		$this->load->database();
	}
	

	function retrieveqs($person)
	{
		$this->db->where('person', $person); 
		$this->db->order_by("timestamp", "desc"); 
		$query = $this->db->get('goalsproject', 1, 0);
		return $query->result();
	}
	
	function SaveForm($form_data)
	{	$this->db->order_by("timestamp", "asc");
		$this->db->insert('goalsproject', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	function getanswers($person){

		$this->db->order_by("timestamp", "desc"); 
		$this->db->where('person', $person); 
		$query = $this->db->get('goalsproject', 10, 0);

	return  $query->result_array();
	}
}
