@extends('app')
@section('content')

    <div class="container loginBox">
        <h1>Login</h1>




        <form method="POST" action="/login">
            {!! csrf_field() !!}
                    <!-- Email Form Input -->
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <!-- Password Form Input -->
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Sign In
                </button>
            </div>
        </form>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop

