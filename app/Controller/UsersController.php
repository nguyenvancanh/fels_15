<?php
class UsersController extends AppController{
	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
	


	public function login() {
		/*if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));		
		}*/
		
		// if we get the post information, try to authenticate
		
		//$username = $this->request->data['username'];
		//echo $username;
		//die(var_dump($this->request->is('post')));
		//die(var_dump($this->Auth->login()));
		if ($this->request->is('post')) {
			echo "???";
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				//echo "???";
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }
}