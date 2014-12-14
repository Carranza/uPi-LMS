<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $dni
 * @property string $password
 * @property string $photo
 * @property string $rol
 *
 * The followings are the available model relations:
 * @property Attendances[] $attendances
 * @property Subjects[] $subjects
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array('name, surname, email, dni, password, rol', 'required'),
			array('name, surname, email, dni, password, photo, rol', 'length', 'max'=>255),
            // TODO: remove password if uPi generate and send password automatically
			array('id, name, surname, email, dni, password, photo, rol', 'safe', 'on'=>'search'),

            array('photo', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'attendances' => array(self::MANY_MANY, 'Attendances', 'usersattendances(iduser, idattendance)'),
			'subjects' => array(self::MANY_MANY, 'Subjects', 'userssubjects(iduser, idsubject)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'surname' => 'Last Name',
			'email' => 'Email',
			'dni' => 'DNI',
			'password' => 'Password',
			'photo' => 'Photo',
			'rol' => 'Rol',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('rol',$this->rol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
