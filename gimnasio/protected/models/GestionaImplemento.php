<?php

/**
 * This is the model class for table "gestiona_implemento".
 *
 * The followings are the available columns in table 'gestiona_implemento':
 * @property string $rut_administrador
 * @property integer $id_implemento
 * @property string $fecha
 * @property string $hora
 * @property string $accion
 *
 * The followings are the available model relations:
 * @property Implemento $idImplemento
 * @property Administrador $rutAdministrador
 */
class GestionaImplemento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestiona_implemento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_administrador, id_implemento, fecha, hora', 'required'),
			array('id_implemento', 'numerical', 'integerOnly'=>true),
			array('rut_administrador', 'length', 'max'=>10),
			array('accion', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_administrador, id_implemento, fecha, hora, accion', 'safe', 'on'=>'search'),
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
			'idImplemento' => array(self::BELONGS_TO, 'Implemento', 'id_implemento'),
			'rutAdministrador' => array(self::BELONGS_TO, 'Administrador', 'rut_administrador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_administrador' => 'Rut Administrador',
			'id_implemento' => 'Id Implemento',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'accion' => 'Accion',
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

		$criteria->compare('rut_administrador',$this->rut_administrador,true);
		$criteria->compare('id_implemento',$this->id_implemento);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('accion',$this->accion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GestionaImplemento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
