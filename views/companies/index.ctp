<div class="companies index">
	<h2><?php __('Companies');?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" >
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('logo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($companies as $company):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $company['Company']['id']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['name']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['username']; ?>&nbsp;</td>
		<td><?php echo $company['Company']['password']; ?>&nbsp;</td>
		<td><img alt="" src="data:image/jpeg;base64,<?=$company['Company']['logo']; ?>" /></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $company['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $company['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $company['Company']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $company['Company']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Company', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliveries', true), array('controller' => 'deliveries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery', true), array('controller' => 'deliveries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drivers', true), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver', true), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
	</ul>
</div>