<?php
$this->pageTitle=Yii::app()->name. ' - Subjects';

$this->breadcrumbs=array(
    array('name' => 'Subjects', 'url' => array('subject/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>