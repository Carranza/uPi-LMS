<?php
/* @var $this UserAttendanceController */
/* @var $model UserAttendance */

$this->breadcrumbs=array(
	'User Attendances'=>array('index'),
	$model->iduser=>array('view','id'=>$model->iduser),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserAttendance', 'url'=>array('index')),
	array('label'=>'Create UserAttendance', 'url'=>array('create')),
	array('label'=>'View UserAttendance', 'url'=>array('view', 'iduser'=>$model->iduser, 'idattendance'=>$model->idattendance)),
	array('label'=>'Manage UserAttendance', 'url'=>array('admin')),
);
?>

<h1>Update UserAttendance <?php echo $model->iduser; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
