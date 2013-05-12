<h2> Make an order </h2>

<?php // echo validation_errors();


 ?>

<?php echo form_open('bitcoinpayflow/index'); ?>

	<label for="first_name"> First name </label>
	<input type = "input" name="first_name" /> <br />

	<label for="last_name"> last name </label>
	<input type = "input" name="last_name" /> <br />

	<label for="address"> 1st line of address name </label>
	<input type = "input" name="address_1" /> <br />

	<label for="address"> 2nd line of address </label>
	<input type = "input" name="address_2" /> <br />

	<label for="address"> 3rd line of address </label>
	<input type = "input" name="address_3" /> <br />

    <label for="total_amount"> total amount </label>
	<input type = "input" name="total_amount" /> <br />

	<input type="submit" name="submit" value="Create order"/>

	</form> 

	<?php 
if (isset($bitcoin_address)) 
{
print_r($bitcoin_address); } 
	?>

</br>	
