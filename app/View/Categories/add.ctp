<fieldser>
	<legend><h1><?php echo __('Add a new word'); ?></h1></legend>
	<?php
		echo $this->Form->create('Post');
		echo $this->Form->input(
			'Category.name', array(
				'id' => 'name',
				'label' => 'Category name',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->input(
			'Category.content', array(
				'id' => 'content',
				'label' => 'Category Content',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->end(array('label' => 'submit'));
	?>
</fieldser>