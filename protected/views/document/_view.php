<tr>
    <td><?php echo CHtml::encode($data->name); ?></td>
    <td><?php echo CHtml::encode($data->size); ?></td>
    <td><?php echo CHtml::encode($data->date); ?></td>
    <td><?php echo CHtml::encode($data->visibility); ?></td>

    <?php
        $subject = Subject::model()->findByPk($data->idsubject);
    ?>

    <td><?php echo CHtml::encode($subject->nombre); ?></td>
    <!--
    <td><div class="progress no-margin"><div class="progress-bar progress-bar-danger" style="width: 15%"></div></div></td>
    -->

    <td class="text-right">
        <?php echo CHtml::link('<i class="fa fa-eye"></i>',Yii::app()->createUrl($data->path.'/'.$data->file), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'View document')); ?>
        <?php echo CHtml::link('<i class="fa fa-pencil"></i>',array('/document/update', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Edit document')); ?>
        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',array('/document/delete', 'id'=>$data->id), array('class'=>'btn btn-xs btn-default btn-equal', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-original-title'=>'Delete document', 'confirm' => 'Are you sure you want to delete this document?')); ?>
    </td>
</tr>