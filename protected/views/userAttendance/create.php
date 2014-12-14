<?php
/* @var $this UserAttendanceController */
/* @var $model UserAttendance */

$this->breadcrumbs=array(
	'User Attendances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserAttendance', 'url'=>array('index')),
	array('label'=>'Manage UserAttendance', 'url'=>array('admin')),
);
?>

<h1>Create UserAttendance</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>