<h2> Make an order </h2>

<?php // echo validation_errors();


 ?>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');

echo form_open('bitzon/index', $attributes); ?>

<p>
        <label for="full_name">Full name <span class="required">*</span></label>
        <?php echo form_error('full_name'); ?>
        <br /><input id="full_name" type="text" name="full_name"  value="<?php echo set_value('full_name'); ?>"  />
</p>

<p>
        <label for="email_address">Email Address <span class="required">*</span></label>
        <?php echo form_error('email_address'); ?>
        <br /><input id="email_address" type="text" name="email_address"  value="<?php echo set_value('email_address'); ?>"  />
</p>

<p>
        <label for="address_line_1">Address Line 1 <span class="required">*</span></label>
        <?php echo form_error('address_line_1'); ?>
        <br /><input id="address_line_1" type="text" name="address_line_1"  value="<?php echo set_value('address_line_1'); ?>"  />
</p>

<p>
        <label for="address_line_2">Address Line 2 <span class="required">*</span></label>
        <?php echo form_error('address_line_2'); ?>
        <br /><input id="address_line_2" type="text" name="address_line_2"  value="<?php echo set_value('address_line_2'); ?>"  />
</p>

<p>
        <label for="address_line_3">Address Line 3</label>
        <?php echo form_error('address_line_3'); ?>
        <br /><input id="address_line_3" type="text" name="address_line_3"  value="<?php echo set_value('address_line_3'); ?>"  />
</p>

<p>
        <label for="country">Country</label>
        <?php echo form_error('country'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('country', $options, set_value('country'))?>
</p>                                             
                        
<p>
        <label for="postcode_zip">Postcode/ZIP</label>
        <?php echo form_error('postcode_zip'); ?>
        <br /><input id="postcode_zip" type="text" name="postcode_zip"  value="<?php echo set_value('postcode_zip'); ?>"  />
</p>

<p>
        <label for="total_amount_promised">total_amount_promised <span class="required">*</span></label>
        <?php echo form_error('total_amount_promised'); ?>
        <br /><input id="total_amount_promised" type="text" name="total_amount_promised"  value="<?php echo set_value('total_amount_promised'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>




	<?php 
if (isset($bitcoin_address)) 
{
print_r($bitcoin_address); } 
	
print_r($stuff)
	?>

</br>	
