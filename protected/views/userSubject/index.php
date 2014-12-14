<?php
/* @var $this UserSubjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Subjects',
);

$this->menu=array(
	array('label'=>'Create UserSubject', 'url'=>array('create')),
	array('label'=>'Manage UserSubject', 'url'=>array('admin')),
);
?>

<h1>User Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
