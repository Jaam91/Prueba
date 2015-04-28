<?php


class Disciplina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disciplina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('nombre', 'required'),
			array('valor_mensualidad', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>15),
			array('estado', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre, valor_mensualidad, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actividads' => array(self::HAS_MANY, 'Actividad', 'nombre'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_disciplina(nombre, rut_administrador)'),
			'clientes' => array(self::MANY_MANY, 'Cliente', 'gestiona_pago(nombre, rut_cliente)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'nombre' => 'Nombre',
			'valor_mensualidad' => 'Valor Mensualidad',
			'estado' => 'Estado',
		);
	}

	public function search()
	{
		

		$criteria=new CDbCriteria;

		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('valor_mensualidad',$this->valor_mensualidad);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
