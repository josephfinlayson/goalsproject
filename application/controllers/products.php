<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Products extends CI_Controller {
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
 
 //$region = ".co.uk";
 
	try{ $region = ".co.uk";
			$result=$this->amazon_api->getItemByAsin("B008UAAE44");
             }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
 
     $JSON = json_encode($result);
     echo $JSON;
 
    // echo "Sales Rank : {$result->Items->Item->SalesRank}<br>";
    // echo "ASIN : {$result->Items->Item->ASIN}<br>";
    // echo "<br><img src=\"" . $result->Items->Item->MediumImage->URL . "\" /><br>";
 
    }
 
 }