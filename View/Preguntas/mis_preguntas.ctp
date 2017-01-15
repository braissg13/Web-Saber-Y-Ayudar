<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Saber y Ayudar</title>


		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


		<?php echo $this->Html->css('misPreguntas'); ?>

		
		
	</head>
	<body>

		<div id="container">
		
			<div id="head">

			<div id="idioma">
			<?php
			if($this->Session->read("Config.language")=='esp'){
				$lang='eng';
				echo $this->Html->link('ENG',array('action' => '/changeLanguage',$lang));
			}
			else{
				$lang='esp';
				echo $this->Html->link('ESP',array('action' => '/changeLanguage',$lang));
			}

			?>
			</div>
			
				<div id= "buscador">
				<?php
					echo $this->Form->create('Pregunta', array('action' => '/buscar', 'type' => 'get', 'class' =>'navbar-form navbar-left', 'role' => 'search'));
				?>
        			<div class="form-group">
          				<?php echo $this->Form->input('buscado', array('class' => 'form-control', 'placeholder' => __('Buscar'), 'div' => false, 'type' => 'text', 'label' => false));?>
        			</div>
        			<?php echo $this->Form->button(__('Buscar'), array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default', 'escape' => false));
        				  echo $this->Form->end();
        			?>
				</div> 	
			</div>
		
			<div id="menu">
				<div id="Navegador">
					<ul class="nav">
						<?php echo"<li>".$this->Html->link(__('Inicio'),'/preguntas/',array('class' => 'text'))."</li>";
							  echo"<li>".$this->Html->link(__('Secciones'),'/preguntas/escogerseccion',array('class' => 'text'))."</li>"; 
							if(!isset($current_user['nick'])){ 
								echo"<li>".$this->Html->link(__('Registrarse'),array('controller' => 'usuarios','action' => 'add'))."</li>";
							}
							else{
								echo"<li>".$this->Html->link(__('Mis Preguntas'),array('controller'=>'preguntas','action'=>'misPreguntas',$current_user['id'] ))."</li>";
							 	echo"<li>".$this->Html->link(__('Cerrar Sesión'),array('controller' => 'usuarios', 'action' => 'logout'))."</li>";
							} 

						?>
					</ul>
				</div>
			</div>
		
		
			 <div id="MisPreguntas">
			<?php

					if($autor==$current_user['id']){
			 		if($preguntas!=null){


					 	foreach($preguntas as $pregunta):
			?>

							<fieldset>
									<text readonly max-length="60" style="font-size:30px; color:white; font-family:verdana;">
							  		<?php echo $this->Html->link($pregunta['Pregunta']['titulo'], array('controller' => 'preguntas', 'action' => 'ver', $pregunta['Pregunta']['id'])); ?>
							 		</text><br><br>
							 		<?php echo $this->Html->image('index/eliminar.png', array('alt' => 'Eliminar', 'id' => 'eliminarImagen')); ?>
							  		<text readonly style="color:white; font-family:verdana; font-size:16pt;">
							  			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => '/eliminar', $pregunta['Pregunta']['id']),array('confirm' => '¿ Desea eliminar la pregunta?'));?>
							 		</text>

							 </fieldset>

			<?php endforeach;
						}
						else{
			?>
							<fieldset>
									<text readonly max-length="60" style="font-size:30px; color:white; font-family:verdana;">
							  		<?php echo __('No ha realizado ninguna pregunta.');?>
							 		</text>
							 </fieldset>
			<?php
						}
					}else{
			?>
							<fieldset>
								<text readonly max-length="60" style="font-size:30px; color:white; font-family:verdana;">
							  	<?php echo __('No tiene permiso para acceder.');?>
							 	</text>
							</fieldset>
			<?php
					} 
 			?>
               
            </div>

				
			

		</div>

	</body>

</html>