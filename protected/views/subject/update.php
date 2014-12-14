<?php
$this->pageTitle=Yii::app()->name. ' - Subjects';

$this->breadcrumbs=array(
    array('name' => 'Subjects', 'url' => array('subject/index')),
    array('name' => 'Update'),
);

?>

<?php $action='Update '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>