<tr>
    <td><?php echo CHtml::encode($data->start); ?></td>
    <td><?php echo CHtml::encode($data->end); ?></td>
    <td><?php echo CHtml::encode($data->tipo); ?></td>

    <?php
    $subject = Subject::model()->findByPk($data->idsubject);
    ?>
    <td><?php echo CHtml::encode($subject->nombre); ?></td>

    <?php
    $device = Device::model()->findByPk($data->iddevice);
    ?>
    <td><?php echo CHtml::encode($device->name); ?></td>
    <!--
    <td><div class="progress no-margin"><div class="progress-bar progress-bar-danger" style="width: 15%"></div></div></td>
    -->
    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/attendance/view', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View attendance')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/attendance/update', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit attendance')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/attendance/delete', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete attendance', 'confirm' => 'Are you sure you want to delete this attendance?')); ?>
    </td>
</tr>
