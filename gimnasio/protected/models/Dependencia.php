<?php


class Dependencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dependencia';
	}


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dependencia', 'required'),
			array('id_dependencia', 'length', 'max'=>17),
			array('metros_cuadrados', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_dependencia, metros_cuadrados, estado', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actividads' => array(self::HAS_MANY, 'Actividad', 'id_dependencia'),
			'clientes' => array(self::MANY_MANY, 'Cliente', 'gestiona_asistencia(id_dependencia, rut_cliente)'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_dependencia(id_dependencia, rut_administrador)'),
			'implementos' => array(self::HAS_MANY, 'Implemento', 'id_dependencia'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_dependencia' => 'Id Dependencia',
			'metros_cuadrados' => 'Metros Cuadrados',
			'estado '=> 'Estado',
		);
	}


	public function search($estado)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_dependencia',$this->id_dependencia);
		$criteria->compare('metros_cuadrados',$this->metros_cuadrados,true);
		$criteria->compare('estado',$estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
