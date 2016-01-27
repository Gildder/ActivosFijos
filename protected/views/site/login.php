<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

	$this->pageTitle='Iniciar Sesion';
?>


<!--Login page-->
<div class="login">
	

<article class="loginUsuario">
	<h3>Iniciar Session</h3>

	<div class="form row">
		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
			'id'=>'login-form',
		
		)); ?>	
		
		<div class="col-sm-12">
			<p>Por favor, rellene el formulario con sus credenciales:</p>
		</div>
		

		<div class="col-sm-12">
			<?php echo $form->textFieldGroup($model,'usuario'); ?>
		</div>
		<div class="col-sm-12">
			<?php echo $form->passwordFieldGroup($model,'contrasenia'); ?>
		</div>

        <div class="rememberMe">
            <div class="col-sm-12">
				<?php echo $form->checkBoxGroup($model,'rememberMe');  ?>
			</div>
		</div>

		
		<div class="form-actions col-sm-6">
			<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					'context'=>'primary',
					'label'=>'Entrar' ,
					'icon'=>'user',
					'block' => 'btn-sm',
					'size' => 'default',
				)); ?>
		</div>

		<?php $this->endWidget(); ?>	
	</div><!-- form -->

</article>

</div>
