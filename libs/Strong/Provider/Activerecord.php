<?php
/**
 * Strong Authentication Library
 *
 * User authentication and authorization library
 *
 * @license     MIT Licence
 * @category    Libraries
 * @author      Andrew Smith
 * @link        http://www.silentworks.co.uk
 * @copyright   Copyright (c) 2012, Andrew Smith.
 * @version     1.0.0
 */
class Strong_Provider_Activerecord extends Strong_Provider
{
    /**
     * User login check based on provider
     * 
     * @return boolean
     */
    public function loggedIn() {
        return (isset($_SESSION['auth_user']) && !empty($_SESSION['auth_user']));
    }

    /**
     * To authenticate user based on username or email
     * and password
     * 
     * @param string $usernameOrEmail 
     * @param string $password 
     * @return boolean
     */
    public function login($usernameOrEmail, $password) {
        if(!is_object($usernameOrEmail)) {
            $user = Usuario::find_by_usuario_or_email($usernameOrEmail, $usernameOrEmail);
        }
		if(is_object($user)){
	        if(($user->email === $usernameOrEmail || $user->usuario === $usernameOrEmail) && $user->senha === md5($password)) {
	            return $this->completeLogin($user);
	        }
		}

        return false;
    }

    /**
     * Login and store user details in Session
     * 
     * @param array $user 
     * @return boolean
     */
    protected function completeLogin($user) {
        $users = Usuario::find($user->id);
        // $users->logins = $user->logins + 1;
        // $users->last_login = time();
        //$users->save();

        $userInfo = array(
            'id' => $user->id,
            'usuario' => $user->usuario,
            'email' => $user->email,
            'nome' => $user->nome,
            'logged_in' => true
        );

        return parent::completeLogin($userInfo);
    }
}
