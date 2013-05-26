<?php
//These are the variable which will be returned as payment notifications

/*
$_POST['amount']
$_POST['bitcoin_address']
$_POST['category']
$_POST['foreign_order_id']
$_POST['number_of_confirmations']
$_POST['order_status']
$_POST['transaction_fee']
$_POST['transaction_timestamp']
$_POST['signature']
*/

Class callback extends CI_controller {

public function index() {
//$step1 = '{"Payment Notification":{"category":"receive","transaction_timestamp":1307671121,"signature":"47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c","amount":"2.21","order_status":"open","foreign_order_id":"53","number_of_confirmations":1,"transaction_fee":"0.0","bitcoin_address":"1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD"}}';
//$step2 = $step1 . '';

//$step1 = strval($_POST);
// $indata = $myText = (string)$myVar;
// json

//$indata = file_get_contents('php://input');
$indata = "Payment%20Notification[category]=receive&Payment%20Notification[transaction_timestamp]=1307671121&Payment%20Notification[signature]=47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c&Payment%20Notification[amount]=2.21&Payment%20Notification[foreign_order_id]=".uniqid()."&Payment%20Notification[number_of_confirmations]=1&Payment%20Notification[order_status]=open&Payment%20Notification[transaction_fee]=0.0&Payment%20Notification[bitcoin_address]=1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD";

//$indata=json_decode(parse_str($indata),TRUE);

$indata = str_replace("%20", "_", $indata);
$indata = parse_str($indata);
//$indata = json_decode($step1,TRUE);
//"Payment%20Notification[category]=receive&Payment%20Notification[transaction_timestamp]=1307671121&Payment%20Notification[signature]=47e0b895c66c13aeb359485aa05f57704bf66d7ce47ed5c3fc1a35471ada823c&Payment%20Notification[amount]=2.21&Payment%20Notification[foreign_order_id]=53&Payment%20Notification[number_of_confirmations]=1&Payment%20Notification[order_status]=open&Payment%20Notification[transaction_fee]=0.0&Payment%20Notification[bitcoin_address]=1AFZ6Cv8q96rFaS9T8fR1y2j2CjNDcTIVD"
//$fullname = $indata['Payment Notification']['bitcoin_address'];
print_r(get_defined_vars());
$dbi = $Payment_Notification;
$indata = $dbi['category'];
//$indata=['Payment Notification']['bitcoin_address'];
$this->load->database();
//$_POST = json_decode($_POST);
//$posting = print_r($_POST);

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

$data = array(
  // 'category' => $dbi['category'],
   'transaction_timestamp' => date('Y-m-d H:i:s'),
   //'signature' => $dbi['signature'],
   'bitcoins_recieved' => $dbi['amount'],
   'uniqid' => $dbi['foreign_order_id'], //primary key
   'number_of_confirmations' => $dbi['number_of_confirmations'],
   'order_status' => $dbi['order_status'],
   'transaction_fee' => $dbi['transaction_fee'],
   'bitcoin_address_recieved' => $dbi['bitcoin_address']
);

$this->db->insert('bitzon', $data);




$this->load->view('callback/test'); 	


	
	// $dbconn2 = pg_connect("host=localhost port=5432 dbname=mydb");
	
	
	
	// $secureString = 'amount=' . $_POST['amount'] . 'bitcoin_address=' . $_POST['bitcoin_address']
	//                 . 'category=' . $_POST['category'] . 'foreign_order_id=' . $_POST['foreign_order_id']
	//                 . 'number_of_confirmations=' . $_POST['number_of_confirmations'] . 'order_status='
	//                 . $_POST['order_status'] . 'transaction_fee=' . $_POST['transaction_fee']
	//                 . 'transaction_timestamp=' . $_POST['transaction_timestamp'];
	
	// $secureString = hash('sha256','Your API Key' . $secureString);
	
	// if ($secureString == $_POST['signature']){
	    
	//     //Save the results of the POST to a database
	//     //-----refer to variables listed at beginning of script
	    
	// } else {
	//     die('Unauthorized');
	// }
	
	// }

//$dbconn2 = pg_connect("host=localhost port=5432 dbname=mydb");

	}
}	