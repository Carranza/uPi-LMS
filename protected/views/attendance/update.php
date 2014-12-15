<?php
$this->pageTitle=Yii::app()->name. ' - Attendance';

$this->breadcrumbs=array(
    array('name' => 'Attendance', 'url' => array('attendance/index')),
    array('name' => 'Update'),
);

?>

<?php $action='Update '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>