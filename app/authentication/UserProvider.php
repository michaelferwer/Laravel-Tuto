<?php namespace com\perso\Authentication;
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/12/13
 * Time: 11:50
 */

require_once  app_path().'/models/User.php';

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class UserProvider implements  UserProviderInterface {


    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($identifier)
    {
        return User::where('email', '=', $identifier)->first();
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $user = User::whereRaw('email = ? and password = ?', array($credentials['email'], $credentials['password']))->first(); //OrFail

        if($user == null)
            return null;

        return $user;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        return $user->email == $credentials['email'] && $user->password == $credentials['password'];
    }
}