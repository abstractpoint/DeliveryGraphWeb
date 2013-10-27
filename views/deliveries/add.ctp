<div class="deliveries form">
<?php echo $this->Form->create('Delivery');?>
	<fieldset>
		<legend><?php __('Add Delivery'); ?></legend>
	<?php
		echo $this->Form->input('driver_id');
		echo $this->Form->input('company_id');
		echo $this->Form->input('customer_first_name');
		echo $this->Form->input('customer_last_name');
		echo $this->Form->input('customer_email');
		echo $this->Form->input('customer_mobile_number');
		echo $this->Form->input('delivery_address');
		echo $this->Form->input('delivery_postcode');
		echo $this->Form->input('signature_image_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deliveries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Drivers', true), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver', true), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies', true), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company', true), array('controller' => 'companies', 'action' => 'add')); ?> </li>
	</ul>
</div>