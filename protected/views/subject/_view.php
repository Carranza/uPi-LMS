<tr>
    <td><?php echo CHtml::encode($data->codigo); ?></td>
    <td><?php echo CHtml::encode($data->nombre); ?></td>
    <td><?php echo CHtml::encode($data->iniciales); ?></td>
    <td><?php echo CHtml::encode($data->creditos); ?></td>
    <!--
    <td><div class="progress no-margin"><div class="progress-bar progress-bar-danger" style="width: 15%"></div></div></td>
    -->
    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/subject/view', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View subject')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/subject/update', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit subject')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/subject/delete', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete subject', 'confirm' => 'Are you sure you want to delete this subject?')); ?>
    </td>
</tr>
