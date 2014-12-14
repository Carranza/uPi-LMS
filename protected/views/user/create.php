<?php
$this->pageTitle=Yii::app()->name. ' - Users';

$this->breadcrumbs=array(
    array('name' => 'Users', 'url' => array('user/index')),
    array('name' => 'Create'),
);

?>

<?php $action='Create'; ?>

<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>