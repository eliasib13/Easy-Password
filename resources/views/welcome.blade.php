@extends('layout')

@section('content')
    <div class="main-content">
        <h1>Easy Password</h1>
        <div class="ui segment">
            <form method="post" class="ui form" action="{{ url('/doLogin') }}">
                {{ csrf_field() }}
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@email.com" value="{{ $email }}"/>
                </div>
                <div class="field">
                    <label>Master password</label>
                    <input type="password" name="password" placeholder="········" />
                </div>
                <button class="ui button" type="submit">Log in</button>
            </form>
            <div class="ui divider"></div>
            <button class="ui button blue left floated" id="new-user-button">Register</button>
            @if($errorLogin)
                <div class="ui error message wrong-credentials">
                    <div class="header">
                        Login error
                    </div>
                    <p>
                        Check your credentials and try again.
                    </p>
                </div>
            @endif
            @if($errorRegister)
                <div class="ui error message">
                    <div class="header">
                        Register error
                    </div>
                    <p>
                        Try again.
                    </p>
                </div>
            @endif
            @if($successRegister)
                <div class="ui success message">
                    <div class="header">
                        Register done!
                    </div>
                    <p>
                        Try your credentials to log in.
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="ui modal new-user small">
        <i class="close icon"></i>
        <div class="header">
            Register now!
        </div>
        <div class="content">
            <form class="ui form" id="new-user-form" method="post" action="{{ url('/addUser') }}">
                {{ csrf_field() }}
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="My name" required/>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="email@email.com" required/>
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="new-password" class="check-password" placeholder="My password" required/>
                </div>
                <div class="field">
                    <label>Type password again</label>
                    <input type="password" name="new-password-check" class="check-password" placeholder="My password" required/>
                </div>
                <div class="ui error message passwords-match-error hidden">
                    <div class="header">
                        Passwords does not match
                    </div>
                    Check both password fields.
                </div>
                <button class="ui button new-user-add" type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
        