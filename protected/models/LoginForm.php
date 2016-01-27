<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $usuario;
	public $contrasenia;
	public $rememberMe;

	
	public $correo;
	public $habilitado;

	 

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('usuario, contrasenia', 
				  'required',
				  'message'=>'Campos requeridos'
			),

			//Filtrar datos de los campos
			array('usuario',
					'match',
					'pattern'=>'/^[a-z0-9,àèìòùñ\_]+$/i',
					'message'=>'solo letras, números y guiones bajos',
				),
			array('contrasenia','match',
					'pattern'=>'/^[a-z0-9]+$/i',
					'message'=>'solo letras y numeros',
				),

			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('contrasenia', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Recordar session',
			'usuario'=> 'Usuario',
			'contrasenia'=> 'Contraseña',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */

	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->usuario, $this->contrasenia);
			if(!$this->_identity->authenticate())
				$this->addError('contrasenia','Usuario o contraseña son incorrectos.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->usuario, $this->contrasenia);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode === UserIdentity::ERROR_NONE) //ERROR_NONE = todo salio bien
		{
			$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		}
		else
			return false;
	}
}
