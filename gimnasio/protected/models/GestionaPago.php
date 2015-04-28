<?php


class GestionaPago extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestiona_pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(
			array('rut_cliente, nombre_disciplina, fecha, hora', 'required'),
			array('nombre_disciplina', 'length', 'max'=>15),
			array('monto', 'numerical'),
			array('rut_cliente', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_cliente, nombre_disciplina, fecha, hora, monto', 'safe', 'on'=>'search'),
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
			'rut_cliente' => 'Rut Cliente',
			'nombre_disciplina' => 'Disciplina',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'monto' => 'Monto',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('nombre_disciplina',$this->nombre_disciplina);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('monto',$this->monto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
