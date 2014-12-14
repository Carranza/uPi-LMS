<?php
/* @var $this UserSubjectController */
/* @var $data UserSubject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iduser), array('view', 'iduser'=>$data->iduser, 'idsubject'=>$data->idsubject)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsubject')); ?>:</b>
	<?php echo CHtml::encode($data->idsubject); ?>
	<br />

</div>
