<?php

class DependenciaController extends Controller
{

	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'opcionesModulo'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('crearDependencia','update', 'admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('Administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionOpcionesModulo()
	{
		$this->render('opcionesModulo');
	}

	public function actionView($id, $valor)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'valor'=>$valor,
		));
	}


	public function actionCrearDependencia()
	{
		$model=new Dependencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dependencia']))
		{
			$model->attributes=$_POST['Dependencia'];
			$model->estado = 'habilitado';

			$historial = new GestionaDependencia;			

			if($model->save())
			{
				//Llenando el historial Gestionar Dependencia - Ingresar
				$historial->id_dependencia = $model->id_dependencia;
				$historial->rut_administrador = Yii::app()->user->name;
				$historial->fecha = date('Y-m-d');
				$historial->hora = new CDbExpression('NOW()');
				$historial->accion= 'Ingresar';
				$valor = 0;
				if($historial->save())
					$this->redirect(array('view','id'=>$model->id_dependencia, 'valor'=>$valor));
			}
		}

		$this->render('crearDependencia',array(
			'model'=>$model,
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$historial=new GestionaDependencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dependencia']))
		{
			$model->attributes=$_POST['Dependencia'];
			$valor=1;
			if($model->save())
			{
				$historial->id_dependencia = $model->id_dependencia;
				$historial->rut_administrador = Yii::app()->user->name;
				$historial->fecha = date('Y-m-d');
				$historial->hora = new CDbExpression('NOW()');
				$historial->accion= 'Modificar';

				if($historial->save())
				$this->redirect(array('view','id'=>$model->id_dependencia, 'valor'=>$valor));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$modelAct=Actividad::model();
		$modelImp=Implemento::model();

		$resultado = Actividad::model()->findAll(array('condition'=>'id_dependencia=:id AND estado=:estado',
														'params'=>array(':id'=>$id, ':estado'=>'habilitado')));

		$implementos = Implemento::model()->findAll(array('condition'=>'id_dependencia=:id AND estado=:estado', 
														  'params'=>array(':id'=>$id, ':estado'=>'habilitado')));

		$cantidad = 0;
		foreach ($resultado as $rest) {
			if($rest->cantidad_clientes != 0){
				$cantidad ++;
				break; 
			}
		}
		if(($resultado != NULL AND $cantidad != 0 ) OR $implementos != NULL){
			$this->render('error', array('id'=>$id, 'resultado'=>$resultado, 'modelAct'=>$modelAct,
						  'implementos'=>$implementos, 'modelImp'=>$modelImp, 'cantidad'=>$cantidad));
		}
		else{
				$registro = Dependencia::model()->findByPk($id);		
				$registro->estado = 'eliminado';
				$historial = new GestionaDependencia;



				if($registro->save())
				{
					//Llenando el historial Gestionar Dependencia - Eliminar
					$historial->id_dependencia = $registro->id_dependencia;
					$historial->rut_administrador = Yii::app()->user->name;
					$historial->fecha = date('Y-m-d');
					$historial->hora = new CDbExpression('NOW()');
					$historial->accion= 'Eliminar';

					if($historial->save())
					$this->render('eliminacion', array('id'=>$id));
				}
			
			/*if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
		}

	}


	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Dependencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dependencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dependencia']))
			$model->attributes=$_GET['Dependencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Dependencia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dependencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dependencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
