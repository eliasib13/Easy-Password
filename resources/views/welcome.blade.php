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
            @if($errorLogin)
                <div class="ui error message">
                    <div class="header">
                        Login error
                    </div>
                    <p>
                        Check your credentials and try again.
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
        