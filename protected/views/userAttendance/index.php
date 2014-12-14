<?php
/* @var $this UserAttendanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Attendances',
);

$this->menu=array(
	array('label'=>'Create UserAttendance', 'url'=>array('create')),
	array('label'=>'Manage UserAttendance', 'url'=>array('admin')),
);
?>

<h1>User Attendances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
