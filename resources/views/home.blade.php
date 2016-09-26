@extends('layout')

@section('content')
    <div class="main-content">
        <h1>Easy Password</h1>
        <h3>My Password Registers</h3>
        <a href="{{ url('doLogout') }}"><i class="icon sign out"></i>Logout</a>
        <div class="ui segment">
            <button class="ui button green inverted" onclick="$('.ui.modal.new-password').modal('show');"><i class="icon plus"></i>Add password</button>
            <div class="ui divider"></div>
            <div class="ui accordion limit-registers-height">
                @foreach($passwordRegisters as $register)
                    <div class="title">
                        <i class="dropdown icon"></i>
                        <b id="title-{{ $register->id }}">{{ $register->name }}</b>
                    </div>
                    <div class="content">
                        <div class="ui labeled input">
                            <div class="ui label">
                                Name:
                            </div>
                            <input type="text" id="name-{{ $register->id }}" value="{{ $register->name }}" />
                        </div>
                        <br/>
                        <div class="ui labeled input">
                            <div class="ui label">
                                Password:
                            </div>
                            <input type="text" id="value-{{ $register->id }}" value="{{ decrypt($register->password) }}" />
                        </div>
                        <button class="ui toggle button update-register" item-id="{{ $register->id }}"><i class="icon pencil"></i>Update</button>
                        <button class="ui red button" item-id="{{ $register->id }}"><i class="icon remove"></i>Remove</button>
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

    <div class="ui basic modal updated-register">
        <div class="header">
            Updated!
        </div>
        <div class="image content">
            <div class="image">
                <i class="icon checkmark"></i>
            </div>
        </div>
    </div>
@endsection