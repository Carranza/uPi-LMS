<?php
$this->pageTitle=Yii::app()->name. ' - Attendances';

$this->breadcrumbs=array(
    array('name' => 'Attendances', 'url' => array('attendance/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>