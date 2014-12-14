<tr>
    <?php
        if(Yii::app()->user->getState('email') == $data->email) {
            echo '<td><span class="label label-success">Online</span></td>';
        }
        else {
            echo '<td><span class="label label-danger">Offline</span></td>';
        }
    ?>
    <td><?php echo CHtml::encode($data->name); ?></td>
    <td><?php echo CHtml::encode($data->surname); ?></td>
    <td><?php echo CHtml::encode($data->email); ?></td>
    <td><?php echo CHtml::encode($data->rol); ?></td>
    <!--
    <td><div class="progress no-margin"><div class="progress-bar progress-bar-danger" style="width: 15%"></div></div></td>
    -->
    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/user/view', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View user')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/user/update', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit user')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/user/delete', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete user', 'confirm' => 'Are you sure you want to delete this user?')); ?>
    </td>
</tr>
