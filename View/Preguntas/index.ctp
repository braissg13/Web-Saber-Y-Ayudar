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


		<?php echo $this->Html->css('maqueta'); ?>

		
		
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
		
					<div id="presentacion">
						<p style="color: white" id="Bienvenidos"><?php echo __('Bienvenid@s'); ?></p>

						<div>
					 		<form id="tablaPresentacion">

							  		<pre><?php echo __('
Bienvenidos a Saber y Ayudar, la 
p&aacutegina web d&oacutende podr&aacutes encontrar 
respuestas a tus preguntas, adem&aacutes
de la posibilidad de ayudar a otros 
usuarios.
Deseamos que disfruten del servicio 
y participen.


Un saludo
El Staff de Saber y Ayudar.');	
							  		?></pre>
										<?php echo $this->Html->image('index/CocodriloAyuda.png', array('alt' => 'Cocodrilo', 'id' => 'Cocodrilo')); ?>
							  			<?php echo $this->Html->image('index/logo.png', array('alt' => 'Logo', 'id' => 'Logo')); ?>
							  			
							 	
							 </form>
						</div>
					</div>


					<?php if(isset($current_user['nick'])){ ?>
					<div id="login">
						<p style="color:white; font-family:verdana; text-align:center; font-size:14pt; "><?php echo __('Bienvenido'); ?></p>
						
						<fieldset id="useryalogin" style="color:white; margin-left:5px; margin-top:20px;">

							<?php echo $this->Html->image('verPreguntas/avatarRespuesta.png', array('alt' => 'avatarRespuesta', 'id' => 'avatar', 'style' => 'margin-left:70px; margin-top:20px;')); 
								  echo "<br>";
								  echo "<br>";
								  echo "<p style='margin-left:70px;'>".$current_user['nick']."</p>";
								  echo "<p style='margin-left:70px;margin-top:-10px;'> ID: ".$current_user['id']."</p>";
								  echo "<button style='margin-left:50px; color:black;'>".$this->Html->link(__('Nueva Pregunta'), array('controller' => 'preguntas', 'action' => 'nuevaPregunta'))."</button>";
							?>

							
						</fieldset>
						
					</div>
					<?php }
							else{

						?>
					<div id="login">
						<div style="width: 228px; text-align: center;">
							<?php echo $this->Html->image('index/login.png', array('alt' => 'Logins', 'id' => 'loginImagen')); ?>
						</div>
						

						
						<?php echo $this->Form->create('Usuario', array('action' => '/login'));?>

						<fieldset id="userlogin" style="color:white; margin-left:5px; margin-top:20px;">

							<!--<p id="Usuario">Usuario</p>-->
							<!--<input type="text" id="User">-->
							<?php echo $this->Form->input('nick', array('id' => 'User'));?>

							<!--<p id="Pass">Contrase&ntildea</p>-->
							<!--<input type="password" id="Password">-->
							<?php echo $this->Form->input('password', array('id' => 'Password'));?>
							
							<?php echo $this->Form->submit(__('Acceder'));
								  $this->Form->end();?>
							<!--<button id="acceder" type="submit" class="btn btn-default">Acceder</button>-->
						</fieldset>
						
					</div>
					<?php
						}
					?>


					<div id="preguntas">


					 <p style="color: white" id="PreguntasRecientes"><?php echo  __('Preguntas Recientes'); ?> </p>	
					 	<?php if($preguntas!=null){  ?>

					 	<div>
					 		<form id="tablaPreguntas">
							
							<?php
								
								foreach ($preguntas as $pregunta): 
							?>

 								<fieldset id="preguntasUsuarios">

							  		<text readonly max-length="60" style="font-size:30px; margin-left: inherit; color:white;">
							  			<?php echo $this->Html->link($pregunta['Pregunta']['titulo'], array('controller' => 'preguntas', 'action' => 'ver', $pregunta['Pregunta']['id'])); ?>
							 		</text><br><br>
							  		<text readonly max-length="20" style="margin-right:50px; margin-left: inherit; color:white;">
							  			<?php echo __('Autor:') ; echo $pregunta['Usuario']['nick']; ?>
							 		</text>

							 	</fieldset>

							 	<?php endforeach; ?>

								

							</form>

					 	</div>

					 	<?php } ?>

					</div>
					<div style="text-align:center;">
					<?php echo $this->Paginator->numbers(); ?>

					</div>
					<!--
					<div id="main" class="col-md-4 col-lg-4">MAIN</div>
					
					<div id="footer" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">FOOTER</div>
					-->

				
			

		</div>

	</body>

</html>