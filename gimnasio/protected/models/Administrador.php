<?php


class Administrador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'administrador';
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
			array('fecha_ingreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_usuario, profesion, fecha_ingreso, curriculum_vitae', 'safe', 'on'=>'search'),
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
			'rutUsuario' => array(self::BELONGS_TO, 'Usuario', 'rut_usuario'),
			'actividads' => array(self::MANY_MANY, 'Actividad', 'gestiona_actividad(rut_administrador, id_actividad)'),
			'asignacionEntrenadors' => array(self::MANY_MANY, 'AsignacionEntrenador', 'gestiona_asignacion(rut_administrador, id_asignacion)'),
			'clientes' => array(self::MANY_MANY, 'Cliente', 'gestiona_cliente(rut_administrador, rut_cliente)'),
			'dependencias' => array(self::MANY_MANY, 'Dependencia', 'gestiona_dependencia(rut_administrador, id_dependencia)'),
			'disciplinas' => array(self::MANY_MANY, 'Disciplina', 'gestiona_disciplina(rut_administrador, id_disciplina)'),
			'implementos' => array(self::MANY_MANY, 'Implemento', 'gestiona_implemento(rut_administrador, id_implemento)'),
			'informes' => array(self::MANY_MANY, 'Informe', 'gestiona_informe(rut_administrador, id_informe)'),
			'instructors' => array(self::MANY_MANY, 'Instructor', 'gestiona_instructor(rut_administrador, rut_instructor)'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
