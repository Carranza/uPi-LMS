<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form', // document-form
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <!--
	<div class="row">
		<?php // echo $form->labelEx($model,'size'); ?>
		<?php // echo $form->textField($model,'size'); ?>
		<?php // echo $form->error($model,'size'); ?>
	</div>
	-->

    <!--
	<div class="row">
		<?php // echo $form->labelEx($model,'date'); ?>
		<?php // echo $form->textField($model,'date'); ?>
		<?php // echo $form->error($model,'date'); ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->labelEx($model,'visibility'); ?>
		<?php // echo $form->textField($model,'visibility'); ?>
        <?php echo $form->dropDownList($model,'visibility', array(0 => 'No visible', 1 => 'Visible'),array('empty'=>'Select one type of visibility...')); ?>
		<?php echo $form->error($model,'visibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idsubject'); ?>
		<?php // echo $form->textField($model,'idsubject'); ?>

        <?php // TODO: limitar la asignacion dependiendo del rol ?>

        <?php echo $form->dropDownList($model,'idsubject', CHtml::listData(Subject::model()->findAll(), 'id', 'nombre'), array('empty'=>'Select subject...')); ?>
        <?php echo $form->error($model,'idsubject'); ?>
	</div>

    <!--
	<div class="row">
		<?php // echo $form->labelEx($model,'path'); ?>
		<?php // echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'path'); ?>
	</div>
	-->

    <!--
	<div class="row">
		<?php // echo $form->labelEx($model,'file'); ?>
		<?php // echo $form->textField($model,'file',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'file'); ?>
	</div>
    -->

    <div class="row">
        <?php echo $form->labelEx($model,'file'); ?>
        <?php echo $form->fileField($model,'file'); ?>
        <?php echo $form->error($model,'file'); ?>
        <p class="hint"> Max size 3 MB </p>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->