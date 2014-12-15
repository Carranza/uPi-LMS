<tr>
    <?php
    $user = User::model()->findByPk($data->iduser);
    ?>
    <td><?php echo CHtml::encode($user->dni); ?></td>

    <?php
    $attendance = Attendance::model()->findByPk($data->idattendance);
    ?>
    <td><?php echo CHtml::encode($attendance->start); ?></td>
    <td><?php echo CHtml::encode($attendance->end); ?></td>

    <?php
    $subject = Subject::model()->findByPk($attendance->idsubject);
    ?>
    <td><?php echo CHtml::encode($subject->nombre); ?></td>

    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',array('/userAttendance/view', 'iduser'=>$data->iduser, 'idattendance'=>$data->idattendance), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View anotation')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/userAttendance/update', 'iduser'=>$data->iduser, 'idattendance'=>$data->idattendance), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit anotation')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/userAttendance/delete', 'iduser'=>$data->iduser, 'idattendance'=>$data->idattendance), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete anotation', 'confirm' => 'Are you sure you want to delete this anotation?')); ?>
    </td>
</tr>
