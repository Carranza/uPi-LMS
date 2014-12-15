<?php
$this->pageTitle=Yii::app()->name. ' - Registrations';

$this->breadcrumbs=array(
    array('name' => 'Registrations', 'url' => array('userSubject/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>