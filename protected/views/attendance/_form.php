<?php
/* @var $this AttendanceController */
/* @var $model Attendance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendance-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php // echo $form->labelEx($model,'start'); ?>
		<?php // echo $form->textField($model,'start'); ?>
		<?php // echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
        <?php echo $form->dropDownList($model,'end', array(10 => '10 minutes', 20 => '20 minutes', 30 => '30 minutes'),array('empty'=>'Select an interval...')); ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
        <?php echo $form->dropDownList($model,'tipo', array('T' => 'Teoria', 'P' => 'Practicas'),array('empty'=>'Select one type...')); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idsubject'); ?>
        <?php echo $form->dropDownList($model,'idsubject', CHtml::listData(Subject::model()->findAll(), 'id', 'nombre'), array('empty'=>'Select subject...')); ?>
		<?php echo $form->error($model,'idsubject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iddevice'); ?>
        <?php echo $form->dropDownList($model,'iddevice', CHtml::listData(Device::model()->findAll(), 'id', 'bname'), array('empty'=>'Select class...')); ?>
		<?php echo $form->error($model,'iddevice'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->