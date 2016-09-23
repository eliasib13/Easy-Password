@extends('layout')

@section('content')
    <div class="main-content">
        <h1>Easy Password</h1>
        <h3>My Password Registers</h3>
        <a href="{{ url('doLogout') }}"><i class="icon sign out"></i>Logout</a>
        <div class="ui segment">
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
@endsection