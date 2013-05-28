
<?php // echo validation_errors();
// Change the css classes to suit your needs    

; ?>

 <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Buy stuff from amazon. In bitcoins!</h1>
        <p>Bitcoin has a real lack of sinks. In order to get things out of the bitcoin economy, you either gamble your coins, or exchange directly into $. By using the powers of amazon, now we have access to almost any product in the world</p>
        <?php echo anchor('bitzon/about',"Learn more", array('class'=>"btn btn-primary btn-large", 'style'=>"display:inline; float:right")); ?> </p>
      </div>

      <!-- Example row of columns -->
     

    <h1>yay bitcoins</h1>
    <h2> Make an order </h2>


<?php $attributes = array('class' => '', 'id' => '');

echo form_open('bitzon/index', $attributes) ?>
<p>
        <label for="full_name">Full name <span class="required">*</span></label>
        <?php echo form_error('full_name'); ?>
        <input id="full_name" type="text" name="full_name"  value="<?php echo set_value('full_name'); ?>"  />
</p>                                             
                        
<p>
        <label for="email_address">Email Address <span class="required">*</span></label>
        <?php echo form_error('email_address'); ?>
        <input id="email_address" type="text" name="email_address" type="email" value="<?php echo set_value('email_address'); ?>"  />
</p>                                             
                        
<p>
        <label for="address_line_1">Address Line 1 <span class="required">*</span></label>
        <?php echo form_error('address_line_1'); ?>
        <input id="address_line_1" type="text" name="address_line_1"  value="<?php echo set_value('address_line_1'); ?>"  />
</p>                                             
                        
<p>
        <label for="address_line_2">Address Line 2 <span class="required">*</span></label>
        <?php echo form_error('address_line_2'); ?>
        <input id="address_line_2" type="text" name="address_line_2"  value="<?php echo set_value('address_line_2'); ?>"  />
</p>                                             
                        
<p>
        <label for="address_line_3">Address Line 3</label>
        <?php echo form_error('address_line_3'); ?>
        <input id="address_line_3" type="text" name="address_line_3"  value="<?php echo set_value('address_line_3'); ?>"  />
</p>

<p>
        <label for="country">Country</label>
        <?php echo form_error('country'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <?php echo form_dropdown('country', $options, set_value('country'))?>
</p>                                             
                        
<p>
        <label for="postcode_zip">Postcode/ZIP</label>
        <?php echo form_error('postcode_zip'); ?>
        <input id="postcode_zip" type="text" name="postcode_zip"  value="<?php echo set_value('postcode_zip'); ?>"  />
</p>

<p>
        <label for="total_amount_promised">total_amount_promised <span class="required">*</span></label>
        <?php echo form_error('total_amount_promised'); ?>
        <input id="total_amount_promised" type="text" name="total_amount_promised"  value="<?php echo set_value('total_amount_promised'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>




	<?php 
if (isset($bitcoin_address)) 
{
print_r($bitcoin_address); } 
	
	?>

</br>	
</div>
