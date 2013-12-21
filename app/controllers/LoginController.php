<?php

class LoginController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {
        //$model = User::where('id', '=', 2)->first(); //OrFail
        //return View::make('login')->with('user', $model);
        return View::make('login');
    }

    public function authentication()
    {
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if(Auth::attempt($user))
            return View::make('login');
        else
            //return Redirect::to('/');
            //return Redirect::action('UserController@profile', array('user' => 1));
            return Redirect::action('LoginController@index');


    }
}