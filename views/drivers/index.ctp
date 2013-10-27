<div class="drivers index">
	<h2><?php __('Drivers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('company_id');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($drivers as $driver):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $driver['Driver']['id']; ?>&nbsp;</td>
		<td><?php echo $driver['Driver']['username']; ?>&nbsp;</td>
		<td><?php echo $driver['Driver']['password']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($driver['Company']['name'], array('controller' => 'companies', 'action' => 'view', $driver['Company']['id'])); ?>
		</td>
		<td><?php echo $driver['Driver']['email']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $driver['Driver']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $driver['Driver']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $driver['Driver']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $driver['Driver']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Driver', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies', true), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company', true), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliveries', true), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
	</ul>
</div>