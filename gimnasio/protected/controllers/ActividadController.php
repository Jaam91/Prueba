<?php

class ActividadController extends Controller
{

	public $layout='//layouts/column2';


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
				'actions'=>array('index','view', 'ingresar', 'lista', 'habilitar', 'select'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'select', 'admin', 'delete'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'select'),
				'roles'=>array('Administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id, $numero)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),'numero'=>$numero,
		));
	}

	public function actionIngresar()
	{
		$this->render('ingresar');
	}


	public function actionLista(){   // Lista de actividades con estado eliminado
		$model=new Actividad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Actividad']))
			$model->attributes=$_GET['Actividad'];

		$this->render('habilitar',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{

		$model=new Actividad;
		$lista = Disciplina::model()->findAll(array('condition'=>'estado=:estado',
											'params'=>array(':estado'=>'habilitado')));
		$lista_d = Dependencia::model()->findAll(array('condition'=>'id_dependencia<>:id',
											'params'=>array(':id'=>'*Gimnasio Central')));


		if(isset($_POST['Actividad']))
		{
			$model->attributes=$_POST['Actividad'];
			$model->estado ="habilitado";
			if($model->save())
				$this->redirect(array('view','id'=>$model->nombre, 'numero'=>1));
		}

		$this->render('create',array(
			'model'=>$model, 'lista'=>$lista, 'lista_d'=>$lista_d
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$lista_d = Dependencia::model()->findAll();
		$lista = Disciplina::model()->findAll(array('condition'=>'estado=:estado',
											'params'=>array(':estado'=>'habilitado')));

		if(isset($_POST['Actividad']))
		{
			$model->attributes=$_POST['Actividad'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_actividad, 'numero'=>2));
		}

		$this->render('update',array(
			'model'=>$model, 'lista_d'=>$lista_d, 'lista'=>$lista
		));
	}


	public function actionDelete($id)
	{

		$aux = Actividad::model()->findByPk($id);
		// tenemos que hacer una funcion, que valide si la actividad se puede eliminar

		// codigo php para determinar si estamos en el ultimo dia del mes y a la hora del cierre del gimnasio
		if($fecha == true){
			$aux->estado ="eliminado";
			if($aux->save()){

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else{
			$resultado = AsignacionInstructor::model()->verificarEliminacionActividad($aux->nombre);

		}

		if($resultado == 1){
			$aux->estado ="eliminado";
			if($aux->save()){

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else{
			// alert();
		}
	}

	public function actionHabilitar($id_actividad)
	{

		$aux = Actividad::model()->findByPk($id_actividad);
		$aux->estado ="habilitado";

		if($aux->save()){

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('lista'));
		}
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Actividad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionAdmin()   // Lista de actividades con estado habilitado
	{
		$model=new Actividad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Actividad']))
			$model->attributes=$_GET['Actividad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function loadModel($id)
	{
		$model=Actividad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionSelect() // PETICION AJAX (ALAN)
	{
		$nombre = $_POST['Actividad']['nombre'];

		if($nombre->nombre == 'Musculación'){
			echo "hola";
			//
		}
		else{
			$instructores = Instructor::model()->findAll(/*array('condition'=>'tipo!=:tipo AND estado=:estado',
													'params'=>array(':tipo'=>'Personal Trainer', ':estado'=>'habilitado')));
													*/ );
		}
		$instructores = CHtml::listData($instructores,'rut_instructor', 'rut_instructor');	
		echo CHtml::tag('option', array('value'=>''), 'chipaelcp', true);
		foreach ($instructores as $valor => $description)
		{
			echo CHtml::tag('option', array('value'=>$valor),CHtml::encode($description),true);
		}	
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='actividad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
