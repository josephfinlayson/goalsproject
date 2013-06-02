
<?php  
?>


      <!-- Main hero unit for a primary marketing message or call to action -->

    <div class="span9">
        <div class="hero-unit">
            <h1>Hello, lads!</h1>
            <p>Click your name to the right to begin.</p>
            <h1 style ="color:green" ><?php if (isset($success)){
            	echo $success;
            } ?> </h1>
        </div>	
</div>
<hr>