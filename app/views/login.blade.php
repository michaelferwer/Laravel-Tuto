@extends('layouts.template_master')

@section('content')

<script type="text/javascript">
    $(document).ready(function(){

        // à factoriser
        $('#login-form').validate({
            rules: {
                email: {
                    minlength: 3,
                    required: true,
                    email:true
                },
                password: {
                    minlength: 3,
                    maxlength: 15,
                    required: true
                }
            },
            messages: {
                email: {
                    required: "email requis",
                    email: "email n'est pas correct"
                },
                password: {
                    required: "password requis"
                }
            },
            highlight: function(element) {
                $(element).closest('.input-form').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.input-form').removeClass('has-error');
            },
            errorElement: 'div',
            errorClass: 'control-label label-error',
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler: function(form) {
                form.submit();
                //$(form).ajaxSubmit();
            },
            invalidHandler: function(event, validator) {
                // Some traitement here
            }
        });
    });

</script>
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

            @if ( isset($error) )
                <div id="alert-danger-login" class="alert alert-danger">
                    {{$error }}
                </div>
            @endif

            <form id="login-form" action="authentication" method="post">

                <div class="input-group input-form">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input name="email" type="text" class="form-control" placeholder="Email">
                </div>

                <div class="input-group input-form">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>

                @if (isset($action))
                    <input name="action" value="{{ $action }}" type="text" style="display:none;">
                @endif

                <button type="submit" class="btn btn-primary btn-lg btn-block btn-form">Sign In</button>
            </form>
        </div>
        <div class="tab-pane fade" id="register"></div>
        <div class="tab-pane fade" id="reset-password"></div>
    </div>
</div>
@stop