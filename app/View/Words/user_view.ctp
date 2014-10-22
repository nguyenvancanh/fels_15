<div class="users form">
	<?php
		if (isset($words) && is_array($words)) :
	?>
	<table class="table table-hover">
		<tr>
			<td>
				<?php echo __("English Word"); ?>
			</td>
			<td>
				<?php echo __("Viet Nam mean"); ?>
			</td>
		</tr>
		<?php
			if (!empty($words)):
				foreach ($words as $word): 
		?>
		<tr>
			<td>
				<?php echo $word['Word']['english']; ?>
			</td>
			<td>
				<?php echo $word['Word']['vietnamese']; ?>
			</td>
		</tr>
		<?php 
				endforeach;
			else:
				echo __("Word not found");
			endif;
		?>
	</table>
	<?php	
		endif;
	?>
	
</div>
<div class="actions">
	<?php
		echo $this->Form->create('Word');
		echo $this->Form->input('category_id', array('empty' => __('chose one')));

		echo $this->Form->input('Chose', array(
			'type' => 'radio',
			'options' => $options
		));
		echo $this->Form->end(__('Find'));
	?>
</div>