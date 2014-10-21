<div class="users form">
	<?php
		echo $this->Form->create('Post');
		echo $this->Form->button(
			__('Words')
		);

		echo $this->Form->button(__('Lesson'));
		echo $this->Form->input(
			'Activities',
			array(
				'type' => 'textarea'
			)
		);
	?>
</div>
<div class="actions">
	<?php
		echo "Welcome " . $name;
	?>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Edit profile',
					array(
						'controller' => 'users',
						'action' => 'edit_profile', $id
					)
				);
			?>
		</li>
	</ul>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Change password',
					array(
						'controller' => 'users',
						'action' => 'change_password'
					)
				);
			?>
		</li>
	</ul>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Logout',
					array(
						'controller' => 'users',
						'action' => 'logout'
					)
				);
			?>
		</li>
	</ul>
</div>