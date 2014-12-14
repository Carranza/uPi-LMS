<?php
$this->pageTitle=Yii::app()->name. ' - Devices';

$this->breadcrumbs=array(
    array('name' => 'Devices', 'url' => array('device/index')),
    array('name' => 'Update'),
);

?>

<?php $action='Update '; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>