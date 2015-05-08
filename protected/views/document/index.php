<?php
    $this->pageTitle=Yii::app()->name. ' - Documents';

    $this->breadcrumbs=array(
    );
?>

<div class="row">
    <div class="col-lg-2">
        <?php echo CHtml::link('Create Document',array('/document/create'), array('class'=>'btn btn-primary btn-block')); ?>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-head">
                <header><h4 class="text-light"><strong>Documents</strong> Table</h4></header>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size (MB)</th>
                        <th>Date</th>
                        <th>Visibility</th>
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
