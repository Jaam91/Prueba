<?php


class Instructor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'instructor';
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_usuario', 'required'),
			array('rut_usuario', 'length', 'max'=>10),
			array('profesion', 'length', 'max'=>40),
			array('curriculum_vitae', 'length', 'max'=>50),
			array('tipo', 'length', 'max'=>40),
			array('horario', 'length', 'max'=>30),
			array('fecha_ingreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_usuario, profesion, fecha_ingreso, curriculum_vitae, tipo, horario', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actividads' => array(self::HAS_MANY, 'Actividad', 'rut_usuario'),
			'asignacionEntrenadors' => array(self::MANY_MANY, 'AsignacionEntrenador', 'gestiona_progreso(rut_instructor, id_asignacion)'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_instructor(rut_instructor, rut_administrador)'),
			'rutUsuario' => array(self::BELONGS_TO, 'Usuario', 'rut_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_usuario' => 'Rut Usuario',
			'profesion' => 'Profesion',
			'fecha_ingreso' => 'Fecha Ingreso',
			'curriculum_vitae' => 'Curriculum Vitae',
			'tipo' => 'Tipo',
			'horario' => 'Horario',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rut_usuario',$this->rut_usuario,true);
		$criteria->compare('profesion',$this->profesion,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('curriculum_vitae',$this->curriculum_vitae,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('horario',$this->horario,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
