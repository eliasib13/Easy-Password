@extends('layout')

@section('content')
    <div class="main-content">
        <h1>Easy Password</h1>
        <h3>My Password Registers</h3>
        <a href="{{ url('doLogout') }}"><i class="icon sign out"></i>Logout</a>
        <div class="ui segment">
            <button class="ui button green inverted" onclick="$('.ui.modal.new-password').modal('show');"><i class="icon plus"></i>Add password</button>
            <div class="ui divider"></div>
            <div class="ui accordion">
                @foreach($passwordRegisters as $register)
                    <div class="title">
                        <i class="dropdown icon"></i>
                        <b>{{ $register->name }}</b>
                    </div>
                    <div class="content">
                        <div class="ui input">
                            <input type="text" disabled value="{{ decrypt($register->password) }}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="ui modal new-password small">
        <i class="close icon"></i>
        <div class="header">
            Add Password
        </div>
        <div class="content">
            <form class="ui form" method="post" action="{{ url('/addPassword') }}">
                {{ csrf_field() }}
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="My service" />
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="text" name="password" placeholder="My password" />
                </div>
                <button class="ui button" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection