<?php
// app/Model/Pregunta.php

App::uses('AppModel', 'Model');

class Pregunta extends AppModel {

    var $name='Pregunta';

    public $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'idautor'
        )
    );

    public $hasMany = array(
        'Respuesta' => array(
            'className' => 'Respuesta',
            'foreignKey' => 'idpregunta'
        )
    );

    var $validate = array(
        'titulo' => array(
            'between' => array(
                'rule' => array('between', 3, 47),
				'required' => true,
                'message' => 'Debe tener entre 3 y 47 caracteres.'
            )
        ),
        'contenido' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Se requiere escribir el cuerpo de la pregunta.'
            )
        ), 
		'seccion' => 'notBlank',
		
        'idautor' => 'notBlank',

        'creado' => 'notBlank',		
		
		 
    );

}
?>