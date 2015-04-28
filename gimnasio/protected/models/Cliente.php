<?php


class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_usuario, peso, altura', 'required'),
			array('peso, altura', 'numerical'),
			array('rut_usuario', 'length', 'max'=>10),
			array('telefono_emergencia', 'length', 'max'=>12),
			array('enfermedades_previas', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut_usuario, telefono_emergencia, peso, altura, enfermedades_previas', 'safe', 'on'=>'search'),
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
			'asignacionEntrenadors' => array(self::HAS_MANY, 'AsignacionEntrenador', 'rut_cliente'),
			'rutUsuario' => array(self::BELONGS_TO, 'Usuario', 'rut_usuario'),
			'dependencias' => array(self::MANY_MANY, 'Dependencia', 'gestiona_asistencia(rut_cliente, id_dependencia)'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_cliente(rut_cliente, rut_administrador)'),
			'disciplinas' => array(self::MANY_MANY, 'Disciplina', 'gestiona_pago(rut_cliente, id_disciplina)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut_usuario' => 'Rut Usuario',
			'telefono_emergencia' => 'Telefono Emergencia',
			'peso' => 'Peso',
			'altura' => 'Altura',
			'enfermedades_previas' => 'Enfermedades Previas',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('rut_usuario',$this->rut_usuario,true);
		$criteria->compare('telefono_emergencia',$this->telefono_emergencia,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('altura',$this->altura);
		$criteria->compare('enfermedades_previas',$this->enfermedades_previas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
