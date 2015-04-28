<?php


class AsignacionInstructor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asignacion_instructor';
	}

	public $id_dependencia;


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_cliente, nombre_actividad','required'),
			array('rut_instructor', 'required'),
			array('rut_instructor, rut_cliente', 'length', 'max'=>10),
			array('nombre_actividad', 'length', 'max'=>30),
			array('estado', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_asignacion, rut_instructor, rut_cliente, nombre_actividad, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actividad0' => array(self::BELONGS_TO, 'Actividad', 'nombre_actividad'),
			'rutCliente' => array(self::BELONGS_TO, 'Cliente', 'rut_cliente'),
			'rutInstructor' => array(self::BELONGS_TO, 'Instructor', 'rut_instructor'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_asignacion(id_asignacion, rut_administrador)'),
			'instructors' => array(self::MANY_MANY, 'Instructor', 'gestiona_progreso(id_asignacion, rut_instructor)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_asignacion' => 'Id Asignacion',
			'rut_instructor' => 'Nombre Instructor',
			'rut_cliente' => 'Nombre Cliente',
			'nombre_actividad' => 'Nombre Actividad',
			'estado' => 'Estado',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_asignacion',$this->id_asignacion);
		$criteria->compare('rut_instructor',$this->rut_instructor,true);
		$criteria->compare('rut_cliente',$this->rut_cliente,true);
		$criteria->compare('nombre_actividad',$this->nombre_actividad,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function listaActividades($rut)  // Lista de actividades inscritas de un cliente
	{

		$criteria=new CDbCriteria;

		$criteria->compare('rut_cliente',$rut,true);
		$criteria->compare('nombre_actividad',$this->nombre_actividad,true);
		$criteria->compare('id_dependencia', $this->id_dependencia, true);
		$criteria->compare('estado','=habilitado',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function verificarEliminacionActividad($actividad){

		$criteria = new CDbCriteria;
		$criteria->condition ='nombre_actividad =:actividad AND estado=:estado';
		$criteria->params = array(':actividad'=>$actividad, ':estado'=>'habilitado');

		$lista = AsignacionInstructor::model()->findAll($criteria);

		if($lista == NULL){  // NO HAY CLIENTES EN ESA ACTIVIDAD
			return 1;
		}
		else{
			$array = array();  // aca guardamos los rut de los clientes en la actividad
			$cont = 0;

			foreach($lista as $li){   // $lista guarda el array de objetos que cumplieron la condicion dentro de ASIGNACION INSTRUCTOR
				$array[$cont]= new Cliente;
				$array[$cont]->rut_usuario = $li->rut_cliente;
				$cont++;
			}
		}
	}

	public function cantidadClientesEnActividad($nombre)  // Recibe el nombre de la actividad
	{
		return $resultado = AsignacionInstructor::model()->count(array('condition'=>'estado=:estado AND nombre_actividad=:nombre',
															'params'=>array(':estado'=>'habilitado', ':nombre'=>$nombre)));

	}
}
