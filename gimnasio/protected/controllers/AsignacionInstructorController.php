<?php

class AsignacionInstructorController extends Controller
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
				'actions'=>array('index','view', 'lista'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','lista', 'hola'),
				'roles'=>array('Administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new AsignacionInstructor;
		$cliente = new Usuario;
		#$usuario = Usuario::model()->getListaUsuarios('Cliente');
		$tipo = Disciplina::model()->findAll();
		


		if (isset($_POST['ApproveButton'])){

        	if (isset($_POST['selectedIds'])){
        		
 				$cliente->attributes= $_POST['selectedIds'];
 				echo $cliente->primer_nombre;
       		 }
       		else{

    			$this->render('experimento',array(
					'model'=>$model, 'cliente'=>$cliente, 'tipo'=>$tipo,
				));
    		}
    	}
    	else{
    		$this->render('experimento',array(
				'model'=>$model, 'cliente'=>$cliente, 'tipo'=>$tipo,
			));
    	}


	}

	public function actionLista($rut, $disciplina)
	{
		$model=new Usuario;
		echo $rut;

		if(isset($_POST['AsignacionInstructor']))
		{
			$model->attributes=$_POST['AsignacionInstructor'];			
			#$this->redirect(array('Lista', 'rut'=>$model->rut_usuario));
		}

		if($disciplina == "Musculación"){
			$p_trainer = Usuario::model()->getListaInstructor("Personal Trainer");

			$this->render('asigna',array(
				'model'=>$model, 'p_trainer'=>$p_trainer,
		));			
		}
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AsignacionInstructor']))
		{
			$model->attributes=$_POST['AsignacionInstructor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_asignacion));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AsignacionInstructor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AsignacionInstructor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AsignacionInstructor']))
			$model->attributes=$_GET['AsignacionInstructor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AsignacionInstructor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AsignacionInstructor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AsignacionInstructor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asignacion-instructor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
