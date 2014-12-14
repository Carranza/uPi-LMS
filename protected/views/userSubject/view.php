<?php
/* @var $this UserSubjectController */
/* @var $model UserSubject */

$this->breadcrumbs=array(
	'User Subjects'=>array('index'),
	$model->iduser,
);

$this->menu=array(
	array('label'=>'List UserSubject', 'url'=>array('index')),
	array('label'=>'Create UserSubject', 'url'=>array('create')),
	array('label'=>'Update UserSubject', 'url'=>array('update', 'iduser'=>$model->iduser, 'idsubject'=>$model->idsubject)),
	array('label'=>'Delete UserSubject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','iduser'=>$model->iduser, 'idsubject'=>$model->idsubject),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserSubject', 'url'=>array('admin')),
);
?>

<h1>View UserSubject #<?php echo $model->iduser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iduser',
		'idsubject',
	),
)); ?>
