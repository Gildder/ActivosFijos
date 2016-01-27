
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Mi Perfil</h1>
<hr>
<article class="perfil">
	<div class="userFoto">
		<figure><img src="<?php echo Yii::app()->theme->baseUrl.'/img/avatar.png'; ?>" alt=""></figure>
	</div>
	<div class="datos">

		<b class="subtitulo"><?php echo CHtml::encode($model->getAttributeLabel('usuario')); ?>:</b>
		<?php echo CHtml::encode($model->usuario); ?>
		<br />

		<b class="subtitulo"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
		<?php echo CHtml::encode($model->email); ?>
		<br />

		<b class="subtitulo"><?php echo CHtml::encode($model->getAttributeLabel('avatar')); ?>:</b>
		<?php echo CHtml::encode($model->avatar); ?>
		<br />

		<b class="subtitulo"><?php echo CHtml::encode($model->getAttributeLabel('habilitado')); ?>:</b>
		<?php echo CHtml::encode($model->habilitado); ?>
		<br />
	</div>
</article>
<hr>





