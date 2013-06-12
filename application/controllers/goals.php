<?php

/* is passed
$orders = $payflow->orders(array(
   'foreign_order_id' => '1334',
   'total_amount' => '23.223',
   'custom_field' => 'foobar',
   'auth_token' => '4f7f0836cc321bfd78303508bd154a00'
));
*/



class goals extends CI_controller
{
    var $data;
    var $people;
    function __construct()
    { 
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('goalsproject_model');
        $this->load->helper('typography');
        $this->data = array();
        $this->data['people'] = array('gayan','noam','miceal','phil','joe');

    }   

// public function getUsers() {

// echo(arg1)
// }
public function index(){
        $data = $this->data;
        $data['title'] =  'home';
        $this->load->view('templates/header', $data);
        $this->load->view('goalsprojectviews/sidebar', $data);
        $this->load->view('goalsprojectviews/index');
        $this->load->view('templates/footer');
      
}

public function questions ($params = NULL) {
    $data = $this->data;
    //helpers

    $this->load->helper('url');

        $data['title'] =  'questions';
        $this->load->view('templates/header', $data);
        $this->load->view('goalsprojectviews/sidebar', $data);
        

if (in_array($params, $data['people']))
        {$data['query'] = $this->goalsproject_model->getanswers($params); //params = person name &
            $this->load->view('goalsprojectviews/questions', $data);}
        else{
            $this->load->view('goalsprojectviews/questionsdefault');
        }
        $this->load->view('templates/footer', $data);
    }
    function questions_form()
    {           
        $this->form_validation->set_rules('person', 'person', '');          
        $this->form_validation->set_rules('q1', 'Q1', '');          
        $this->form_validation->set_rules('q2', 'Q2', '');          
        $this->form_validation->set_rules('q3', 'Q3', '');          
        $this->form_validation->set_rules('a1', 'A1', '');          
        $this->form_validation->set_rules('a2', 'A2', '');          
        $this->form_validation->set_rules('a3', 'A3', '');          
        $this->form_validation->set_rules('sq', 'Summary Question', '');            
        $this->form_validation->set_rules('sa', 'Summary Answer', '');
            
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('questions_view');
        }
        else // passed validation proceed to post success logic
        {
            // build array for the model
            
            $form_data = array(
                            'person' => set_value('person'),
                            'q1' => set_value('q1'),
                            'q2' => set_value('q2'),
                            'q3' => set_value('q3'),
                            'a1' => auto_typography(set_value('a1')),
                            'a2' => auto_typography(set_value('a2')),
                            'a3' => auto_typography(set_value('a3')),
                            'sq' => set_value('sq'),
                            'sa' => auto_typography(set_value('sa')),
                            'uniqid' => uniqid(),
                            'timestamp' => date(DATE_RSS) 
                        );
                    
            // run insert model to write data to db
        
            if ($this->goalsproject_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                redirect('goals/success');   // or whatever logic needs to occur
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
        $data['title'] = "You're absolutely smashing";
        $data['success'] = "Goals submitted, you're absolutely smashing";
        $this->load->view('templates/header', $data);
        $this->load->view('goalsprojectviews/sidebar',$data);
        $this->load->view('goalsprojectviews/answersdefault', $data);
        $this->load->view('templates/footer');
    }


public function answers ($params = NULL) {
        $data = $this->data;
        $data['title'] = 'Answers for '.$params;
        $this->load->view('templates/header', $data);
        $this->load->view('goalsprojectviews/sidebar',$data);
if (in_array($params, $data['people']))
        {$data['query'] = $this->goalsproject_model->getanswers($params); //params = person name &
            $this->load->view('goalsprojectviews/answers', $data);}
        else{
            $this->load->view('goalsprojectviews/answersdefault');
        }

        $this->load->view('templates/footer');
    }

}