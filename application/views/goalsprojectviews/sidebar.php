<div class="container-fluid">
    <div class="row-fluid">

<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">People</li>
              <li <? if ($this->uri->segment(3) == "gayan") {echo " class='active'";}?> ><a href=
              	<?php 


    $uri = $this->uri->segment(2);

              	switch ($uri) {
              		case 'answers':
              			echo base_url()."index.php/goals/answers/gayan";
              			break;
              		
              		default:
              			echo base_url()."index.php/goals/questions/gayan";
              			break;
              	} ;

?>

>Gayan</a></li>
              <li <? if ($this->uri->segment(3) == "joe") {echo " class='active'";}?>><a href=
  <?php 


    $uri = $this->uri->segment(2);

                switch ($uri) {
                  case 'answers':
                    echo base_url()."index.php/goals/answers/joe";
                    break;
                  
                  default:
                    echo base_url()."index.php/goals/questions/joe";
                    break;
                } ;

?>
                >Joe</a></li>
              <li <? if ($this->uri->segment(3) == "phil") {echo " class='active'";}?> ><a href=

  <?php 


    $uri = $this->uri->segment(2);

                switch ($uri) {
                  case 'answers':
                    echo base_url()."index.php/goals/answers/phil";
                    break;
                  
                  default:
                    echo base_url()."index.php/goals/questions/phil";
                    break;
                } ;

?>

                >Phil</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->