<?php
App::uses('AppController', 'Controller');

class RespuestasController extends AppController{

var $name='Respuestas';

public $helpers = array('Html','Form');
public $components = array('Flash','Session');

function index(){

}
public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('changeLanguage');
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

function add($id=null) {
	$preguntaid = $id;
  $this->set('respuestas', $preguntaid);
	if ($this->request->is('post')) {
		$this->Respuesta->create();
		$datetime = date_create()->format('Y-m-d H:i:s');
		$this->request->data['Respuesta']['creado'] = $datetime;


            if($this->Respuesta->save($this->request->data)) {
                $this->redirect(array('controller' => 'preguntas','action' => 'ver',$this->request->data['Respuesta']['idpregunta']));
            }
    }
}

function eliminar($id = null, $idautor = null, $idpregunta = null, $autor2 = null){

	if($idautor==$autor2){
		if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Respuesta->delete($id)) {
	        $this->Flash->success(__('La respuesta con id : ') . $id . __(' fue eliminada.'));
	        $this->redirect(array('controller' => 'preguntas' ,'action' => 'index'));
	    }	
	}else{
		$this->Flash->error(__('No tiene permisos para eliminar este comentario.'));
	    $this->redirect(array('controller' => 'preguntas' ,'action' => 'ver',$idpregunta));
	}
}

function votopositivo($idresp=null,$positivo=null,$idpregunta=null,$total=null){
	$query = "UPDATE respuestas SET positivo = $positivo, totalvotos=$total WHERE id = $idresp";
	$this->Respuesta->query($query);
	$this->redirect(array('controller' => 'preguntas', 'action' => 'ver', $idpregunta));
}

function votonegativo($idresp=null,$negativo=null,$idpregunta=null,$total=null){
	$query = "UPDATE respuestas SET negativo = $negativo, totalvotos=$total WHERE id = $idresp";
	$this->Respuesta->query($query);
	$this->redirect(array('controller' => 'preguntas', 'action' => 'ver', $idpregunta));
}


}
?>