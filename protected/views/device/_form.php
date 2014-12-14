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
                <header><h4 class="text-light"><?php echo $action; ?><strong>Device</strong></h4></header>
            </div>
            <div class="box-body no-padding">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'device-form',
                    'htmlOptions'=>array('class'=>'form-horizontal form-bordered form-validate', 'role'=>'form', 'novalidate'=>'novalidate',),
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
                        <?php echo $form->labelEx($model,'MAC', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'MAC',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'MAC','required data-rule-minlength'=>'2')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'bname', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'bname',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Bluetooth name','required data-rule-minlength'=>'2')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'bMAC', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->textField($model,'bMAC',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Bluetooth MAC','required data-rule-minlength'=>'2')); ?>
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