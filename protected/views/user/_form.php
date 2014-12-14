<div class="row">
    <div class="col-lg-12">
        <p>
            Fields with <span style="color:red">*</span> are required.
        </p>
    </div>
</div>
<div class="row">
    <!-- START BASIC VALIDATION FORM -->
    <div class="col-lg-12">
        <div class="box box-outlined">
            <div class="box-head">
                <header><h4 class="text-light"><?php echo $action; ?> <strong>User</strong></h4></header>
            </div>
            <div class="box-body no-padding">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'user-form',
                    'htmlOptions'=>array('enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-bordered form-validate', 'role'=>'form', 'novalidate'=>'novalidate',),
                    'enableAjaxValidation'=>false,
                )); ?>
                <!--<form class="form-horizontal form-bordered form-validate" role="form" novalidate="novalidate">-->
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Name','required data-rule-minlength'=>'2')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'surname', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Last Name','required data-rule-minlength'=>'2')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Email','required data-rule-minlength'=>'2')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'dni', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->textField($model,'dni',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'DNI','required data-rule-minlength'=>'2')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'password', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->PasswordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Password','required data-rule-minlength'=>'5')); ?>
                        </div>
                    </div>
                    <?php if($action == 'Create') { ?>
                        <div class="form-group" >
                            <div class="col-lg-3 col-sm-2" >
                                <label for="passwordrepeat" class="control-label" > Repeat password *</label >
                            </div >
                            <div class="col-lg-9 col-sm-10" >
                                <input type = "password" name = "passwordrepeat" id = "passwordrepeat" class="form-control" placeholder = "Repeat password" data-rule-equalto="#User_password" required>
                            </div >
                        </div >
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'rol', array('class'=>'control-label')); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->dropDownList($model,'rol', array('admin' => 'Admin', 'professor' => 'Professor', 'student' => 'Student'),array('empty'=>'Select a rol...', 'class'=>'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-sm-2">
                            <?php echo $form->labelEx($model,'photo'); ?>
                        </div>
                        <div class="col-lg-9 col-sm-10">
                            <?php echo $form->fileField($model,'photo'); ?>
                        </div>
                    </div>


                    <div class="form-footer col-lg-offset-3 col-sm-offset-2">
                        <?php echo CHtml::htmlButton($model->isNewRecord ? 'Create' : 'Update', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                    </div>
                <?php $this->endWidget(); ?>
                <!-- </form> -->
            </div>
        </div><!--end .box -->
    </div><!--end .col-lg-6 -->
    <!-- END BASIC VALIDATION FORM -->
</div><!--end .row -->

<!-- TODO: a multiple file upload
<div class="row">
    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button
                <div class="btn-group">
                    <span class="btn btn-success btn-rounded fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Add files...</span>
                        <input type="file" name="files[]" multiple="">
                    </span>
                    <button type="submit" class="btn btn-primary btn-rounded start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start upload</span>
                    </button>
                    <button type="reset" class="btn btn-warning btn-rounded cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-rounded delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                </div>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
</div>

<!--
<div class="form">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'name'); ?>
		<?php //echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'surname'); ?>
		<?php //echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'email'); ?>
		<?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'dni'); ?>
		<?php //echo $form->textField($model,'dni',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'dni'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php //echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'photo'); ?>
		<?php //echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'photo'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'rol'); ?>
        <?php //echo $form->dropDownList($model,'rol', array('admin' => 'Admin', 'professor' => 'Professor', 'student' => 'Student'),array('empty'=>'Select a rol...')); ?>
		<?php //echo $form->error($model,'rol'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php //$this->endWidget(); ?>

</div><!-- form -->