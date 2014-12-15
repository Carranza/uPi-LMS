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
                    'id'=>'attendance-form',
                    'htmlOptions'=>array('class'=>'form-horizontal form-bordered form-validate', 'role'=>'form', 'novalidate'=>'novalidate',),
                    'enableAjaxValidation'=>false,
                )); ?>
                <!--<form class="form-horizontal form-bordered form-validate" role="form" novalidate="novalidate">-->
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'end', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->dropDownList($model,'end', array(10 => '10 minutes', 20 => '20 minutes', 30 => '30 minutes'),array('empty'=>'Select an interval...','class'=>'form-control')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'tipo', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->dropDownList($model,'tipo', array('T' => 'Teoria', 'P' => 'Practicas'),array('empty'=>'Select one type...','class'=>'form-control')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'idsubject', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->dropDownList($model,'idsubject', CHtml::listData(Subject::model()->findAll(), 'id', 'nombre'), array('empty'=>'Select subject...','class'=>'form-control')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3 col-sm-2">
                        <?php echo $form->labelEx($model,'iddevice', array('class'=>'control-label')); ?>
                    </div>
                    <div class="col-lg-9 col-sm-10">
                        <?php echo $form->dropDownList($model,'iddevice', CHtml::listData(Device::model()->findAll(), 'id', 'bname'), array('empty'=>'Select class...','class'=>'form-control')); ?>
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