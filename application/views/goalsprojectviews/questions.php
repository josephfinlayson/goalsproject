

<div class="span9">
<?php //if (isset($query)) 
// {echo "TRUE";} else 
// {
//        echo "FALSE";
// } ?>
<? //var_dump($query);?>
<h1> Queries for <?php  echo ucwords($query[0]['person']); ?> </h1>

<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'span12', 'id' => '');
echo form_open('goals/questions_form', $attributes); ?>



<div>
    <label for="q1"><h3>Query 1:</h3></label>
    <?php echo form_error('q1'); ?>
    <input id="q1"  type="text" name="q1" class="input-xxlarge"  value="<?php echo $query[0]['q1']; ?>"  />     
    <?php echo form_error('a1'); ?>
    
        <div class = "myouter">
            <div class="questions">
                <textarea rows= "6" id="a1" class="span12" type="text" name="a1" placeholder="Type something…" value="<?php //echo set_value('a1'); ?>"></textarea>
            </div>
            <div class = "prevanswers span5">
                <p>Last week you said:</p> <?=$query[0]['a1']?>  
            </div>
        </div>
</div>

<div>
        <label for="q2"><h3>Query 2:</h3></label>
        <?php echo form_error('q2'); ?>
        <input id="q2" type="text" name="q2" class="input-xxlarge"  value="<?php echo $query[0]['q2']; ?>"  />
       <?php echo form_error('a2'); ?>
        <br />
    <div class="myouter">
        <div class = "questions">
        <textarea rows="6" id="a2" class="span12" type="text" name="a2" placeholder="Type something…" value="<?php echo set_value('a2'); ?>"></textarea>
     </div>
        <div class = "prevanswers span5"><p>Last week you said:</p><?=$query[0]['a2']?> </div> 

</div>
<div>
        <label for="q3"><h3>Query 3:</h3></label>
        <?php echo form_error('q3'); ?>
        <input id="q3" type="text" name="q3" class="input-xxlarge"  value="<?php echo $query[0]['q3']; ?>"  />

        <?php echo form_error('a3'); ?>
        <br />
    <div class = "myouter">
        <div class = "questions">
            <textarea rows="6" id="a3" class="span12" type="text" name="a3" placeholder="Type something…" value="<?php echo set_value('a3'); ?>"></textarea>
        </div>
        <div class = "prevanswers span5">
            <p>Last week you said:</p> <?=$query[0]['a3']?> 
        </div>
    </div>
</div>

<div>
        <label for="sq"><h3>Summary Question</h3></label>
        <?php echo form_error('sq'); ?>
        
        <input id="sq" type="text" name="sq" class="input-xxlarge"  value="<?php echo $query[0]['sq']; ?>"  />
   
         <?php echo form_error('sa'); ?>
        <br />

    <div class = "myouter">
        <div class = "questions">        
            <textarea rows="6" id="sa" class="span12" type="text" name="sa" placeholder="Type something…" value="<?php echo set_value('sa'); ?>"></textarea>
        </div>
         <div class = "prevanswers span5">
            <p>Last week you said:</p><?=$query[0]['sa']?> 
         </div>
    </div>
</div>

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
</div>

</div>

