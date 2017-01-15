<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Saber y Ayudar</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


				<?php echo $this->Html->css('verPregunta'); ?>
		
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
		
					

					<div id="Avatar">
						<p style="color: white" id="Autor"><?php echo  __('Autor/a'); ?></p>
							<div>
							<?php echo $this->Html->image('verPreguntas/imagenAvatar.png', array('alt' => 'Avatar', 'id' => 'avatarImag')); ?>
								<p style="color: white" id="nombreAutor"> <?php echo $pregunta['Usuario']['nick'] ;
								?> </p>

							</div>

					</div>

					<div id="Pregunta">
						<p style="color: white" id="tituloPregunta"><?php echo $pregunta['Pregunta']['titulo'];?></p>
						<form id="contenidoPregunta">

							  		<pre id="pre1">
<?php echo $pregunta['Pregunta']['contenido'];?>
							  		</pre>
										<?php echo $this->Html->image('verPreguntas/logo.png', array('alt' => 'Logo', 'id' => 'Logo')); ?>
							 	
							 </form>

					</div>
					
					<div id="barraRespuesta">
					<p style="color: white" id="contenidoBarraRespuesta"><?php echo __('Respuestas de la comunidad:');?></p>

					</div>
					
					<?php
						$idpreg=$pregunta['Pregunta']['id'];
						echo "<button style='margin-left:760px; color:black;'>".$this->Html->link('Responder', array('controller' => 'respuestas', 'action' => 'add', $idpreg))."</button>";
						if($pregunta['Respuesta'] != null){
						$arrayComentarios = array();
						for($i=0; $i<count($pregunta['Respuesta']); $i++){
							$arrayComentarios[$i] = $pregunta['Respuesta'][$i];
						}
						
						
						foreach ($arrayComentarios as $respuestas):

							
					?>

					<div id="fondoAvatarRespuesta">
						<div>
								<?php
								 echo $this->Html->image('verPreguntas/avatarRespuesta.png', array('alt' => 'avatarRespuesta', 'id' => 'avatarRespuesta')); ?>
								<p style="color: white" id="nombreAvatarRespuesta"> <?php echo $respuestas['idautor']; ?> </p>

						</div>

					</div>


					<div id="fondoRespuesta">
					<?php
					$uno = 1; 
					$positivo= $respuestas['positivo'] + $uno;
					$negativo= $respuestas['negativo'] + $uno;
					$total= $respuestas['totalvotos'] + $uno;
					$autor2=$current_user['id'];
					echo $this->Html->image('index/eliminar.png', array('alt' => 'Eliminar', 'id' => 'eliminarImagen'));
					echo $this->Form->postLink(__('Eliminar'), array('controller'=>'respuestas','action' => 'eliminar', $respuestas['id'],$respuestas['idautor'],$respuestas['idpregunta'],$autor2),array('confirm' => '¿ Desea eliminar la respuesta?'));?>

					<div style="margin-top:-17px; margin-left:330px;">	
					<?php 
					/*echo $this->Html->image('verPreguntas/meGusta.png', array('alt' => 'meGusta', 'id' => 'meGusta'));*/
					echo $this->Form->postLink(__('Positivo'),array('controller'=>'respuestas','action'=>'votopositivo',$respuestas['id'],$positivo,$respuestas['idpregunta'],$total));
					 ?>
					<p style="color: #90e10e" id="numeroMeGusta"> <?php echo $respuestas['positivo']; ?> </p>
					</div>

					<div style="margin-top:-32px; margin-left:430px;">
					<?php 
					/*echo $this->Html->image('verPreguntas/noMeGusta.png', array('alt' => 'noMeGusta', 'id' => 'noMeGusta'));*/
					echo $this->Form->postLink(__('Negativo'),array('controller'=>'respuestas','action'=>'votonegativo',$respuestas['id'],$negativo,$respuestas['idpregunta'],$total));
					?>
					<p style="color: #ff3636" id="numeroNoMeGusta"> <?php echo $respuestas['negativo']; ?> </p>
					</div>
						
						<form id="contenidoRespuesta">
							
							
							  		<pre id="pre2">
<?php echo $respuestas['contenido']; ?>
							  		</pre>
									
										
							 	
							 </form>
					
							
					</div>
					
					<?php
						endforeach;
					}
				
					?>
					

					<!--
					<div id="main" class="col-md-4 col-lg-4">MAIN</div>
					
					<div id="footer" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">FOOTER</div>
					-->

				
			

		</div>

	</body>

</html>