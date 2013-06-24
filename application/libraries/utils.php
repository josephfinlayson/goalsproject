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

    $email = "<html><!DOCTYPE html> <body> Hello Lads,
<p>Some new goals have been uploaded from ".ucwords($person).". Good luck to him!</p>
<p>
He's said the following:
</p>
<p>
<strong>$q1 </strong>
$a1 </br>
<strong>$q2</strong>
$a2 </br>
<strong>$q3</strong>
$a3</p>
<p>
And he's reflected/summed up/looked forward with the following
</p>
<p>
<strong>$sq</strong>
$sa
</p>
<p>
Maybe it's time that you considered updating your goals on <a href=\"http://goalsproject.herokuapp.com\">Goalsproject.herokuapp.com</a>?
</p>
<p>
Sincerely,</br>
the goals tracker </p> </body> </html>";

$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => "ssl://smtp.googlemail.com",
    'smtp_port' => 465,
    'smtp_user' => 'boundlesstracker@gmail.com',
    'smtp_pass' => 'g0alstracker',
    'mailtype'  => 'html', 
);
$CI->load->library('email', $config);
$CI->email->set_newline("\r\n");

$CI->email->from('boundlesstracker@gmail.com', 'Goals Tracker');
//$CI->email->to('joseph.finlayson@gmail.com');
$CI->email->to('joseph.finlayson@gmail.com, gayan.r.samarasinghe@gmail.com, phillipjdickinson@googlemail.com');
//$this->email->cc('joseph.finlayson@gmail.com', 'gayan.r.samarasinghe@gmail.com', 'phillipjamesdickinson@hotmail.com');
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