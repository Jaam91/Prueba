<?php

class ImplementoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'opcionesModulo'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('crearImplemento','update'),
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

	public function actionCrearImplemento()
	{
		$cont=0;
		$model=new Implemento;
		$historial=new GestionaImplemento;
		$grupoMuscular=GrupoMuscular::model()->findAll();

		//$grupoMuscular[$cont]->nombre = 'Z';
		$lista=Dependencia::model()->findAll(array('condition'=>'id_dependencia<>:id',
											       'params'=>array(':id'=>'*Gimnasio Central')));

		$disciplinas=Disciplina::model()->findAll(array('condition'=>'nombre !=:nombre',
														'params'=>array(':nombre'=>'Pagar Gimnasio')));

		
		
		if(isset($_POST['Implemento']))
		{
			$model->attributes=$_POST['Implemento'];
			
			if($model->save())
			{
				$historial->id_implemento = $model->id_implemento;
				$historial->rut_administrador = Yii::app()->user->name;
				$historial->fecha = date('Y-m-d');
				$historial->hora = new CDbExpression('NOW()');
				$historial->accion= 'Ingresar';
				$valor = 0;

				if($historial->save())
				$this->redirect(array('view','id'=>$model->id_implemento, 'valor'=>$valor));
			}	
		}

		$this->render('crearImplemento',array(
			'model'=>$model,
			'lista'=>$lista,
			'disciplinas'=>$disciplinas,
			'grupoMuscular'=>$grupoMuscular,
		));
	}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$historial=new GestionaImplemento;
		$lista=Dependencia::model()->findAll(array('condition'=>'id_dependencia<>:id',
											       'params'=>array(':id'=>'*Gimnasio Central')));

		$disciplinas=Disciplina::model()->findAll(array('condition'=>'nombre !=:nombre',
														'params'=>array(':nombre'=>'Pagar Gimnasio')));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Implemento']))
		{
			$model->attributes=$_POST['Implemento'];
			if($model->save())
			{
				$historial->id_implemento = $model->id_implemento;
				$historial->rut_administrador = Yii::app()->user->name;
				$historial->fecha = date('Y-m-d');
				$historial->hora = new CDbExpression('NOW()');
				$historial->accion= 'Modificar';
				$valor = 1;

				if($historial->save())
				$this->redirect(array('view','id'=>$model->id_implemento, 'valor'=>$valor));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
			'lista'=>$lista,
			'disciplinas'=>$disciplinas,
		));
	}

	
	public function actionDelete($id)
	{
		$historial=new GestionaImplemento;
		$implemento=$this->loadModel($id);
		$implemento->estado='eliminado';
		
		
		$historial->id_implemento = $id;
		$historial->rut_administrador = Yii::app()->user->name;
		$historial->fecha = date('Y-m-d');
		$historial->hora = new CDbExpression('NOW()');
		$historial->accion= 'Eliminar';

		//if($historial->save())
		//$this->loadModel($id)->delete();


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if($implemento->save() AND $historial->save())
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Implemento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Implemento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Implemento']))
			$model->attributes=$_GET['Implemento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Implemento the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Implemento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Implemento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='implemento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
