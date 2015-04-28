<?php

class UsuarioController extends Controller
{

	public $layout='//layouts/column2';


	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view' ,'ingresar'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('crearCliente', 'crearPersonal','update'),
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


	public function actionView($id, $tipo)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id), 'tipo'=>$tipo,
		));
	}

	public function actionIngresar()
	{
		$this->render('ingresar');
	}

	public function actionCrearPersonal()
	{
		$model=new Usuario;
		$admin = new Administrador;
		$Instructor = new Instructor;
		$lista= Authitem::model()->findAll(array('condition'=>'name=:name OR name=:name2',
											'params'=>array(':name'=>'Administrador', ':name2'=>'Instructor')));

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->estado = "habilitado";
			if($model->save()){

				//Si el rol escogido es Administrador, se asigna rol Administrador al usuario.
				if($model->rol == 'Administrador'){

					Yii::app()->authManager->assign("Administrador", $model->rut_usuario);
					$admin->attributes=$_POST['Administrador'];
					$admin->rut_usuario = $model->rut_usuario;

					if($admin->save())
						$this->redirect(array('view','id'=>$model->rut_usuario, 'tipo'=>1));
				}
				else{
					Yii::app()->authManager->assign("Instructor", $model->rut_usuario);
					$instructor->attributes=$_POST['Administrador'];      // *******************************
					$instructor->rut_usuario = $model->rut_usuario;

					if($instructor->save())
						$this->redirect(array('view','id'=>$model->rut_usuario, 'tipo'=>1));
				}
			}
		}

		$this->render('crearPersonal',array(
			'model'=>$model,
			'lista'=>$lista,
			'admin'=>$admin,
		));
	}

	public function actionCrearCliente()
	{
		$model=new Usuario;
		$cliente =new Cliente;

		if(isset($_POST['Cliente']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->rol='Cliente';
			$model->estado= "habilitado";
			$cliente->attributes=$_POST['Cliente'];

			if($model->save())
			{
				//Rol Cliente
				Yii::app()->authManager->assign("Cliente", $model->rut_usuario);
				$cliente->rut_usuario=$model->rut_usuario;
				if($cliente->save())
				{
					$this->redirect(array('view','id'=>$model->rut_usuario, 'tipo'=>2));
				}
			}
		}

		$this->render('crearCliente',array(
			'model'=>$model,
			'cliente'=>$cliente,
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rut_usuario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionIndex()
	{

		//Creo los roles: Administrador, Instructor y Cliente.
		#Yii::app()->authManager->createRole("Administrador");
		#Yii::app()->authManager->createRole("Instructor");
		#Yii::app()->authManager->createRole("Cliente");

		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}



	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
