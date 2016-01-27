<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */


class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and contrasenia
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		//verificando en la base de datos el usuario por nombre
		$user = Usuario::model()->find("LOWER(usuario)=?",array(strtolower($this->username)));

		if ($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif (md5($this->password)!= $user->contrasenia) {		//algoritmo de encryptacion MD5
		//}elseif (!$user->validatePassword(($this->password))) {		//algoritmo de encryptacion MD5
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $user->id;

			// setState almacena valores en la sesion y se accede a estos valores a traves de 
			// echo Yii::app()->user->getState('nombre'); .
			// echo Yii::app()->user->id // id del usuario logoeado;
			$this->setState('usuario',$user->usuario);
			$this->setState('email',$user->email);
			$this->setState('avatar',$user->avatar);

			$rol = $user->getRole($user->id);
			$this->setState('role',$rol);

			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;

	}


	public function getId()
	{
		return $this->_id;
	}
}