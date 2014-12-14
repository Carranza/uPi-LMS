<?php
/* @var $this UserSubjectController */
/* @var $model UserSubject */

$this->breadcrumbs=array(
	'User Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserSubject', 'url'=>array('index')),
	array('label'=>'Manage UserSubject', 'url'=>array('admin')),
);
?>

<h1>Create UserSubject</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>