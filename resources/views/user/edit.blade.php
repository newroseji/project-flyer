@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('debug.app')
@section('content')

    <div class="container col-md-10 col-md-offset-1">
        <h1>Update</h1>


        <form action="/user/update" method="POST">

            {!! csrf_field()!!}

            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="row">
                <!-- Firstname Form Input -->
                <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }} col-md-4">
                    <label for="firstname">First Name:</label> <span class="required">*</span>
                    <input type="text" name="firstname" id="firstname" placeholder="First name" class="form-control"
                           value="{{$user->firstname}}">
                    @if ($errors->has('firstname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>

                <!-- Middlename Form Input -->
                <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}  col-md-4">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" placeholder="Middle name" class="form-control"
                           value="{{$user->middlename}}">
                    @if ($errors->has('middlename'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                    @endif
                </div>

                <!-- Lastname Form Input -->
                <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}  col-md-4">
                    <label for="lastname">Last Name:</label> <span class="required">*</span>
                    <input type="text" name="lastname" id="lastname" placeholder="Last name" class="form-control"
                           value="{{$user->lastname}}">
                    @if ($errors->has('lastname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- Username Form Input -->
                <div class="form-group col-md-4">
                    <label for="username">Username:</label> <span class="required">*</span>
                    <span class="form-control">{{$user->username}}</span>
                </div>

                <!-- Email Form Input -->
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}  col-md-4">
                    <label for="email">Email:</label> <span class="required">*</span>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" name="email" id="email" placeholder="Email address" class="form-control"
                               value="{{$user->email}}">
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
                    <input type="text" name="address1" id="address1" placeholder="Street Address" class="form-control"
                           value="{{$user->address1}}">
                    @if ($errors->has('address1'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                    @endif
                </div>

                <!-- Address2 Form Input -->
                <div class="form-group {{ $errors->has('address2') ? ' has-error' : '' }} col-md-4">
                    <label for="address2">Address2:</label>
                    <input type="text" name="address2" id="address2" placeholder="Apt/Suite" class="form-control"
                           value="{{$user->address2}}">
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
                           value="{{$user->city}}">
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
                                    @if($code==$user->country)
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
                            <option
                                    @if ($code==$user->state)
                                            selected="selected"
                                    @endif
                                    value="{{$code}}">{{$state}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('state'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                    @endif
                </div>
                <!-- Zip/Postal code Form Input -->
                <div class="form-group {{ $errors->has('zip') ? ' has-error' : '' }} col-md-4">
                    <label for="zip">Zip:</label>
                    <input type="text" name="zip" id="zip" placeholder="Zipcode" class="form-control"
                           value="{{$user->zip}}">
                    @if ($errors->has('zip'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="row">
                <span class="col-md-12 caption text-center">Asterisk(*) are required fields.</span>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary btn-wide"><i class="glyphicon glyphicon-save"></i> Update</button>&nbsp;
                    <a href="{{ URL::previous() }}" class="text-danger" title="Cancel">cancel</a>
                </div>

            </div>

        </form>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop