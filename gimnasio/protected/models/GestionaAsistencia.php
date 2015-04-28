<?php

/**
 * This is the model class for table "gestiona_asistencia".
 *
 * The followings are the available columns in table 'gestiona_asistencia':
 * @property string $rut_cliente
 * @property string $id_dependencia
 * @property string $fecha
 * @property string $hora_ingreso
 * @property string $hora_salida
 *
 * The followings are the available model relations:
 * @property Cliente $rutCliente
 * @property Dependencia $idDependencia
 */
class GestionaAsistencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestiona_asistencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, hora_ingreso', 'required'),
			array('rut_cliente', 'length', 'max'=>10),
			array('id_dependencia', 'length', 'max'=>17),
			array('hora_salida', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_cliente, id_dependencia, fecha, hora_ingreso, hora_salida', 'safe', 'on'=>'search'),
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
			'rutCliente' => array(self::BELONGS_TO, 'Cliente', 'rut_cliente'),
			'idDependencia' => array(self::BELONGS_TO, 'Dependencia', 'id_dependencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_cliente' => 'Rut Cliente',
			'id_dependencia' => 'Id Dependencia',
			'fecha' => 'Fecha',
			'hora_ingreso' => 'Hora Ingreso',
			'hora_salida' => 'Hora Salida',
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

		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('id_dependencia',$this->id_dependencia,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora_ingreso',$this->hora_ingreso,true);
		$criteria->compare('hora_salida',$this->hora_salida,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GestionaAsistencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
