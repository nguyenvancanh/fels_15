<div class="users form">
	<?php
		echo '<div>';
		if (isset($words) && isset($answers)):
			foreach ($words as $word):
				if ($word['Word']['status'] == 0):
					echo '<div>';
					echo $this->Form->create('Answer');
					echo '<p>"What does it mean?"</p>';
					echo "English Word: " .$word['Word']['english'];
					echo '</div>';
					foreach ($answers as $answer):
						if ($answer['Answer']['word_id'] == $word['Word']['id']):
							echo '<div>';
							$name = "choose.{$word['Word']['id']}";
							echo $this->Form->input("word_ids.{$word['Word']['id']}", array(
								'type' => 'hidden',
								'value' => $word['Word']['id']
							));
							echo $this->Form->input($name, array(
								'type' => 'radio',
								'legend' => false,
								'options' => array(
									1 => $answer['Answer']['answer_a'],
									2 => $answer['Answer']['answer_b'],
									3 => $answer['Answer']['answer_c']
								),
							));
							echo '</div>';
						endif;
					endforeach;
				endif;
			endforeach;
		endif;
		echo '<div>';
			echo $this->Form->end('Answer');
		echo '</div>';
		echo '</div>';
	?>
</div>
<div class="actions">
	<div>
		<?php
			echo $this->Html->link('Result', array('controller' => 'results', 'action' => 'index'));
		?>
	</div>
	<br/>
	<div>
		<?php
			echo $this->Html->link('Home page', array('controller' => 'homes', 'action' => 'index'));
		?>
	</div>
</div>