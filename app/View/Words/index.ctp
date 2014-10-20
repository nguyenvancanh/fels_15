<div class="users form">
	<div class="content">
		<h2> <?php echo __("List Words"); ?> </h2>
		<?php
			if (isset($words) && is_array($words)) :
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
					<?php echo __("Category Id"); ?>
				</td>
				<td>
					<?php echo __("Create"); ?>
				</td>
				<td colspan="2">
					<?php echo __("Action"); ?>
				</td>
			</tr>
			<?php
				if (!empty($words)) :
					foreach ($words as $word): 
			?>
			<tr>
				<td>
					<?php echo $word['Word']['id']; ?>
				</td>
				<td>
					<?php echo $word['Word']['english']; ?>
				</td>
				<td>
					<?php echo $word['Word']['vietnamese']; ?>
				</td>
				<td>
					<?php echo $word['Word']['category_id']; ?>
				</td>
				<td>
					<?php echo $word['Word']['create']; ?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink(
							__('Edit'), 
							array(
								'controller' => 'words',
								'action' => 'edit', $word['Word']['id']
							)
						); 
					?>
				</td>
				<td>
					<?php 
						echo $this->Form->postLink(
							__('Delete'), 
							array(
								'controller' => 'words',
								'action' => 'delete', $word['Word']['id']
							), 
							null, 
							__('Are you sure you want to delete # %s ?', $word['Word']['id'])
						); 
					?>
				</td>
			</tr>
			<?php 
					endforeach;
				else :
					echo __("Can't found the Word");
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
		<li><?php echo $this->Html->link(__('New Words'), array('controller' => 'words', 'action' => 'add')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>

