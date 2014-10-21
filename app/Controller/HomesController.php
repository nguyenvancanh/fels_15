<?php
class HomesController extends AppController {
	
	public function index() {
		$name = $this->Auth->user('username');
		$id = $this->Auth->user('id');
		$data = array(
			'name' => $name,
			'id' => $id,
		);
		$this->set($data);

	}
}