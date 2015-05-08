<?php

/**
 * This is the model class for table "documents".
 *
 * The followings are the available columns in table 'documents':
 * @property integer $id
 * @property string $name
 * @property double $size
 * @property string $date
 * @property integer $visibility
 * @property integer $idsubject
 * @property string $path
 * @property string $file
 *
 * The followings are the available model relations:
 * @property Subjects $idsubject0
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, visibility, idsubject, file', 'required'),
			array('visibility, idsubject', 'numerical', 'integerOnly'=>true),
			array('size', 'numerical'),
			array('name, path', 'length', 'max'=>255), // file
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, size, date, visibility, idsubject, path, file', 'safe', 'on'=>'search'),

            array('file', 'file', 'types'=>'jpg,jpeg,doc,docx,xls,xlsx,pdf',
                'maxSize'=>1024 * 1024 * 100, // 100 MB
                'tooLarge'=>'The file was larger than 100 MB. Please upload a smaller file.',
                'allowEmpty' => true),
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
			'idsubject0' => array(self::BELONGS_TO, 'Subjects', 'idsubject'),
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
			'size' => 'Size',
			'date' => 'Date',
			'visibility' => 'Visibility',
			'idsubject' => 'Subject',
			'path' => 'Path',
			'file' => 'File',
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
		$criteria->compare('size',$this->size);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('idsubject',$this->idsubject);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
