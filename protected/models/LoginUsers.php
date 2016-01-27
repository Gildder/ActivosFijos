<?php 

class LoginUsers extends CActiveRecord {
	public static $login;

	public function getDbConnection(){
		if (self::$login!=null) {
			return self::$login;
		} else {
			self::$login = Yii::app()->login;
			if (self::$login instanceof CDbConection) {
				self::$login->setActive(true);
				return self::$login;
			} else {
				throw new CDbException(Yii::t('yii','Active Record requires a "login" CDbConnection application component.'));
				
			}
			
		}
		
	}
}

?>