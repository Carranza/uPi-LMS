<?php

/**
 * model view/list (login android)
 *
 * 0 means username incorrect
 * 1 means password incorrect
 * 2 means headers not set
 *
 * model create
 *
 * 3 means model can't save
 *
 */
class ApiController extends Controller
{
    // key which has to be in HTTP USERNAME and PASSWORD headers
    Const APPLICATION_ID = 'UPI';

    // 'json' or 'xml'
    private $format = 'json';

    public function filters()
    {
        return array();
    }

    public function actionIndex()
    {
        echo CJSON::encode('uPi API');
    }

    public function actionList()
    {
        $this->_checkAuth();

        $headers = apache_request_headers();
        $username = $headers['X_'.self::APPLICATION_ID.'_USERNAME'];

        // get the respective model instance
        switch($_GET['model'])
        {
            case 'subject':
                $user = User::model()->find('LOWER(email)=?',array(strtolower($username)));

                $criteria = new CDbCriteria();
                $criteria->select = 'idsubject';
                $criteria->condition = 'iduser=:iduser';
                $criteria->params = array(':iduser'=>$user->id);
                $models = UserSubject::model()->findAll($criteria);

                $rows = array();
                foreach($models as $model) {
                    $criteria = new CDbCriteria();
                    // $criteria->select = 'id, iniciales';
                    $criteria->condition = 'id=:id';
                    $criteria->params = array(':id'=>$model->idsubject);
                    $subject = Subject::model()->find($criteria);

                    $rows[] = $subject->attributes;
                }

                $this->_sendResponse(200, CJSON::encode($rows));
                break;
            case 'user':
                // find the user
                $model = User::model()->find('LOWER(email)=?',array(strtolower($username)));
                $this->_sendResponse(200, CJSON::encode($model));
                break;
            case 'document':
                // find all the documents (user documents)
                $user = User::model()->find('LOWER(email)=?',array(strtolower($username)));

                $criteria = new CDbCriteria();
                $criteria->select = 'idsubject';
                $criteria->condition = 'iduser=:iduser';
                $criteria->params = array(':iduser'=>$user->id);
                $models = UserSubject::model()->findAll($criteria);

                $rows = array();
                foreach($models as $model) {

                    $criteria2 = new CDbCriteria();
                    $criteria2->condition = 'idsubject=:idsubject';
                    $criteria2->params = array(':idsubject'=>$model->idsubject);

                    $documents = Document::model()->findAll($criteria2);

                    foreach($documents as $document) {
                        $rows[] = $document;
                    }
                }

                $this->_sendResponse(200, CJSON::encode($rows));
                break;

            default:
                // model not implemented error
                $this->_sendResponse(501, sprintf('error: mode <b>view/list</b> is not implemented for model <b>%s</b>', $_GET['model']));
                Yii::app()->end();
        }
    }

    public function actionCreate()
    {
        $this->_checkAuth();

        switch($_GET['model'])
        {
            // Get an instance of the respective model
            case 'attendance':
                $model = new Attendance;

                foreach($_POST as $var=>$value) {
                    if ($var === 'end') {
                        $model->end = date('Y-m-d G:i:s', strtotime('+' . $value . ' minute'));
                    } else if ($var === 'bMAC') {
                        // ajustar el iddevice
                        $criteria = new CDbCriteria();
                        $criteria->condition = 'bMAC=:bMAC';
                        $criteria->params = array(':bMAC' => $value);
                        $device = Device::model()->find($criteria);

                        $model->iddevice = $device->id;
                    } else if ($var === 'iniciales') {
                        // ajustar el idsubject
                        $criteria = new CDbCriteria();
                        $criteria->condition = 'iniciales=:iniciales';
                        $criteria->params = array(':iniciales' => $value);
                        $subject = Subject::model()->find($criteria);

                        $model->idsubject = $subject->id;
                    } else {
                        $model->$var = $value;
                    }
                }

                break;
            case 'annotation':
                $model = new UserAttendance;
                $model->iduser = '1';

                $attendances = Attendance::model()->findAll();

                foreach($attendances as $attendance) {
                    $model->idattendance = $attendance->id;
                }

                break;
            default:
                $this->_sendResponse(501, sprintf('error: mode <b>view/list</b> is not implemented for model <b>%s</b>', $_GET['model']));
                Yii::app()->end();
        }

        // try to save the model
        if($model->save()) {
            $this->_sendResponse(200, CJSON::encode($model));
        }
        else {
            $this->_sendResponse(500, '3');
        }
    }

    public function actionUpdate()
    {
    }

    public function actionDelete()
    {
    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        echo $body;

        Yii::app()->end();
    }

    private function _checkAuth()
    {
        $headers = apache_request_headers();

        // check if we have the USERNAME and PASSWORD HTTP headers are set
        if(!(isset($headers['X_'.self::APPLICATION_ID.'_USERNAME']) and isset($headers['X_'.self::APPLICATION_ID.'_PASSWORD']))) {
            // error: unauthorized
            $this->_sendResponse(401, '2');
        }

        $username = $headers['X_'.self::APPLICATION_ID.'_USERNAME'];
        $password = $headers['X_'.self::APPLICATION_ID.'_PASSWORD'];

        // find the user
        $user = User::model()->find('LOWER(email)=?',array(strtolower($username)));
        if($user === null) {
            // error: unauthorized
            // $this->_sendResponse(401, 'error: user name is invalid');
            $this->_sendResponse(401,'0');
        } else if(sha1($password) !== $user->password) {
            // error: unauthorized
            // $this->_sendResponse(401, 'error: user password is invalid');
            $this->_sendResponse(401, '1');
        }
    }

    private function _getStatusCodeMessage($status)
    {
        $codes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}
