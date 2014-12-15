<?php
$this->pageTitle=Yii::app()->name. ' - Documents';

$this->breadcrumbs=array(
    array('name' => 'Documents', 'url' => array('document/index')),
    array('name' => 'Update'),
);

?>

<?php $action='Update '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>