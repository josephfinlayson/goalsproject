<?php
class Utils
	{



function sendConfirmationMail($array){
    $CI =& get_instance();

	//$array=array(
      //                      'person' => 'person'
                            // 'q1' => set_value('q1'),
                            // 'q2' => set_value('q2'),
                            // 'q3' => set_value('q3'),
                            // 'a1' => auto_typography(set_value('a1')),
                            // 'a2' => auto_typography(set_value('a2')),
                            // 'a3' => auto_typography(set_value('a3')),
                            // 'sq' => set_value('sq'),
                            // 'sa' => auto_typography(set_value('sa')),
                            // 'uniqid' => uniqid(),
                            // 'timestamp' => date(DATE_RSS) 
//);
extract($array);

    $email = "Hello Lads,

Some new goals have been uploaded from ".ucwords($person).". Good luck to him! 

He's said the following:

$q1
$a1
$q2
$a2
$q3

And he's reflected on the following

$sq
$sa


Maybe it's time that you considered updating your goals?

Sincerely,
the goals tracker";

$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => "ssl://smtp.googlemail.com",
    'smtp_port' => 465,
    'smtp_user' => 'boundlesstracker@gmail.com',
    'smtp_pass' => 'g0alstracker',
    'mailtype'  => 'text', 
    'charset'   => 'iso-8859-1',
    'send_multipart' => FALSE
);
$CI->load->library('email', $config);
$CI->email->set_newline("\r\n");

$CI->email->from('boundlesstracker@gmail.com', 'Goals Tracker');
$CI->email->to('joseph.finlayson@gmail.com');
$CI->email->cc('gayan.r.samarasinghe@gmail.com');
$CI->email->cc('phillipjamesdickinson@hotmail.com');
$CI->email->cc('phillipjdickinson@googlemail.com');

$CI->email->subject(ucwords($person)." has uploaded some new goals");

$CI->email->message($email); 


if($CI->email->send())

    {echo "true";}
else {echo "false";
echo $CI->email->print_debugger();}
}

function sendUpdateEmail($array){



}

}
?>