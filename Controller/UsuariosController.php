<?php

// app/Controller/UsuariosController.php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
	var $name = 'Usuarios';
	public $helpers = array('Html','Form','Flash');
    public $components = array('Flash','Session');
	
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','changeLanguage');
        $this->set('current_user', $this->Auth->user());
    }

    public function changeLanguage($lang){
        if(!empty($lang)){
            if($lang == 'esp'){
                $this->Session->write('Config.language', 'esp');
            }
 
            else if($lang == 'eng'){
                $this->Session->write('Config.language', 'eng');
            }
 
            //in order to redirect the user to the page from which it was called
            $this->redirect($this->referer());
        }
    }
	
	
	public function index(){
		
	}

	public function login() {
        if($this->request->is('post')) {
		
		
            if($this->Auth->login()) {
		
                return $this->redirect($this->Auth->redirectUrl());
            } else {
			
				$this->Flash->error(__('Usuario/password incorrecto'));
				return $this->redirect(array("controller"=>"preguntas", "action" => "index"));
			}
        }
		
    }

	public function logout() {
        return $this->redirect($this->Auth->logout());
    }
	
	public function add(){
		if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                return $this->redirect(array('controller' => 'preguntas','action' => 'index'));
            }
            
        }
	}
}

?>