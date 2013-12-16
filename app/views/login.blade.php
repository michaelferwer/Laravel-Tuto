@extends('layouts.template_master')

@section('content')
<div class="login-form">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#login" data-toggle="tab">Login</a>
        </li>
        <li>
            <a href="#register" data-toggle="tab">Register</a>
        </li>
        <li>
            <a href="#reset-password" data-toggle="tab">Reset Password</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="login">
            <form action="authentication" method="post">
                <div class="input-group input-form">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="input-group input-form">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-form">Sign In</button>
            </form>
        </div>
        <div class="tab-pane fade" id="register"></div>
        <div class="tab-pane fade" id="reset-password"></div>
    </div>
</div>
@stop