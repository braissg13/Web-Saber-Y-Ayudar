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


		<?php echo $this->Html->css('enviarRespuesta'); ?>

		
		
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
		
		
			 <div id="formulario">
				<p id="Comentario"> <?php echo __('Nueva Respuesta');?></p>

					
					<fieldset style="color:white;margin-left: 70px;">
					
						<?php echo $this->Form->create('Respuesta',array('action' =>'/add')); ?>
						
						<p><label for="contenido"> <?php echo $this->Form->input('contenido', array('type' =>'textarea','style' => 'margin-left: 30px; margin-bottom:-10px; color:black; height:150px; width:250px;')); ?> </label></p>
							
						<?php 
							  echo $this->Form->input('idautor',array('type' => 'hidden','value' => $current_user['id']));
							  echo $this->Form->input('idpregunta',array('type' => 'hidden','value' => $respuestas));
							  echo $this->Form->input('positivo',array('type' => 'hidden','value' => '0'));
							  echo $this->Form->input('negativo',array('type' => 'hidden','value' => '0'));

							  echo $this->Html->link(__('Volver atras'), array('controller' => 'preguntas', 'action' => 'ver', $respuestas)); 
							  echo $this->Form->Submit(__('Enviar'),array('style' => 'margin-left: 102px; margin-top:-23px; color:black;'));
						 	  echo $this->Form->end(); ?>

					</fieldset>
            </div>

				
			

		</div>

	</body>

</html>