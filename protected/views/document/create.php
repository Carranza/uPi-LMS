<?php
$this->pageTitle=Yii::app()->name. ' - Documents';

$this->breadcrumbs=array(
    array('name' => 'Documents', 'url' => array('document/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>