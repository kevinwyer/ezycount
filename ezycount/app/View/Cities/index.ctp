<div class="cities index">

<table>
	<form id="searchFunction" method="post" action="/Git/ezycount/ezycount/cities">
	<tbody>
		<tr>
			<th>
			<input name="search_city" placeholder="City"/>
			</th>
			
			<th>
			<input name="search_plz" placeholder="ZIP"/>
			</th>
		</tr>
		<tr>
			<th><input type="submit" value="Submit"></th>
		</tr>
	</tbody>
	</form>
</table>

	<h2><?php echo __('Cities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th class="actions"><?php  echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	
	<?php 
	
	// if search fields are empty --> display all
	//	else 
	//	   --> only the corresponding fields 
		   
	if (!empty($search_city) && !empty($search_plz))
		echo 'Search_city is not empty';
	else
	{
	
	
	foreach ($cities as $city): ?>
	<tr>
		<td><?php echo h($city['City']['id']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['country']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['zip']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['city']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $city['City']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $city['City']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $city['City']['id']))); ?>
		</td>
	</tr>
<?php endforeach; 
	}?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New City'), array('action' => 'add')); ?></li>
	</ul>
</div>
