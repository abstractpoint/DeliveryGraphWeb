<div class="companies view">
<h2>Welcome <?php echo $company['Company']['name']; ?></h2>
<div class="row">
	<div class="col-md-8">
		<img alt="" src="data:image/jpeg;base64,<?=$company['Company']['logo']; ?>" />
	</div>
	<div class="col-md-4">
	<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company', true), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Company', true), array('action' => 'delete', $company['Company']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries', true), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drivers', true), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver', true), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
	</ul>
</div>
	</div>
</div>


</div>

<div class="related">
	<h3><?php __('Related Deliveries');?></h3>
	<?php if (!empty($company['Delivery'])):?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Driver Id'); ?></th>
		<th><?php __('Company Id'); ?></th>
		<th><?php __('Customer First Name'); ?></th>
		<th><?php __('Customer Last Name'); ?></th>
		<th><?php __('Customer Email'); ?></th>
		<th><?php __('Customer Mobile Number'); ?></th>
		<th><?php __('Delivery Address'); ?></th>
		<th><?php __('Delivery Postcode'); ?></th>
		<th><?php __('Signature Image Url'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($company['Delivery'] as $delivery):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $delivery['id'];?></td>
			<td><?php echo $delivery['driver_id'];?></td>
			<td><?php echo $delivery['company_id'];?></td>
			<td><?php echo $delivery['customer_first_name'];?></td>
			<td><?php echo $delivery['customer_last_name'];?></td>
			<td><?php echo $delivery['customer_email'];?></td>
			<td><?php echo $delivery['customer_mobile_number'];?></td>
			<td><?php echo $delivery['delivery_address'];?></td>
			<td><?php echo $delivery['delivery_postcode'];?></td>
			<td><?php echo $delivery['signature_image_url'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'deliveries', 'action' => 'view', $delivery['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'deliveries', 'action' => 'edit', $delivery['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'deliveries', 'action' => 'delete', $delivery['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $delivery['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add'), array('class'=>'btn btn-lg btn-primary'));?> </li>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Drivers');?></h3>
	<?php if (!empty($company['Driver'])):?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Company Id'); ?></th>
		<th><?php __('Email'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($company['Driver'] as $driver):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $driver['id'];?></td>
			<td><?php echo $driver['username'];?></td>
			<td><?php echo $driver['password'];?></td>
			<td><?php echo $driver['company_id'];?></td>
			<td><?php echo $driver['email'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'drivers', 'action' => 'view', $driver['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'drivers', 'action' => 'edit', $driver['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'drivers', 'action' => 'delete', $driver['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $driver['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
	<?php echo $this->Html->link(__('New Driver', true), array('controller' => 'drivers', 'action' => 'add'), array('class'=>'btn btn-lg btn-primary'));?> </li>
	</div>
</div>
