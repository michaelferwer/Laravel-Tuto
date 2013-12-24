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

    // GET action
    public function index()
    {
        return View::make('login')
            ->with('error',Input::get('error'))
            ->with('action',Input::get('action'));
    }

    // POST action
    public function authentication()
    {
        $error = "Username or password are wrong";
        $action = Input::get('action');

        $validator = Validator::make(Input::all(), [
            "email" => "required|email|min:3",
            "password" => "required|min:3"
        ]);

        if ($validator->passes())
        {
            $credentials = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            // Essaye d'authentification l'utilisateur
            if (Auth::attempt($credentials))
            {
                // Si une action est définie, rediriger l'utilisateur vers cette action
                if($action != null)
                    return Redirect::action($action);

                return Redirect::action('HomeController@index');
            }
            else{
                // Dans le cas où l'authentification échoue et une action est définie
                if($action != null)
                    return Redirect::action('LoginController@index', array('error' => $error, 'action' => $action));
            }
        }
        // Dans tous les autres cas
        return Redirect::action('LoginController@index', array('error' => $error));
    }
}