<?php
    $this->pageTitle=Yii::app()->name. ' - Home';

    /*
    $this->breadcrumbs=array(
        array('name' => 'Home', 'url' => array('site/index')),
        array('name' => 'Index',),
    );
    */
?>

<div class="row">
    <!-- BEGIN CALENDAR-->
    <div class="col-lg-12">
        <div class="box box-tiles style-support3">
            <div class="row">
                <div class="col-md-3">
                    <div class="box-body-darken small-padding style-support3">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-sm btn-support3 active">
                                <input type="radio" name="calendarMode" value="month">Month
                            </label>
                            <label class="btn btn-sm btn-support3">
                                <input type="radio" name="calendarMode" value="agendaWeek">Week
                            </label>
                            <label class="btn btn-sm btn-support3">
                                <input type="radio" name="calendarMode" value="agendaDay">Day
                            </label>
                        </div>
                        <div class="btn-group pull-right">
                            <button id="calender-prev" type="button" class="btn btn-sm btn-equal btn-support3"><i class="fa fa-chevron-left"></i></button>
                            <button id="calender-next" type="button" class="btn btn-sm btn-equal btn-support3"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="force-padding">
                        <h1 class="text-light selected-day">&nbsp;</h1>
                        <h3 class="text-light selected-date">&nbsp;</h3>
                        <br/><br/>
                        <ul class="list-events list-group">
                            <li class="list-group-header">
                                <h4 class="text-light"><i class="fa fa-plus-circle fa-fw"></i> Draggable events</h4>
                            </li>
                            <li class="list-group-item">
                                <span>Class</span>
                            </li>
                            <li class="list-group-item">
                                <span>Conference</span>
                            </li>
                            <li class="list-group-item">
                                <span>Meeting</span>
                            </li>
                            <li class="list-group-item">
                                <span>Exam</span>
                            </li>
                        </ul>
                    </div>
                </div><!--end .col-md-3 -->
                <div class="col-md-9 style-white">
                    <div id="calendar"></div>
                </div><!--end .col-md-9 -->
            </div><!--end .row -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
    <!-- END CALENDAR-->
</div>