<?php
/* @var $this UserAttendanceController */
/* @var $data UserAttendance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iduser), array('view', 'iduser'=>$data->iduser, 'idattendance'=>$data->idattendance)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idattendance')); ?>:</b>
	<?php echo CHtml::encode($data->idattendance); ?>
	<br />

</div>
