<?php

class UserSubjectController extends Controller
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
	public function actionView($iduser, $idsubject)
	{
        $this->layout='main';
        $this->title='Registrations';

        $this->redirect(array('index'));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout='main';
        $this->title='Registrations';

		$model = new UserSubject;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserSubject']))
		{
			$model->attributes=$_POST['UserSubject'];

			if($model->save())
				$this->redirect(array('view','iduser'=>$model->iduser, 'idsubject'=>$model->idsubject));
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
	public function actionUpdate($iduser, $idsubject)
	{
        $this->layout='main';
        $this->title='Registrations';

		$model = $this->loadModel($iduser, $idsubject);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserSubject']))
		{
			$model->attributes=$_POST['UserSubject'];
			if($model->save())
				$this->redirect(array('index'));
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
	public function actionDelete($iduser, $idsubject)
	{
        $this->layout='main';
        $this->title='Registrations';

		$model = $this->loadModel($iduser, $idsubject);
        $model->delete();

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
        $this->title='Registrations';

		$dataProvider = new CActiveDataProvider('UserSubject');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout='main';
        $this->title='Registrations';

		$model=new UserSubject('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserSubject']))
			$model->attributes=$_GET['UserSubject'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserSubject the loaded model
	 * @throws CHttpException
	 */

    /*
	public function loadModel($id)
	{
		$model=UserSubject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    */

    public function loadModel($iduser, $idsubject)
    {
        $model = UserSubject::model()->findByPk(array('iduser'=>$iduser, 'idsubject'=>$idsubject));

        if($model==null)
            throw new CHttpException(404,'The requested page does not exist.');

        return $model;
    }

	/**
	 * Performs the AJAX validation.
	 * @param UserSubject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-subject-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
