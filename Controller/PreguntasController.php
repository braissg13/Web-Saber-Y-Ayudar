<?php

// app/Controller/PreguntasController.php

App::uses('AppController', 'Controller');


class PreguntasController extends AppController{

var $name='Preguntas';
public $helpers = array('Html','Form');
public $components = array('Flash','Paginator','Session');

public $paginate = array(
	'limit' => 4,
	'order' => array(
		'Pregunta.creado' => 'desc'
		)
	);

public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('ver','buscar','index','changeLanguage','escogerseccion','verSeccion');
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
	
function index() {
	$this->Paginator->settings = $this->paginate;
	$data = $this->Paginator->paginate('Pregunta');
	$this->set('preguntas', $data);

	//$this->set('preguntas', $this->Pregunta->find('all'));

}

 public function ver($id = null) {
  $this->Pregunta->id = $id;
  $this->set('pregunta', $this->Pregunta->read(null,$id));
 
 }


function nuevaPregunta() {
	if ($this->request->is('post')) {
		$this->Pregunta->create();
		$datetime = date_create()->format('Y-m-d H:i:s');
		$this->request->data['Pregunta']['creado'] = $datetime;

            if($this->Pregunta->save($this->request->data)) {
                $this->redirect(array('action' => 'index'));
            }
            else{
            	$this->Flash->error(__('Los datos introducidos no son correctos.'));
				return $this->redirect(array('action' => 'nuevaPregunta'));
            }
    }
}

function misPreguntas($id = null){
	$this->set('preguntas', $this->Pregunta->findAllByIdautor($id));
	$this->set('autor',$id);
}

function eliminar($id = null){

	if (!$this->request->is('post')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Pregunta->delete($id)) {
        $this->Flash->success(__('La pregunta con id : ') . $id . __(' fue eliminada.'));
        $this->redirect(array('action' => 'index'));
    }
}


function escogerseccion(){	
}

function verSeccion($seccion = null){
	$this->set('preguntas', $this->Pregunta->findAllBySeccion($seccion));
}

public function buscar(){
	$info = $this->request->query['buscado'];

	$this->Paginator->settings = array(
		'limit' => 8,
		'order' => array(
			'Pregunta.creado' => 'desc'
			),
		'conditions' => array('OR' => array(
			array('Pregunta.contenido LIKE' => '%'.$info.'%'),
			array('Pregunta.titulo LIKE' => '%'.$info.'%')
			))
		);
	$data = $this->Paginator->paginate('Pregunta');

	foreach ($data as $key => $row) {
				$sql = "Select * from preguntas where id = ".$row["Pregunta"]["id"]."";
			}

	$this->set('preguntabuscada',$data);
}

}
?>