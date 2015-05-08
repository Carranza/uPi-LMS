<?php
    $this->pageTitle=Yii::app()->name. ' - Anotations';

    $this->breadcrumbs=array(
    );
?>

<div class="row">
    <div class="col-lg-2">
        <?php echo CHtml::link('Create Anotation',array('/userAttendance/create'), array('class'=>'btn btn-primary btn-block')); ?>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-head">
                <header><h4 class="text-light"><strong>Anotations</strong> Table</h4></header>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Student</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Subject</th>
                        <th class="text-right1" style="width:90px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_view',
                        'summaryText'=>'',
                    )); ?>
                    </tbody>
                </table>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>
<!-- END BASIC TABLE -->
