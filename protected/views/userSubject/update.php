<?php
/* @var $this UserSubjectController */
/* @var $model UserSubject */

$this->breadcrumbs=array(
	'User Subjects'=>array('index'),
	$model->iduser=>array('view','iduser'=>$model->iduser,'idsubject'=>$model->idsubject),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserSubject', 'url'=>array('index')),
	array('label'=>'Create UserSubject', 'url'=>array('create')),
	array('label'=>'View UserSubject', 'url'=>array('view', 'iduser'=>$model->iduser, 'idsubject'=>$model->idsubject)),
	array('label'=>'Manage UserSubject', 'url'=>array('admin')),
);
?>

<h1>Update UserSubject <?php echo $model->iduser; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
