<?php

class Bitzon_model extends CI_Model {



public function __construct() {

		$this->load->database();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		$this->db->insert('bitzon', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}


	function SaveCallback($callback_data)
	{

	$query = $this->db->get_where('bitzon', array('uniqid' => $callback_data['uniqid']));

	if ($query->num_rows() > 0)

    {  
      	$this->db->update('bitzon', $callback_data, array('uniqid' => $callback_data['uniqid']));
    }

	{      
		$this->db->insert('bitzon', $callback_data);
	}


	if ($this->db->affected_rows() == '1')

		{
			return TRUE;
		}
	else
		{
			return FALSE;
		}


	}
}
