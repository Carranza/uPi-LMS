<tr>
    <td><?php echo CHtml::encode($data->name); ?></td>
    <td><?php echo CHtml::encode($data->MAC); ?></td>
    <td><?php echo CHtml::encode($data->bname); ?></td>
    <td><?php echo CHtml::encode($data->bMAC); ?></td>
    <!--
    <td><div class="progress no-margin"><div class="progress-bar progress-bar-danger" style="width: 15%"></div></div></td>
    -->
    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/device/view', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View device')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/device/update', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit device')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/device/delete', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete device', 'confirm' => 'Are you sure you want to delete this user?')); ?>
    </td>
</tr>