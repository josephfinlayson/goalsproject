<?php

class test extends CI_controller {
	public function index(){
	$data = array('a' => 'b', );
	$this->load->view('bitcoinpayflow/index', $data);
}
}