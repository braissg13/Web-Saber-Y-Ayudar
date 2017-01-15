<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Saber y ayudar</title>
	<?php
		echo $this->Html->meta('icon');

		/*echo $this->Html->css('layout');*/

		
	?>
</head>
<body>
	<div id="container">
		<!--
		<div id="head">
			
			<div id= "buscador"><form class="navbar-form navbar-left" role="search">
        			<div class="form-group">
          					<input type="text" class="form-control" placeholder="Buscar">
        			</div>
        		<button type="submit" class="btn btn-default">Buscar</button>
      		</form></div> 	
		</div>
		
		<div id="menu">
			<div id="Navegador">
  				<ul class="nav">
					<li><?php echo $this->Html->link('Inicio','/preguntas/',array('class' => 'text')); ?></li>	
					<li><a href="#">Secciones</a></li>
				</ul>
			</div>
		</div>
		-->
		
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
