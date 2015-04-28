<?php

class AuxiliarPagoForm extends CFormModel
{
	public $nombre_disciplina;

	public function rules()
	{

		return array(
				array("nombre_disciplina",'required'),
			);
	}
}?>