<div class="users form">
	<div class="content">
		<h2> <?php echo __("List Words"); ?> </h2>
		<?php
			if (isset($catogories) && is_array($catogories)):
		?>
		<table class="table table-hover">
			<tr>
				<td>
					<?php echo __("ID"); ?>
				</td>
				<td>
					<?php echo __("English Word"); ?>
				</td>
				<td>
					<?php echo __("Viet Nam Word"); ?>
				</td>
				<td>
					<?php echo __("Created"); ?>
				</td>
				<td colspan="2">
					<?php echo __("Action"); ?>
				</td>
			</tr>
			<?php
				if (!empty($catogories)):
					foreach ($catogories as $category): 
			?>
			<tr>
				<td>
					<?php echo $category['Category']['id']; ?>
				</td>
				<td>
					<?php echo $category['Category']['name']; ?>
				</td>
				<td>
					<?php echo $category['Category']['content']; ?>
				</td>
				<td>
					<?php echo $category['Category']['created']; ?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink(
							__('Edit'), 
							array(
								'controller' => 'categories',
								'action' => 'edit', $category['Category']['id']
							)
						); 
					?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink(
							__('Delete'), 
							array(
								'controller' => 'categories',
								'action' => 'delete', $category['Category']['id']
							), 
							null, 
							__('Are you sure you want to delete # %s ?', $category['Category']['id'])
						); 
					?>
				</td>
			</tr>
			<?php 
					endforeach;
				else:
					echo __("Category not found");
				endif;
			?>
		</table>
		<?php	
			endif;
		?>
	</div>
</div>
<div class="actions">
	<h3>
		<?php echo __('Action'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home Page'), array('controller' => 'users' ,'action' => 'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>

