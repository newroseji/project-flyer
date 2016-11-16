@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')
@section('content')

    <div class="row margin-top-20">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">


                    <form action="/register" method="POST">

                        {!! csrf_field()!!}

                        <div class="row">
                            <!-- Firstname Form Input -->
                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }} col-md-4">
                                <label for="firstname">First Name:</label> <span class="required">*</span>
                                <input type="text" name="firstname" id="firstname" placeholder="First name"
                                       class="form-control"
                                       value="{{old('firstname')}}">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Middlename Form Input -->
                            <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}  col-md-4">
                                <label for="middlename">Middle Name:</label>
                                <input type="text" name="middlename" id="middlename" placeholder="Middle name"
                                       class="form-control"
                                       value="{{old('middlename')}}">
                                @if ($errors->has('middlename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Lastname Form Input -->
                            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}  col-md-4">
                                <label for="lastname">Last Name:</label> <span class="required">*</span>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name"
                                       class="form-control"
                                       value="{{old('lastname')}}">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <!-- Username Form Input -->
                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}  col-md-4">
                                <label for="username">Username:</label> <span class="required">*</span>
                                <input type="text" name="username" id="username" placeholder="Username"
                                       class="form-control"
                                       value="{{old('username')}}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Email Form Input -->
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}  col-md-4">
                                <label for="email">Email:</label> <span class="required">*</span>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" name="email" id="email" placeholder="Email address"
                                           class="form-control"
                                           value="{{old('email')}}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <!-- Address1 Form Input -->
                            <div class="form-group {{ $errors->has('address1') ? ' has-error' : '' }} col-md-4">
                                <label for="address1">Address1:</label>
                                <input type="text" name="address1" id="address1" placeholder="Street Address"
                                       class="form-control"
                                       value="{{old('address1')}}">
                                @if ($errors->has('address1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Address2 Form Input -->
                            <div class="form-group {{ $errors->has('address2') ? ' has-error' : '' }} col-md-4">
                                <label for="address2">Address2:</label>
                                <input type="text" name="address2" id="address2" placeholder="Apt/Suite"
                                       class="form-control"
                                       value="{{old('address2')}}">
                                @if ($errors->has('address2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- City Form Input -->
                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }} col-md-4">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" placeholder="City" class="form-control"
                                       value="{{old('city')}}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>
                        <div class="row">

                            <!-- Country Form Input -->
                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }} col-md-4">
                                <label for="country">Country:</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="">Choose Country</option>
                                    @foreach($countries::all() as $code=>$country)
                                        <option value="{{$code}}"
                                                @if($code=='US')
                                                selected="selected"
                                                @endif
                                        >{{$country}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- State Form Input -->
                            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }} col-md-4">
                                <label for="state">State:</label>

                                <select name="state"
                                        id="state"

                                        class="form-control">
                                    <option value="">Choose State</option>
                                    @foreach($states::all() as $code=>$state)
                                        <option value="{{$code}}">{{$state}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Zip/Postal code Form Input -->
                            <div class="form-group {{ $errors->has('zip') ? ' has-error' : '' }} col-md-4">
                                <label for="zip">Zip:</label>
                                <input type="text" name="zip" id="zip" placeholder="Zipcode" class="form-control"
                                       value="{{old('zip')}}">
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <!-- Password Form Input -->
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} col-md-4">
                                <label for="password">Password:</label> <span class="required">*</span>
                                <input type="password" name="password" id="password" placeholder="Password"
                                       class="form-control"
                                       value="{{old('password')}}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Confirm password Form Input -->
                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-4">
                                <label for="password_confirmation">Confirm password:</label> <span
                                        class="required">*</span>
                                <input type="password" name="password_confirmation" placeholder="Password confirmation"
                                       id="password_confirmation" class="form-control"
                                       value="{{old('password_confirmation')}}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <span class="col-md-12 caption text-center">Asterisk(*) are required fields.</span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary btn-wide"><i
                                            class="glyphicon glyphicon-user"></i> Register
                                </button>
                                &nbsp;
                                <a href="{{ URL::previous() }}" class="btn btn-link" title="Cancel">cancel</a>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop