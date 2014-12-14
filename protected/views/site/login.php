<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
            <?php // echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            <?php // echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 text-left">
            <div data-toggle="buttons">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe', array('class'=>'btn checkbox-inline btn-checkbox-primary-inverse')); ?>
                <?php // echo $form->error($model,'rememberMe'); ?>
            </div>
        </div>

        <div class="col-xs-6 text-right">
            <?php echo CHtml::htmlButton('<i class="fa fa-key"></i> Log in', array('class'=>'btn btn-primary','type'=>'submit')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
