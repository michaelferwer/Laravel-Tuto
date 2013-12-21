<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrateur
 * Date: 24/11/13
 * Time: 12:06
 * To change this template use File | Settings | File Templates.
 */

namespace com\perso\Authentication;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

class User extends Eloquent implements UserInterface, RemindableInterface{

    public $table = 'user';

    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
}
