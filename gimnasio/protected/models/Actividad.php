<?php


class Actividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actividad';
	}

	public $numero;


	public function rules()
	{

		return array(
			array('nombre, nombre_disciplina, id_dependencia', 'required'),
			array('nombre_disciplina', 'length', 'max'=>15),
			array('id_dependencia', 'length', 'max'=>5),
			array('nombre', 'length', 'max'=>30),
			array('rut_instructor', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>12),
			array('cantidad_clientes', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre, nombre_disciplina, id_dependencia, rut_instructor, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
			'rutUsuario' => array(self::BELONGS_TO, 'Instructor', 'rut_instructor'),
			'idDisciplina' => array(self::BELONGS_TO, 'Disciplina', 'nombre'),
			'asignacionInstructors' => array(self::HAS_MANY, 'AsignacionInstructor', 'nombre_actividad'),
			'idDependencia' => array(self::BELONGS_TO, 'Dependencia', 'id_dependencia'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_actividad(id_actividad, rut_administrador)'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'nombre' => 'Nombre',
			'nombre_disciplina' => 'Disciplina',
			'id_dependencia' => 'Id Dependencia',
			'rut_instructor' => 'Nombre Instructor',
			'estado' => 'Estado',
			'numero' => 'Numero',
			'cantidad_clientes' => 'Cantidad Clientes',
		);
	}


	public function search($estado)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_disciplina',$this->nombre_disciplina);
		$criteria->compare('id_dependencia',$this->id_dependencia);
		$criteria->compare('rut_instructor',$this->rut_instructor,true);
		$criteria->compare('estado','='.$estado,true);
		$criteria->compare('cantidad_clientes', '='.$this->cantidad_clientes,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchClientes($cantidad_clientes, $id_dependencia)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('cantidad_clientes', '>'.$cantidad_clientes,true);
		$criteria->compare('id_dependencia', '='.$id_dependencia,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));		
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
