<?php
/* @var $this UserAttendanceController */
/* @var $model UserAttendance */

$this->breadcrumbs=array(
	'User Attendances'=>array('index'),
	$model->iduser,
);

$this->menu=array(
	array('label'=>'List UserAttendance', 'url'=>array('index')),
	array('label'=>'Create UserAttendance', 'url'=>array('create')),
	array('label'=>'Update UserAttendance', 'url'=>array('update', 'iduser'=>$model->iduser, 'idattendance'=>$model->idattendance)),
	array('label'=>'Delete UserAttendance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','iduser'=>$model->iduser, 'idattendance'=>$model->idattendance),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserAttendance', 'url'=>array('admin')),
);
?>

<h1>View UserAttendance #<?php echo $model->iduser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iduser',
		'idattendance',
	),
)); ?>
