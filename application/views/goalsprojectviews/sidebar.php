<div class="container-fluid">
    <div class="row-fluid">

<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">People</li>
<?php
                $people = array('gayan','joe','phil','noam','miceal');



foreach ($people as $aperson) {

             echo"<li";?> <? if ($this->uri->segment(3) == $aperson) {echo " class='active'";}?> ><a href=
                <?php 
              
    $uri = $this->uri->segment(2);

              	switch ($uri) {
              		case 'answers':
              			echo base_url()."/"."index_page()"."/goals/answers/".$aperson;
              			break;
              		
              		default:
              			echo base_url()."index.php/goals/questions/".$aperson;
              			break;
              	} 
                echo "> ". ucwords($aperson)."</a></li>";
}

?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->