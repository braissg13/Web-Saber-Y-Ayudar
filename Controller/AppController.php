<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array(
        'Html',
        'Form'
    );
	
    public $components = array(
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'preguntas',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'preguntas',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
					'userModel' => 'Usuario',
					'fields' => array('username' => 'nick', 'password'=>'password')
					
                )
            ),
            'loginAction' => array(
                'controller' => 'preguntas',
                'action' => 'index'
            )
			
            
        )
    );
    
    public function beforeFilter(){
        $this->Auth->allow('login', 'logout','idioma');
        $this->set('current_user', $this->Auth->user());
        $locale = Configure::read('Config.language');
    if ($locale && file_exists( $locale . DS . $this->viewPath)) {
        // e.g. use /app/views/fre/pages/tos.ctp instead of /app/views/pages/tos.ctp
        $this->viewPath = $locale . DS . $this->viewPath;
    }
    }
	
}
