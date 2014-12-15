<?php
$this->pageTitle=Yii::app()->name. ' - Anotations';

$this->breadcrumbs=array(
    array('name' => 'Anotations', 'url' => array('userAttendance/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>