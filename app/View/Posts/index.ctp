<div class="users form">
	<div class="content">
		<h2> <?php echo __("List User"); ?> </h2>
		<?php
			if (isset($posts) && is_array($posts)) :
		?>
		<table class="table table-hover">
			<tr>
				<td>
					<?php echo __("ID"); ?>
				</td>
				<td>
					<?php echo __("Username"); ?>
				</td>
				<td>
					<?php echo __("Fullname"); ?>
				</td>
				<td>
					<?php echo __("Email"); ?>
				</td>
				<td>
					<?php echo __("Modified"); ?>
				</td>
				<td colspan="2">
					<?php echo __("Action"); ?>
				</td>
			</tr>
			<?php
				if (!empty($posts)) :
					foreach ($posts as $post): 
			?>
			<tr>
				<td>
					<?php echo $post['User']['id']; ?>
				</td>
				<td>
					<?php echo $post['User']['username']; ?>
				</td>
				<td>
					<?php echo $post['User']['fullname']; ?>
				</td>
				<td>
					<?php echo $post['User']['email']; ?>
				</td>
				<td>
					<?php echo $post['User']['modified']; ?>
				</td>
				<td>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['User']['id']), null, __('Are you sure you want to delete # %s ?', $post['User']['id'])); ?>
				</td>
			</tr>
			<?php 
					endforeach;
				else :
					echo __("not post found");
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
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'posts', 'action' => 'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Category'), array('controller' => 'categories','action' => 'category')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Word'), array('controller' => 'words' ,'action' => 'word')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Lesson'), array('controller' => 'lessons', 'action' => 'lesson')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>

