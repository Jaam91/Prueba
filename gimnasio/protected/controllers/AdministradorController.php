<?php

class AdministradorController extends Controller
{

	public $layout='//layouts/column2';


	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			 // we only allow deletion via POST request
		);
	}


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','view2','view3','asistencia','registrar', 'invitado'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'pago', 'registrarPago', 'view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','lista', 'habilitar'),
				'roles'=>array('Administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionView($nombre, $nombre_d)  // Vista para el Pago de un Cliente
	{
		$this->render('view',array('nombre'=>$nombre, 'nombre_d'=>$nombre_d));
	}

	public function actionView2($nombre, $id_dependencia) // Vista para el registro asistencia de CLiente
	{
		$this->render('asistencia',array('nombre'=>$nombre, 'id_dependencia'=>$id_dependencia,'num'=>1));
	}

	public function actionView3()  // Vista para el registro asistencia de Cliente NO Inscrito
	{
		$this->render('asistencia',array('num'=>2));
	}

	public function actionAsistencia()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('lista',array(
			'model'=>$model,
		));
	}

	public function actionInvitado()
	{
		$model=new Usuario;

		if(isset($_POST["Usuario"]))
		{

			$model->attributes=$_POST["Usuario"];

			// Llenando la tabla Gestiona Asistencia "Historial de Asistencias"
			$registro = new GestionaAsistencia;
			$registro->rut_cliente = NULL;
			$registro->id_dependencia = "*Gimnasio Central";
			$registro->fecha = date('Y-m-d');
			$registro->hora_ingreso = date('H:i:s');

			if($registro->save()){
				$this->redirect(array('view3'));
			}
		}

		$this->render('_formCliente', array('model'=>$model));
	}

	public function actionRegistrar($id)  // Registrar Asistencia
	{
		$model = new Dependencia; // Se ocupa para retornar el id_dependencia del Formulario
		$nombre = Usuario::model()->NombreCompleto($id); // Nombre completo del cliente

		if(isset($_POST["Dependencia"]))
		{
			$model->attributes=$_POST["Dependencia"];

			// Llenando la tabla Gestiona Asistencia "Historial de Asistencias"
			$registro = new GestionaAsistencia;
			$registro->rut_cliente = $id;

			if($model->id_dependencia != '*Gimnasio Central')
				$registro->id_dependencia = $model->id_dependencia;
			else
				$registro->id_dependencia = '*Gimnasio Central';

			$registro->fecha = date('Y-m-d');
			$registro->hora_ingreso = date('H:i:s');

			if($registro->save()){
				$this->redirect(array('view2','nombre'=>$nombre[0]->primer_nombre, 'id_dependencia'=>$model->id_dependencia));
			}
		}

		$lista = Dependencia::model()->findAll(); // Listado de Dependencias		
		$actividad = AsignacionInstructor::model()->listaActividades($id); // Actividades inscritas por el cliente

		$this->render('opcion', array('model'=>$model,'lista'=>$lista, 'rut'=>$id, 'actividad'=>$actividad, 'nombre'=>$nombre));

	}

	public function actionPago()  // Registrar Pago
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('lista2',array(
			'model'=>$model,
		));
	}


	public function actionRegistrarPago($rut_cliente){

		$resultado = AsignacionInstructor::model()->findAll(array('condition'=>'estado=:estado AND rut_cliente=:rut',
															'params'=>array(':estado'=>'habilitado',':rut'=>$rut_cliente)));

		$model = new Disciplina;
		$nombre = Usuario::model()->NombreCompleto($rut_cliente);

		if(isset($_POST["Disciplina"]))
		{
			$model->attributes = $_POST["Disciplina"];
			
			$monto = Disciplina::model()->findByPk($model->nombre);

			$registro = new GestionaPago;
			$registro->rut_cliente = $rut_cliente;
			$registro->nombre_disciplina = $model->nombre;
			$registro->fecha = date('Y-m-d');
			$registro->hora = date('H:i:s');
			$registro->monto = $monto->valor_mensualidad;

			if($registro->save())
			{
				$this->redirect(array('view', 'nombre'=>$nombre[0]->primer_nombre, 'nombre_d'=>$model->nombre));

			}	
		}


		// Saber que disciplinas debe pagar el cliente. //ESTO DEBE ESTAR EN UNA FUNCION
		if($resultado == null){
			$lista = array();
			$lista[0]= new AuxiliarPagoForm;
			$lista[0]->nombre_disciplina = 'Pagar Gimnasio';
		}
		else{
			$lista = array();
			$cont=0;
			$aux = 0;
			$aux2=0;
			
			foreach($resultado as $r){
				
				if($r->nombre_actividad == NULL){
					$lista[$cont]= new AuxiliarPagoForm;
					$lista[$cont]->nombre_disciplina = 'Musculación';
					$cont++;
					$aux = 1;
				}
				else{
					if($aux2==0){
						$lista[$cont]= new AuxiliarPagoForm;
						$lista[$cont]->nombre_disciplina = 'Fitness';
						$cont++;
						$aux2=1;
					}
				}
				if($aux == 1 and $aux2 == 1){
					$cont--;
					break;
				}
			}
		}
		////////////////////////////////////////////////////////

		$this->render('_formPago', array('model'=>$model, 'nombre'=>$nombre[0]->primer_nombre, 'lista'=>$lista));	
							

	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Administrador');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()  // Lista de usuarios del Personal con estado "habilitado"   TABLA USUARIO
	{
		$model=new Usuario('search');
		$usuario = Yii::app()->user->name;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model, 'usuario'=>$usuario,
		));
	}

	public function actionLista()   // Lista de usuarios del Personal con estado "eliminado"  TABLA USUARIO
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('habilitar',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Administrador']))
		{
			$model->attributes=$_POST['Administrador'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rut_usuario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionDelete($id)
	{
		$usuario = Usuario::model()->findByPk($id);
		$usuario->estado = "eliminado";

		if($usuario->save()){

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

		}

	}

	public function actionHabilitar($rut)
	{
		$usuario = Usuario::model()->findByPk($rut);
		$usuario->estado = "habilitado";

		if($usuario->save()){

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('lista'));
		}
	}

	public function loadModel($id)
	{
		$model=Administrador::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='administrador-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
