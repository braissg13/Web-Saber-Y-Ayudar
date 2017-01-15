<?php

// app/Model/Respuesta.php

App::uses('AppModel', 'Model');

class Respuesta extends AppModel {
    var $name = 'Respuesta';

    public $belongsTo = array(
        'Pregunta' => array(
            'className' => 'Pregunta',
            'foreignKey' => 'idpregunta'
        ),
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'idautor'
        )
    );


    var $validate = array(
		'contenido' => array(
			'required' => array(
                'rule' => 'notBlank',
                'message' => 'Se requiere escribir el cuerpo de la respuesta.'
            )
		),
		'idautor' => 'notBlank',
		'creado' => 'notBlank',
		'positivo' => array(
			'rule' => 'numeric'
		),
		'negativo' => array(
			'rule' => 'numeric'
		),
		'idpregunta' => array(
			'rule' => 'numeric'
		),
     
    );
	
}
?>