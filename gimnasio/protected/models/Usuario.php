<?php


class Usuario extends CActiveRecord
{

	public function tableName()
	{
		return 'usuario';
	}

	public $horario;
	public $tipo;


	public function rules()
	{

		return array(
			array('rut_usuario, rol', 'required'),
			array('rut_usuario', 'length', 'max'=>10),
			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido', 'length', 'max'=>40),
			array('direccion', 'length', 'max'=>50),
			array('telefono, estado', 'length', 'max'=>12),
			array('nacionalidad', 'length', 'max'=>20),
			array('correo, contrasena', 'length', 'max'=>30),
			array('rol', 'length', 'max'=>15),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_usuario, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, direccion, telefono, nacionalidad, correo, contrasena, rol, estado, horario', 'safe', 'on'=>'search'),
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
			'administrador' => array(self::HAS_ONE, 'Administrador', 'rut_usuario'),
			'cliente' => array(self::HAS_ONE, 'Cliente', 'rut_usuario'),
			'instructor' => array(self::HAS_ONE, 'Instructor', 'rut_usuario'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'rut_usuario' => 'Rut Usuario',
			'primer_nombre' => 'Nombre Completo',
			'segundo_nombre' => 'Segundo Nombre',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'nacionalidad' => 'Nacionalidad',
			'correo' => 'Correo',
			'contrasena' => 'Contrasena',
			'rol' => 'Rol',
			'estado' => 'Estado',
			'horario' => 'Horario',
			'tipo' => 'Tipo',
		);
	}

	public function search($rol, $estado)
	{

		$criteria=new CDbCriteria;
		$criteria->with = array('instructor');

		$criteria->compare('t.rut_usuario',$this->rut_usuario,true);
		$criteria->compare('primer_nombre',$this->primer_nombre,true);
		$criteria->compare('segundo_nombre',$this->segundo_nombre,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		//$criteria->compare('instructor.tipo', $this->tipo, true);

		if($rol == "Cliente")
			$criteria->compare('rol','='.$rol,true);		
		else
			$criteria->compare('rol','<>Cliente',true);
		
		$criteria->compare('estado','='.$estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search2($estado, $tipo)  // Especial para Instructores
	{

		$criteria=new CDbCriteria;
		$criteria->with = array('instructor');

		$criteria->compare('rut_usuario',$this->rut_usuario,true);
		$criteria->compare('primer_nombre',$this->primer_nombre,true);
		$criteria->compare('segundo_nombre',$this->segundo_nombre,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('rol', '=Instructor', true);
		$criteria->compare('instructor.tipo','='.$tipo, true);
		$criteria->compare('estado','='.$estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getListaUsuarios($tipo_usuario)
    {
    	$criteria = new CDbCriteria;
		$criteria->order = 'primer_apellido';
		$criteria->condition = 'estado = :estado AND rol = :rol';
		$criteria->params=array(':estado'=>'habilitado',':rol'=>$tipo_usuario);
		$usuario=Usuario::model()->findAll($criteria);

		// OPCIONAL, para enviar el nombre del usuario concatenado con el apellido paterno y materno
		$array = array();
		$cont = 0;
		foreach ($usuario as $u){
			$array[$cont] = new Usuario;
			$array[$cont]->rut_usuario = $u->rut_usuario;
			$array[$cont]->primer_nombre = $u->primer_nombre.' '.$u->primer_apellido.' '.$u->segundo_apellido;
			$cont++;
		}
        return $array;
    } 

	public function getListaInstructor($tipo_instructor)
    {
    	$instructor = Instructor::model()->tableName();

    	$criteria = new CDbCriteria;
    	$criteria->join = 'left join '.$instructor.' I on (I.rut_usuario = t.rut_usuario)';							
		$criteria->order = 't.primer_apellido';
		$criteria->condition = 'estado = :estado AND rol = :rol AND I.tipo=:tipo';
		$criteria->params=array(':estado'=>'habilitado',':rol'=>"Instructor", ':tipo'=>$tipo_instructor);
		$usuario=Usuario::model()->findAll($criteria);

		// OPCIONAL, para enviar el nombre del usuario concatenado con el apellido paterno y materno
		$array = array();
		$cont = 0;
		foreach ($usuario as $u){
			$array[$cont] = new Usuario;
			$array[$cont]->rut_usuario = $u->rut_usuario;
			$array[$cont]->primer_nombre = $u->primer_nombre.' '.$u->primer_apellido.' '.$u->segundo_apellido;
			$cont++;
		}
        return $array;
    }

	public function getInstructorPorDisciplina()
    {

    	/*
    	$disciplina = Disciplina::model()->find(array('condition'=>'nombre=:nombre',
    												'params'=>array(':nombre'=>"Musculación")));

     	Select u.primer_nombre, u.primer_apellido
		FROM Instructor AS i, Actividad AS a, Usuario AS u
		WHERE i.rut_usuario = a.rut_instructor AND a.id_disciplina = 2 AND i.rut_usuario = u.rut_usuario *

		$criteria = new CDbCriteria();
		$instructor = Instructor::model()->tableName();
		$actividad = Actividad::model()->tableName();

		$criteria->select = array('t.*');
		$criteria->distinct = true;
		$criteria->join = 'left join '.$instructor.' I on (I.rut_usuario = t.rut_usuario) 
							left join '.$actividad.' A on (I.rut_usuario = A.rut_instructor)';


		$criteria->condition = 'A.id_disciplina = :id_disciplina AND t.estado =:estado';
		$criteria->params = array(':id_disciplina'=>$disciplina->id_disciplina, ':estado'=>'habilitado');

		return $resultado = Usuario::model()->findAll($criteria); */
    }  

     public function validarPagoCliente(){


		$criteria = new CDbCriteria;
		$criteria->condition = 'estado = :estado AND rol = :rol';
		$criteria->params=array(':estado'=>'habilitado',':rol'=>'Cliente');
     	$lista = Usuario::model()->findAll($criteria);

     	$mes = date(m);
     	$year = date(y);//falata condicion que el mes y el año deben ser iguales
     	    	

     	foreach ($lista as $li) {
     		$resultado = GestionaPago::model()->find(array('condition'=>'rut_cliente=:rut_cliente',
     			                                     'params'=>array(':rut_cliente'=>$li->rut_usuario)));
     		if($resultado==null){

     			$li->estado = 'eliminado';
     			$li->save();
             
     	}
     }          
    }

    public function listaClientes(){

		$lista =Usuario::model()->findAll(array('condition'=>'estado=:estado AND rol=:rol',
											'params'=>array(':estado'=>'habilitado',':rol'=>'Cliente')));

		$array = array();
		$cont=0;

		foreach($lista as $li){
			$array[$cont] = new Usuario;
			$array[$cont]->rut_usuario = $li->rut_usuario;
			$array[$cont]->primer_nombre = $li->primer_nombre." ".$li->primer_apellido." ".$li->segundo_apellido;
			$cont++;
		}
		return $array;
	}

	public function NombreCompleto($rut)
	{

		$persona = Usuario::model()->findByPk($rut);

		$array = array();

		$array[0] = new Usuario;
		$array[0]->primer_nombre = $persona->primer_nombre." ".$persona->primer_apellido." ".$persona->segundo_apellido;

		return $array;
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
