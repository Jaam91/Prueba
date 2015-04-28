<?php


class UserIdentity extends CUserIdentity
{

	private $_id;

	public function authenticate()
	{

		$usuario=Usuario::model()->findAll(array('condition'=>'estado=:estado', 
											'params'=>array(':estado'=>'habilitado')));
		$aux= 0;

		foreach($usuario as $usu){

			if($this->username === $usu->rut_usuario){
				$aux = 1;
				if($this->password!==$usu->contrasena)
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				else
				{
					$this->_id=$usu->rut_usuario;
					$this->errorCode=self::ERROR_NONE;
				}
				return !$this->errorCode;
			break;
			}
		}

		if($aux===0){

			$this->errorCode=self::ERROR_USERNAME_INVALID;
			return !$this->errorCode;
		}			

	}
}