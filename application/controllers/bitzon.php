<?php

/* is passed
$orders = $payflow->orders(array(
   'foreign_order_id' => '1334',
   'total_amount' => '23.223',
   'custom_field' => 'foobar',
   'auth_token' => '4f7f0836cc321bfd78303508bd154a00'
));
*/



class Bitzon extends CI_controller
{
public function index($data = NULL)

	{
		//declare constants
		
		$authtoken = '4f7f0836cc321bfd78303508bd154a00';

		//load the libraries
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		// load the view

// perform validation

		$rule_config = array(
		               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'address_1',
                     'label'   => 'The first line of your address',
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'address_2',
                     'label'   => 'The second line of your address',
                     'rules'   => 'required'
                  ),
               array( 
               		 'field'   => 'total_amount',
               		 'label'   => 'total amount of bitcoins',
               		 'rules'   => 'required|integer'
               		));
                 
	$this->form_validation->set_rules($rule_config);
	//data placment here
$data = array('a' => 'b');

	if ($this->form_validation->run() === FALSE)
		{
$data = array('a' => 'b');
		$this->load->view('templates/header', $data);
		$this->load->view('bitcoinpayflow/index', $data);
		$this->load->view('templates/footer', $data);
		}

	else
// add authentication token and unique ID
		{
	$formreturnforbitcoinpayflow = array(
	'foreign_order_id' => uniqid(),
	'total_amount' => $this->input->post('total_amount'),
	'custom_field' => '',
	'auth_token' => $authtoken,
		);

// request the bitcoin address
	$payflow = new bitcoinpayflow_API();

	$orders = $payflow->orders($formreturnforbitcoinpayflow);

//strip the bitcoin address out

	$data['bitcoin_address'] = $orders['order']['bitcoin_address'];

// send it to the view

		$this->load->view('templates/header', $data);
		$this->load->view('bitcoinpayflow/index', $data);
		$this->load->view('templates/footer');
// send it off to the model
		}
	}

    public function about(){
    $this->load->helper(array('form','url'));
        $this->load->view('templates/header', $data);
        $this->load->view('static/about', $data);
        $this->load->view('templates/footer', $data);
    }

    public function contact(){
            $this->load->helper(array('form','url'));
        $this->load->view('templates/header', $data);
        $this->load->view('static/about', $data);
        $this->load->view('templates/footer', $data);
}
}


	class bitcoinpayflow_API extends Bitzon
	{

 //API Configuration - setting constants for the curl url
    const API_URL = 'https://bitcoinpayflow.com/';
    const RESULT_FORMAT = 'array'; //default is 'json'
    const EXT = '.php';
    
    private $apiMethods = array('orders', 'tokens'); //This labels the methods permissible
      
        
    // This is empty - is it functioanal in any way?
    public function __construct(){
        
    }
            
    //This provides a public facing access point for other functions to call this, takes two variables
    public function __call($method, $params = array()) {
        
        $this->_validateMethod($method); //Calls another function to check which methods $apimethods contain are valid
                            
        $url = $this->_buildUrl($method); //concatenates the API_URL onto the method - I will only be using orders

       // print_r($url); //displays it - not really needed
        
        $options = $this->_buildParams($method , $params); // really not sure what is going on here
                
        // @REMOVE Output POST variables
     //   $this->_pre_print($options, 'POST:' . $method);

        $result = $this->_connect($url, $options); //get the address
        
        $result = $this->_formatResults($result); // format it
        return $result; // post it
    }
    
private function _pre_print($var, $head = NULL){
        echo '<pre>';
        echo '<h2>' . $head . '</h2>';
        print_r($var);
        echo '</pre>';
        echo '<hr>';
}

    private function _buildParams($method, $params = array()){ /* looping through the first item of an array, which is also an array
    	// not sure why it recieves the $method - james?
        takes:
        $params = array(
		0 => array(
			  "a"=>"b",),
		2 => 3,
		);

		Then returns [a=>b]
        */
            foreach ($params[0] as $k => $v){
                $options[$k] = $v;
            }
        
                    
        
        return $options;
    }
    
        
    private function _buildUrl($method){
                       
        $url = self::API_URL . $method; //not sure what self is doing here. would declaring API_URL.$method work? How about $this->API_URL. Does that work?
        
        return $url;
    }
            
    private function _validateMethod($method){ //this is all fine
                           
        if(in_array($method, $this->apiMethods)){
                        return TRUE;
        } else {
            die('FAILURE: Unknown Method');
        }
    }
    
    private function _formatResults($results){ //as is this
        
        if(self::RESULT_FORMAT == strtolower('array')){
        $results = json_decode($results, true);
        }
        
        return $results;
    }
        
    private function _connect($url, $params = NULL){
        
        //open connection
        $ch = curl_init();
                        
        //set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HEADER, TRUE);
        
        //add POST fields
        if ($params != NULL){
                        
            //url encode params array before POST
            $postData = http_build_query($params, '', '&');
                        
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
                               
        //curl_setopt($ch,CURLOPT_HTTPHEADER,array());
        
        //MUST BE REMOVED BEFORE PRODUCTION (USE for SSL)
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; BTChash; '
            .php_uname('s').'; PHP/'.phpversion().')');

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        
        
        //curl_setopt($ch, CURLOPT_VERBOSE, 1);
        
        //execute CURL connection
        $returnData = curl_exec($ch);
                
        //$code = $this->returnCode($returnData);
        
        if( $returnData === false)
        {
            die('<br />Connection error:' . curl_error($ch));
        }
        else
        {
            //Log successful CURL connection
        }
        
        //close CURL connection
        curl_close($ch);
        
                        
        return $returnData;
    }
   
}
