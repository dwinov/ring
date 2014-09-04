<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var integer id of logged user
     */
    private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}

    public function authenticate() {
        $attribute='usr_username';
        $user = User::model()->find(array('condition' => $attribute . '=:loginname and usr_type_id = 4', 'params' => array(':loginname' => $this->username)));

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            // } else if (!$user->verifyPassword($this->password)) {
        } else if ($user->usr_password<>md5($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $user->regenerateValidationKey();
            $this->_id = $user->usr_id;
            $this->username = $user->usr_email;
            $this->setState('vkey', $user->usr_validation_key);
            $this->setState('usrid', $user->usr_id);
            //$this->setState('kegid', $user->keg_id);
            $this->setState('roleid', $user->usr_type_id);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    /**
     * Creates an authenticated user with no passwords for registration
     * process (checkout)
     * @param string $username
     * @return self
     */
    public static function createAuthenticatedIdentity($id, $username) {
        $identity = new self($username, '');
        $identity->_id = $id;
        $identity->errorCode = self::ERROR_NONE;
        return $identity;
    }

    /**
     *
     * @return integer id of the logged user, null if not set
     */
    public function getId() {
        return $this->_id;
    }
}