<div class="deliveries index">
	<h2><?php __('Deliveries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('driver_id');?></th>
			<th><?php echo $this->Paginator->sort('company_id');?></th>
			<th><?php echo $this->Paginator->sort('customer_first_name');?></th>
			<th><?php echo $this->Paginator->sort('customer_last_name');?></th>
			<th><?php echo $this->Paginator->sort('customer_email');?></th>
			<th><?php echo $this->Paginator->sort('customer_mobile_number');?></th>
			<th><?php echo $this->Paginator->sort('delivery_address');?></th>
			<th><?php echo $this->Paginator->sort('delivery_postcode');?></th>
			<th><?php echo $this->Paginator->sort('signature_image_url');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($deliveries as $delivery):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $delivery['Delivery']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($delivery['Driver']['username'], array('controller' => 'drivers', 'action' => 'view', $delivery['Driver']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($delivery['Company']['name'], array('controller' => 'companies', 'action' => 'view', $delivery['Company']['id'])); ?>
		</td>
		<td><?php echo $delivery['Delivery']['customer_first_name']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['customer_last_name']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['customer_email']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['customer_mobile_number']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['delivery_address']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['delivery_postcode']; ?>&nbsp;</td>
		<td><?php echo $delivery['Delivery']['signature_image_url']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $delivery['Delivery']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $delivery['Delivery']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $delivery['Delivery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $delivery['Delivery']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Delivery', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Drivers', true), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver', true), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies', true), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company', true), array('controller' => 'companies', 'action' => 'add')); ?> </li>
	</ul>
</div>