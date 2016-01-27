<?php 	if (Yii::app()->user->id==null) { ?>



<?php }  ?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <!--Archivos CSS-->
	<link rel="stylesheet"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css">
	<link rel="stylesheet"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css">
    <link rel="stylesheet"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize.css">

    <!-- Archivos js-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.3.min.js"></script>
    
</head>

<body>

	

	<!-- header -->
	<header>
		<div class="logo">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="Petro" />
		</div>

		<div class="titular">
			<h1 class="titulo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</h1>
		</div>
		<div class="usuario">
			<figure class="avatar">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/img/avatar.png'; ?>" alt="avatar" />
			</figure>
			
			<a class="publicar" href="#">
				<?php 
					if (Yii::app()->user->isGuest) {
						echo CHtml::encode('Usuario');
					}
					else{
						echo CHtml::encode(Yii::app()->user->name); 
					}
				?>
			</a>
		</div>
	</header>

	<!-- menu -->
	<nav class="navbar navbar-inverse navbar-fixed-top" id="menu">
		<!-- El logotipo y el icono que despliega el menú se agrupan
   		para mostrarlos mejor en los dispositivos móviles -->
	  	<div class="navbar-inverse">
	  		
			    <button type="button" class="navbar-toggle" data-toggle="collapse"
			            data-target="#menus">
			      <span class="sr-only">Desplegar navegación</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>

			   
		</div>

	  	<!-- Agrupar los enlaces de navegación, los formularios y cualquier
	       otro elemento que se pueda ocultar al minimizar la barra -->
	  	<div class="collapse navbar-collapse navbar-collapse" id="menus" >
	  		<?php $itemName = Yii::app()->authManager->getAuthAssignments(Yii::app()->user->id);
	  				foreach ($itemName as  $value) {
						$name = $value->itemName;
					}
	  		 ?>


	  		
				<?php $this->widget('bootstrap.widgets.TbMenu',array(
					'items'=>array(
						//array('label'=>'Inicio', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Inicio', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
						
	                    array('label'=>'Inicio Session', 'url'=>array('/site/login'), 'visible'=>!Yii::app()->user->isGuest),
						

						//'if'=>array($name,'Equal','Super Usuario'),
						//'then'=>array(
						array('label'=>'Empleado', 'url'=>array('/inventario/index'), 'visible'=>(!Yii::app()->user->isGuest )),
						array('label'=>'Solicitud', 'url'=>array('/registrador/create'), 'visible'=>(!Yii::app()->user->isGuest )),
						array('label'=>'Inventario', 'url'=>array('/usuario/descargas'), 'visible'=>(!Yii::app()->user->isGuest )),
						array('label'=>'Nota Control', 'url'=>array('/Activo/index'), 'visible'=>(!Yii::app()->user->isGuest ),
							 'items'=>array(
					            array('label'=>'New Arrivals', 'url'=>array('product/new')),
					            array('label'=>'Most Popular', 'url'=>array('product/index')),
			            )),
						

						array('label'=>'Cerrar Session', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),


						//	),
					),

					//opciones html
					'htmlOptions' => array('class'=> 'nav navbar-nav navbar-right'),
				)); ?>
		</div>
	
		
	</nav>

	<!-- mainmenu -->
	<section>

		<!-- Mensajes de session -->

		<?php if (($msgs=Yii::app()->user->getFlashes())!== null): ?>
			<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<?php foreach ($msgs as $type => $message): ?>
							<div class="alert alert-<?php echo $type ?>">
								<button type="button" class="close"data-dismiss="alert" >$times;</button>
								<h4><?php echo ucfirst(($type)) ?>!</h4>
								<?php echo $message ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<!-- Contenido app -->
		<?php echo $content; ?>
	</section>


	<!-- footer -->
	<footer class="footer">
		<h3>
			
			<strong>Copyright &copy; <?php echo date('Y'); ?> by G.R.<?php Yii::app()->user->id; ?></strong>
			<span>Taller Grado I.</span>
		</h3>
	</footer>


	<script>

	$(function(){
		
		$('.publicar').on('click',mostrarMenu);

		function mostrarMenu()
		{
			$('nav').css('display','block');
			console.log('funciono');
		}
		
	})

	</script>

</body>
</html>


