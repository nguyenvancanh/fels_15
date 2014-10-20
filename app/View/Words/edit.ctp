<fieldser>
	<legend><h1><?php echo __('Add a new word'); ?></h1></legend>
	<?php
		echo $this->Form->create('Post');
		echo $this->Form->input(
			'Word.english', array(
				'id' => 'english',
				'label' => 'English Word',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->input(
			'Word.vietnamese', array(
				'id' => 'vietnamese',
				'label' => 'Viet Nam',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->input(
			'Word.category_id', array(
				'id' => 'categoryid',
				'label' => 'Category ID',
				'type' => 'text',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->end(array('label' => 'submit'));
	?>
</fieldser>