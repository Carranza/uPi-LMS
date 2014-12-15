<tr>
    <?php
    $device = User::model()->findByPk($data->iduser);
    ?>
    <td><?php echo CHtml::encode($device->dni); ?></td>

    <?php
    $subject = Subject::model()->findByPk($data->idsubject);
    ?>
    <td><?php echo CHtml::encode($subject->nombre); ?></td>

    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/userSubject/view', 'iduser'=>$data->iduser, 'idsubject'=>$data->idsubject), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View registration')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/userSubject/update', 'iduser'=>$data->iduser, 'idsubject'=>$data->idsubject), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit registration')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/userSubject/delete', 'iduser'=>$data->iduser, 'idsubject'=>$data->idsubject), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete registration', 'confirm' => 'Are you sure you want to delete this registration?')); ?>
    </td>
</tr>
