<?php


//These are the variable which will be returned as payment notifications

/*
$dbi['amount']
$dbi['bitcoin_address']
$dbi['category']
$dbi['foreign_order_id']
$dbi['number_of_confirmations']
$dbi['order_status']
$dbi['transaction_fee']
$dbi['transaction_timestamp']
$dbi['signature']
*/

Class callback extends CI_controller {


public function index() {

	$apikey = '343352b4ac38e78c31e3039a719403a6'; // Test 4f7f0836cc321bfd78303508bd154a00 //Live
	$this->load->database();
//$step1 = '{"Payment Notification":{"category":"receive","transaction_timestamp":1307671121,"signature":"47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c","amount":"2.21","order_status":"open","foreign_order_id":"53","number_of_confirmations":1,"transaction_fee":"0.0","bitcoin_address":"1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD"}}';
//$step2 = $step1 . '';

//$step1 = strval($dbi);
// $indata = $myText = (string)$myVar;
// json

$indata = file_get_contents('php://input'); //live

//$indata = "Payment%20Notification[category]=receive&Payment%20Notification[transaction_timestamp]=1307671121&Payment%20Notification[signature]=47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c&Payment%20Notification[amount]=2.21&Payment%20Notification[foreign_order_id]=".uniqid()."&Payment%20Notification[number_of_confirmations]=1&Payment%20Notification[order_status]=open&Payment%20Notification[transaction_fee]=0.0&Payment%20Notification[bitcoin_address]=1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD";

//$indata=json_decode(parse_str($indata),TRUE);

// $indata = str_replace("%20", "_", $indata);
// $indata = parse_str($indata);

$indata = (json_decode($indata, TRUE));


// $this->db->set('uniqid', $indata);
// $this->db->insert('bitzon');


// echo "THIS IS ALL DEFINED VARS";
// print_r(get_defined_vars());

// echo "THIS IS INDATA";
// print_r($indata);

// echo "THIS IS PAYMENT NOTIFICATION";

// print_r($Payment_Notification);


// echo "THIS IS PAYMENT NOTIFICATION array";

// print_r($indata['Payment_Notification']);

$dbi = $indata['Payment Notification'];

print_r($dbi);
$indata = $dbi['category'];
//$indata=['Payment Notification']['bitcoin_address'];

$this->load->model('Bitzon_model');
//$dbi = json_decode($dbi);
//$posting = print_r($dbi);


        //     [category] => receive
        //     [transaction_timestamp] => 1307671121
        //     [signature] => 47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c
        //     [amount] => 2.21
        //     [foreign_order_id] => 53
        //     [number_of_confirmations] => 1
        //     [order_status] => open
        //     [transaction_fee] => 0.0
        //     [bitcoin_address] => 1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD
        // )
//strtotime($dbi['transaction_timestamp'])


	$secureString = 'amount=' . $dbi['amount'] . 'bitcoin_address=' . $dbi['bitcoin_address']
	                . 'category=' . $dbi['category'] . 'foreign_order_id=' . $dbi['foreign_order_id']
	                . 'number_of_confirmations=' . $dbi['number_of_confirmations'] . 'order_status='
	                . $dbi['order_status'] . 'transaction_fee=' . $dbi['transaction_fee']
	                . 'transaction_timestamp=' . $dbi['transaction_timestamp'];
	
	$secureString = hash('sha256', $apikey . $secureString);
	
	if ($secureString == $dbi['signature']){
	    
	    //Save the results of the POST to a database

		$callback_data = array(
	    // 'category' => $dbi['category'],
	   'transaction_timestamp' => date('Y-m-d H:i:s', $dbi['transaction_timestamp']),
	   //'signature' => $dbi['signature'],
	   'bitcoins_recieved' => $dbi['amount'],
	   'uniqid' => $dbi['foreign_order_id'], //primary key
	   'number_of_confirmations' => $dbi['number_of_confirmations'],
	   'order_status' => $dbi['order_status'],
	   'transaction_fee' => $dbi['transaction_fee'],
	   'bitcoin_address_recieved' => $dbi['bitcoin_address']
	);




            if ($this->Bitzon_model->SaveCallback($callback_data) == TRUE) // the information has therefore been successfully saved in the db
            {


			echo "data has been saved";

            }
            else
            {

            echo "Data has not been saved";
            }

	    
	} else {
	    die('Unauthorized');
	}
	
	}



//$this->load->view('callback/test'); 	


	
	// $dbconn2 = pg_connect("host=localhost port=5432 dbname=mydb");
	
	
	
	// $secureString = 'amount=' . $dbi['amount'] . 'bitcoin_address=' . $dbi['bitcoin_address']
	//                 . 'category=' . $dbi['category'] . 'foreign_order_id=' . $dbi['foreign_order_id']
	//                 . 'number_of_confirmations=' . $dbi['number_of_confirmations'] . 'order_status='
	//                 . $dbi['order_status'] . 'transaction_fee=' . $dbi['transaction_fee']
	//                 . 'transaction_timestamp=' . $dbi['transaction_timestamp'];
	
	// $secureString = hash('sha256','Your API Key' . $secureString);
	
	// if ($secureString == $dbi['signature']){
	    
	//     //Save the results of the POST to a database
	//     //-----refer to variables listed at beginning of script
	    
	// } else {
	//     die('Unauthorized');
	// }
	
	// }

//$dbconn2 = pg_connect("host=localhost port=5432 dbname=mydb");
}