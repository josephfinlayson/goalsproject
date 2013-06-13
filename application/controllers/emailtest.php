<?
class Emailtest extends CI_controller{
function sendConfirmationMail($q1){
	// send email to everyone else when goals are updated
$array=array(
                            'person' => 'person'
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
);
extract($array);

	$email = "Hello Lads,

Some new goals have been uploaded from $person . Good luck to him! 

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
    'smtp_host' => "ssl://smtp.googlemail.com",
    'smtp_port' => 465,
    'smtp_user' => 'boundlesstracker@gmail.com',
    'smtp_pass' => 'g0alstracker',
    'mailtype'  => 'text', 
    'charset'   => 'iso-8859-1'
);
$this->load->library('email', $config);
$this->email->set_newline("\r\n");

$this->email->from('boundlesstracker@gmail.com', 'Web Site');
$this->email->to('joseph.finlayson@gmail.com');

$this->email->subject("has uploaded some new goals");

$this->email->message($email); 


if($this->email->send())

    {echo "true";}
else {echo "false";
echo $this->email->print_debugger();}
}
}