<?php
/* @var $this UserSubjectController */
/* @var $model UserSubject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-subject-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php // echo $form->textField($model,'iduser'); ?>
        <?php echo $form->dropDownList($model,'iduser', CHtml::listData(User::model()->findAll(), 'id', 'dni'), array('empty'=>'Select user...')); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idsubject'); ?>
		<?php // echo $form->textField($model,'idsubject'); ?>
        <?php echo $form->dropDownList($model,'idsubject', CHtml::listData(Subject::model()->findAll(), 'id', 'nombre'), array('empty'=>'Select subject...')); ?>
		<?php echo $form->error($model,'idsubject'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->