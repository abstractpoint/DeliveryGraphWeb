<html>
  <head>
  </head>
  <body>
    <h1>Braintree Credit Card Transaction Form</h1>
    <div class="alert alert-warning">
    <?php
    		if (!empty($result)):
    		foreach($result->errors->deepAll() AS $error) {
		        echo($error->code . ": " . $error->message . "\n");
		    }
		    endif;
    ?>
    </div>
    <?php echo $this->Form->create('Company',array('id'=>'braintree-payment-form'));?>
	<fieldset>
	<?php
		echo $this->Form->input('first_name', array('autocomplete'=>'off'));
		echo $this->Form->input('last_name', array('autocomplete'=>'off'));
		echo $this->Form->input('number', array('autocomplete'=>'off','data-encrypted-name'=>'number'));
		echo $this->Form->input('cvv', array('autocomplete'=>'off','data-encrypted-name'=>'number'));
		echo $this->Form->input('month', array('label'=>'Expiration (MM/YYYY)'));
		echo " / ";
		echo $this->Form->input('year', array('label'=>false));
		echo $this->Form->hidden('company_id');
		echo $this->Form->hidden('hash');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit', array('id'=>'submit'));?>

  </body>
</html>