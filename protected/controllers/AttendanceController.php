<?php

class AttendanceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $title='';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            /*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
            */
            array('allow',
                'actions'=>array('view', 'create', 'update', 'delete', 'index', 'admin'),
                'roles'=>array('admin', 'professor'),
            ),
                array('deny',
                    'users'=>array('*'),
                ),
            );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->layout='main';
        $this->title='Attendances';

        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout='main';
        $this->title='Attendances';

		$model=new Attendance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendance']))
		{
			$model->attributes=$_POST['Attendance'];

            $model->end = date('Y-m-d G:i:s', strtotime('+'.$model->end.' minute'));
			if($model->save()) {
                $this->redirect('index');
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->layout='main';
        $this->title='Attendances';

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendance']))
		{
			$model->attributes=$_POST['Attendance'];

            $model->end = date('Y-m-d G:i:s', strtotime('+'.$model->end.' minutes', strtotime($model->start)));
			if($model->save())
				$this->redirect('index');
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $this->layout='main';
        $this->title='Attendances';

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
            $this->redirect('index');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->layout='main';
        $this->title='Attendances';

        /*
        $criteria = new CDbCriteria();
        $criteria->condition = 'bMAC=:bMAC';
        $criteria->params = array(':bMAC'=>'00:15:83:0C:BF:EB');
        $model = Device::model()->find($criteria);

        echo $model->name;
        */

        /*
        $model=$this->loadModel(7);

        $startdate = strtotime($model->start);
        echo date('Y-m-d h:i:s', $startdate);
        echo '<br/>';
        $enddate = strtotime('+10 minutes', $startdate);
        echo date('Y-m-d h:i:s', $enddate);
        // echo $model->start;
        // echo date("Y-m-d h:i:s", strtotime($model->start.' + '.$model->end.' minute'));

        // echo $model->start;
        */

		$dataProvider=new CActiveDataProvider('Attendance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attendance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendance']))
			$model->attributes=$_GET['Attendance'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Attendance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Attendance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Attendance $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
