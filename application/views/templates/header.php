
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo $title; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

 <link rel="stylesheet" href='<?php echo base_url(); ?>css/bootstrap.css' type="text/css"/>
 <link rel="stylesheet" href='<?php echo base_url(); ?>css/bitzon.css' type="text/css"/>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?=base_url()?>css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

  </head>

  <body>





   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo anchor('goals/index',"Goals Project", array('class' => 'brand'));?>
          <div class="nav-collapse collapse">
            <ul class="nav">
			<li <? if ($this->uri->uri_string == "goals/index") {echo "class='active'";}?> > <?php echo anchor('goals/index',"Home");?> </li>
			<li <? if ($this->uri->segment(2) == "questions") {echo "class='active'";}?> > <?php 

$url = 'goals/questions/'.$this->uri->segment(3);


      echo anchor($url,"Questions"); ?> </li>
			<li <? if ($this->uri->segment(2) == "answers") {echo "class='active'";}?> > <?php 



$url = 'goals/answers/'.$this->uri->segment(3);
      echo anchor($url,"Answers"); ?></li>

          </div>  <!--/.nav-collapse -->
        </div>
      </div>
  </div>



	