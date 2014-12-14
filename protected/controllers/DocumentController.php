<?php

class DocumentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
		$model = new Document;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];

            $model->file = CUploadedFile::getInstance($model,'file');
            $model->size = ($model->file->size) / 1024 / 1024; // MB

            $subject = Subject::model()->findByPk($model->idsubject);
            $model->path = '/../files/'.$subject->iniciales;

			if($model->save()) {
                $model->file->saveAs(Yii::app()->basePath.$model->path.'/'.$model->file);

                $this->redirect(array('view', 'id' => $model->id));
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
		$model = $this->loadModel($id);

        $oldFile = $model->file;
        $oldSubject = Subject::model()->findByPk($model->idsubject);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
            $model->attributes=$_POST['Document'];

            $uploadedFile = CUploadedFile::getInstance($model,'file');

            $subject = Subject::model()->findByPk($model->idsubject);
            $model->path = '/../files/'.$subject->iniciales;

            // Change file
            if ($uploadedFile != null) {
                $model->file = $uploadedFile->name;
                $model->size = $uploadedFile->size / 1024 / 1024; // MB

                unlink(Yii::app()->basePath.'/../files/'.$oldSubject->iniciales.'/'.$oldFile);
            }

            // Change subject
            if ($oldSubject->id != $subject->id && $uploadedFile == null) {
                copy(Yii::app()->basePath.'/../files/'.$oldSubject->iniciales.'/'.$oldFile, Yii::app()->basePath.'/../files/'.$subject->iniciales.'/'.$oldFile);
                unlink(Yii::app()->basePath.'/../files/'.$oldSubject->iniciales.'/'.$oldFile);
            }

            if($model->save()) {
                if($uploadedFile != null)
                    $uploadedFile->saveAs(Yii::app()->basePath.$model->path.'/'.$model->file);

                $this->redirect(array('view', 'id' => $model->id));
            }


			$model->attributes=$_POST['Document'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model = $this->loadModel($id);

        unlink(Yii::app()->basePath.$model->path.'/'.$model->file);

        $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        // echo Yii::app()->basePath;

        // Yii::app()->basePath.$model->path.'/'.$model->file

        echo CHtml::link(
            'pdf',
            Yii::app()->createUrl('/files/ALEM/horarios.pdf') ,
            array('class'=>'button'));

		$dataProvider=new CActiveDataProvider('Document');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Document the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Document $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
