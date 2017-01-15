<?php

//app/Model/Usuario.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Usuario extends AppModel {
    var $name = 'Usuario';

    public $hasMany = array(
        'MisPreguntas' => array(
            'className' => 'Pregunta',
            'foreignKey' => 'idautor'
        ),
        'MisRespuestas' => array(
            'className' => 'Respuesta',
            'foreignKey' => 'idautor'
        )
    );

    var $validate = array(
        'nick' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Solo caracteres y números.'
                ),
            'between' => array(
                'rule' => array('between', 6, 14),
                'message' => 'Debe tener entre 6 y 14 caracteres.'
            ),
            'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'El nick ya existe.'
			)
        ),
        'password' => array(
			'between' => array(
				'rule' => array('between', 8, 20),
				'message' => 'Debe tener entre 8 y 20 caracteres.'
			)
        ),
		'nombre' => array(
			'between' => array(
				'rule' => array('between', 2, 20),
				'message' => 'Debe tener entre 2 y 20 caracteres.'
			)
        ),
		'apellido' => array(
			'between' => array(
				'rule' => array('between', 2, 40),
				'message' => 'Debe tener entre 2 y 40 caracteres.'
			)
        )
    );

    public function beforeSave($options = array()) {
            if(isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
            }
        return true;
    }

	
}
?>