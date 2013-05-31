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

        // Set title

        $data['title'] = "Home";
        //declare constants
        
        $authtoken = '343352b4ac38e78c31e3039a719403a6';// <- Test token //'4f7f0836cc321bfd78303508bd154a00'; <- live token

        //load the libraries
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Bitzon_model');
        // load the view
{           
        $this->form_validation->set_rules('full_name', 'Full name', 'required');            
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');            
        $this->form_validation->set_rules('address_line_1', 'Address Line 1', 'required');          
        $this->form_validation->set_rules('address_line_2', 'Address Line 2', 'required');          
        $this->form_validation->set_rules('address_line_3', 'Address Line 3', '');          
        $this->form_validation->set_rules('country', 'Country', '');            
        $this->form_validation->set_rules('postcode_zip', 'Postcode/ZIP', '');          
        $this->form_validation->set_rules('total_amount_promised', 'total_amount_promised', 'required|numeric');
            
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
        $this->load->view('templates/header', $data);
        $this->load->view('bitzonviews/index', $data);
        $this->load->view('templates/footer', $data);
        }
        else // passed validation proceed to post success logic
        {
       
            

 // Build the data to send to bitcoin payflow


    $BCPFdata= array( //BitcoinPayFlow data
    'foreign_order_id' => $unique_id = uniqid(),
    'total_amount' => $this->input->post('total_amount'),
    'custom_field' => '',
    'auth_token' => $authtoken, // makie it the test auth token
);

// request the bitcoin address  using strigona's library
    $payflow = new bitcoinpayflow_API();
// Getting the data
    $BCPFreturn = $payflow->orders($BCPFdata); 

//strip the bitcoin address out sending it to the data variable

    $data['bitcoin_address'] = $BCPFreturn['order']['bitcoin_address'];


     // build array for the model

            $form_data = array(
                            'full_name' => set_value('full_name'),
                            'email_address' => set_value('email_address'),
                            'address_line_1' => set_value('address_line_1'),
                            'address_line_2' => set_value('address_line_2'),
                            'address_line_3' => set_value('address_line_3'),
                            'country' => set_value('country'),
                            'postcode_zip' => set_value('postcode_zip'),
                            'total_amount_promised' => set_value('total_amount_promised'),
                            'uniqid' => $unique_id,
                            'order_timestamp' => date('Y-m-d H:i:s'),
                            'bitcoin_address_displayed' => $BCPFreturn['order']['bitcoin_address'],   
                        );
//

            // run insert model to write data to db
        
            if ($this->Bitzon_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {


        $this->load->view('templates/header', $data);
        $this->load->view('bitzonviews/index', $data);
        $this->load->view('templates/footer');

            }
            else
            {
            echo 'An error occurred saving your information. Please try again later';
            // Or whatever error handling is necessary
            }
        }
    }
    function success()
    {
            echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
            sessions have not been used and would need to be added in to suit your app';
    }
}



// send it off to the model


    public function about(){

        $data['title'] = "About";
        $this->load->helper(array('form','url'));
        $this->load->view('templates/header', $data); //returnData
        $this->load->view('bitzonviews/about', $data);
        $this->load->view('templates/footer', $data);
    }

    public function contact(){
        $data['title'] = "Contact";
        $this->load->helper(array('form','url'));
        $this->load->view('templates/header', $data);
        $this->load->view('bitzonviews/about', $data);
        $this->load->view('templates/footer', $data);
}

public function products($asin){


    function __construct()
    {
        error_reporting(E_ALL);
        parent::__construct();
        $this->load->library('amazon_api');
        $this->load->helper('form');
        $this->load->library('pagination');
    }
 
 
     function index()
    {
 
 
    try{
    $result=$this->amazon_api->getItemByAsin("B008UAAE44");
             }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
 
     $JSON = json_encode($result);
     echo $JSON;


}
}}












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
