 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class utils111
	{



function sendConfirmationMail($array){
    $CI =& get_instance();

	// send email to everyone else when goals are updated

                            // 'person' => set_value('person'),
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

extract($array);

	$email = "Hello Lads,

Some new goals have been uploaded from {$person}. Good luck to him! 

They want to achieve the following:

$q1
$a1
$q2
$a2
$q3

And they've reflect on the following
$sq
$sa

Maybe it's time that you considered updating your goals?

Sincerely,
the goals tracker";

$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'boundlesstracker@gmail.com.',
    'smtp_pass' => 'g0alstracker',
    'mailtype'  => 'text', 
    'charset'   => 'iso-8859-1'
);
$CI->load->library('email', $config);
$CI->email->set_newline("\r\n");

$CI->email->from('boundlesstracker@gmail.com', 'Web Site');
$CI->email->to('joseph.finlayson@gmail.com');

$CI->email->subject(ucwords($person)."has uploaded some new goals");

$CI->email->message($email); 

$CI->email->send();
}

function sendUpdateEmail($array){



}

}