<?php
/* @var $this UserAttendanceController */
/* @var $model UserAttendance */

$this->breadcrumbs=array(
	'User Attendances'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserAttendance', 'url'=>array('index')),
	array('label'=>'Create UserAttendance', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-attendance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Attendances</h1>

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
	'id'=>'user-attendance-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'iduser',
		'idattendance',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
*/
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-attendance-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'iduser',
        'idattendance',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view' => array(
                    'url'=>'Yii::app()->createUrl("userattendance/view/", array("iduser"=>$data->iduser, "idattendance"=>$data->idattendance))',
                ),
                'update' => array(
                    'url'=>'Yii::app()->createUrl("userattendance/update/", array("iduser"=>$data->iduser, "idattendance"=>$data->idattendance))',
                ),
                'delete'=> array(
                    'url'=>'Yii::app()->createUrl("userattendance/delete/", array("iduser"=>$data->iduser, "idattendance"=>$data->idattendance))',
                ),
            ),
        ),
    ),
));
?>
