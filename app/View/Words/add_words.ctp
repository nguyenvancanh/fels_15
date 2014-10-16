<fieldser>
	<legend><h1><?php echo __('Add a new Word'); ?></h1></legend>
	<?php
		echo $this->Form->create('Post');
		echo $this->Form->input(
			'Word.english', array(
				'id' => 'editenglish',
				'label' => 'English Word',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->input(
			'Word.vietnamese', array(
				'id' => 'editvietname',
				'label' => 'Viet Nam',
				'size' => '50',
				'maxlength' => '255',
				'error' => FALSE
			)
		);
		echo $this->Form->input(
			'Word.category_id', array(
				'id' => 'editcategory',
				'label' => 'Category ID',
				'maxlength' => '20',
				'type' => 'text',
				'error' => FALSE
			)
		);
		echo $this->Form->end(array('label' => 'submit'));
	?>
</fieldser>