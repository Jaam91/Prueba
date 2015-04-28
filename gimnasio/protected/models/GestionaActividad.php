<?php

/**
 * This is the model class for table "gestiona_actividad".
 *
 * The followings are the available columns in table 'gestiona_actividad':
 * @property string $rut_administrador
 * @property string $nombre_actividad
 * @property string $fecha
 * @property string $hora
 * @property string $accion
 */
class GestionaActividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestiona_actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_administrador, nombre_actividad, fecha, hora', 'required'),
			array('rut_administrador', 'length', 'max'=>10),
			array('nombre_actividad', 'length', 'max'=>30),
			array('accion', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_administrador, nombre_actividad, fecha, hora, accion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_administrador' => 'Rut Administrador',
			'nombre_actividad' => 'Nombre Actividad',
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
		$criteria->compare('nombre_actividad',$this->nombre_actividad,true);
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
	 * @return GestionaActividad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
