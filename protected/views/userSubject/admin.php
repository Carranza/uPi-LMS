<?php
/* @var $this UserSubjectController */
/* @var $model UserSubject */

$this->breadcrumbs=array(
	'User Subjects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserSubject', 'url'=>array('index')),
	array('label'=>'Create UserSubject', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-subject-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Subjects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-subject-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'iduser',
		'idsubject',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
*/
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-subject-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'iduser',
        'idsubject',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view' => array(
                    'url'=>'Yii::app()->createUrl("usersubject/view/", array("iduser"=>$data->iduser, "idsubject"=>$data->idsubject))',
                ),
                'update' => array(
                    'url'=>'Yii::app()->createUrl("usersubject/update/", array("iduser"=>$data->iduser, "idsubject"=>$data->idsubject))',
                ),
                'delete'=> array(
                    'url'=>'Yii::app()->createUrl("usersubject/delete/", array("iduser"=>$data->iduser, "idsubject"=>$data->idsubject))',
                ),
            ),
        ),
    ),
));
?>
