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
                <header><h4 class="text-light"><?php echo $action; ?><strong>User</strong></h4></header>
            </div>
            <div class="box-body no-padding">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'subject-form',
                    'htmlOptions'=>array('class'=>'form-horizontal form-bordered form-validate', 'role'=>'form', 'novalidate'=>'novalidate',),
                    'enableAjaxValidation'=>false,
                )); ?>
                <!--<form class="form-horizontal form-bordered form-validate" role="form" novalidate="novalidate">-->
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'codigo', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'codigo',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Code','required data-rule-minlength'=>'2')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'nombre', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Name','required data-rule-minlength'=>'2')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'iniciales', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'iniciales',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Initials','required data-rule-minlength'=>'2')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'creditos', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'creditos',array('class'=>'form-control','placeholder'=>'Credits')); ?>
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