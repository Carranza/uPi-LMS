<?php

class UserController extends Controller
{
    public $title = '';

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
				'actions'=>array('index','view', 'assign'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
        $this->title='Profile';

        $model = $this->loadModel($id);

        $rol = $model->rol;
        $img = $model->photo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];

            $uploadedFile = CUploadedFile::getInstance($model,'photo');
            // TODO: images with same name, posible error
            if ($uploadedFile != null) {
                $fileName = $uploadedFile->name;
                $model->photo = $fileName;
            }

            if($model->save()) {
                Yii::app()->authManager->revoke($rol, $id);
                Yii::app()->authManager->assign($model->rol, $id);

                if(!empty($uploadedFile)) {
                    if ($img != 'default.png')
                        unlink(Yii::getPathOfAlias('webroot').'/images/photos/'.$img);

                    $uploadedFile->saveAs(Yii::app()->basePath.'/../images/photos/'.$model->photo);
                }

                $this->redirect(array('index'));
            }
        }

        $this->render('view',array(
            'model'=>$model,
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new User;

        $this->layout='main';
        $this->title='Users';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];

            $uploadedFile = CUploadedFile::getInstance($model,'photo');
            // TODO: images with same name, posible error
            if ($uploadedFile != null) {
                $fileName = $uploadedFile->name;
                $model->photo = $fileName;
            }
            else {
                $model->photo = 'default.png';
            }

            /*
            // generate random password
            $length = 10;
            $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
            shuffle($chars);
            $password = implode(array_slice($chars, 0, $length));
            */

            $model->password = sha1($model->password);
			if($model->save()) {

                /*
                // send email with password to new user
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode('[uPi] Password').'?=';
                $headers=
                    "From: ".Yii::app()->params['adminEmail']."\r\n".
                    "Reply-To: ".Yii::app()->params['adminEmail']."\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";

                $content = 'Bienvenido a uPi, en proceso de su solicitud de registro con usuario ' .
                            $model->email . ' le adjuntamos su contraseña: ' . $password;

                mail($model->email,$subject,$content,$headers);
                */

                Yii::app()->authManager->assign($model->rol, $model->id);

                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../images/photos/'.$model->photo);
                }

                // $this->redirect(array('view', 'id' => $model->id));
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
        $this->title='Users';

		$model = $this->loadModel($id);

        $rol = $model->rol;
        $img = $model->photo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];

            $uploadedFile = CUploadedFile::getInstance($model,'photo');
            // TODO: images with same name, posible error
            if ($uploadedFile != null) {
                $fileName = $uploadedFile->name;
                $model->photo = $fileName;
            }

			if($model->save()) {
                Yii::app()->authManager->revoke($rol, $id);
                Yii::app()->authManager->assign($model->rol, $id);

                if(!empty($uploadedFile)) {
                    if ($img != 'default.png')
                        unlink(Yii::getPathOfAlias('webroot').'/images/photos/'.$img);

                    $uploadedFile->saveAs(Yii::app()->basePath.'/../images/photos/'.$model->photo);
                }

                $this->redirect(array('index'));
            }
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

        Yii::app()->authManager->revoke($model->rol, $id);

        if($model->photo != 'default.png')
            unlink(Yii::getPathOfAlias('webroot').'/images/photos/'.$model->photo);

        $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		// if(!isset($_GET['ajax']))
			// $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        $this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->layout='main';
        $this->title='Users';

        // Yii::app()->authManager->createRole("");
        /*
        if(Yii::app()->user->checkAccess("admin"))
            echo "admin";
        if(Yii::app()->user->checkAccess("professor"))
            echo "professor";
        if(Yii::app()->user->checkAccess("student"))
            echo "student";
        */

		$dataProvider = new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = User::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAssign($id)
    {
        if(Yii::app()->authManager->checkAccess($_GET["item"], $id))
            Yii::app()->authManager->revoke($_GET["item"], $id);
        else
            Yii::app()->authManager->assign($_GET["item"], $id);

        $this->redirect(array("view", "id"=>$id));
    }
}
