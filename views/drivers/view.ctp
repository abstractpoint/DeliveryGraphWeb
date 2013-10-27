<div class="drivers view">
<h2><?php  __('Driver');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $driver['Driver']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $driver['Driver']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $driver['Driver']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($driver['Company']['name'], array('controller' => 'companies', 'action' => 'view', $driver['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $driver['Driver']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Driver', true), array('action' => 'edit', $driver['Driver']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Driver', true), array('action' => 'delete', $driver['Driver']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $driver['Driver']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Drivers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies', true), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company', true), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries', true), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Deliveries');?></h3>
	<?php if (!empty($driver['Delivery'])):?>
	<table cellpadding = "0" cellspacing = "0">
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
		foreach ($driver['Delivery'] as $delivery):
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
		<ul>
			<li><?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
