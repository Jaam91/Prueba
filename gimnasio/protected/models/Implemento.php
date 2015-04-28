<?php


class Implemento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'implemento';
	}


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dependencia', 'required'),
			array('id_dependencia', 'length', 'max'=>5),
			array('tipo, estado, estado_funcional', 'length', 'max'=>12),
			array('ano', 'length', 'max'=>4),
			array('grupo_muscular', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_implemento, id_dependencia, tipo, ano, grupo_muscular, estado, estado_funcional', 'safe', 'on'=>'search'),
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
			'administradors' => array(self::MANY_MANY, 'Administrador', 'gestiona_implemento(id_implemento, rut_administrador)'),
			'idDependencia' => array(self::BELONGS_TO, 'Dependencia', 'id_dependencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_implemento' => 'Id Implemento',
			'id_dependencia' => 'Dependencia',
			'tipo' => 'Tipo',
			'ano' => 'Año',
			'grupo_muscular' => 'Grupo Muscular',
			'estado_funcional'=> 'Estado Funcional',
			'estado' => 'Estado',
		);
	}


	public function search($id)
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id_implemento',$this->id_implemento);
		$criteria->compare('id_dependencia',$id);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('ano',$this->ano,true);
		$criteria->compare('grupo_muscular',$this->grupo_muscular,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchImplemento($estado)
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id_implemento',$this->id_implemento);
		$criteria->compare('id_dependencia',$this->id_dependencia);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('ano',$this->ano,true);
		$criteria->compare('grupo_muscular',$this->grupo_muscular,true);
		$criteria->compare('estado_funcional',$this->estado_funcional,true);
		$criteria->compare('estado',$estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
