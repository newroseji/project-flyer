@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')
@section('content')

    <div class="container col-md-10 col-md-offset-1">
        <h1>Create a portfolio</h1>



        <form action="/flyers" method="POST" enctype="multipart/form-data">

            {!! csrf_field()!!}


            <div class="row">
                <!-- Street Form Input -->
                <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }} col-md-4">
                    <label for="street">Street:</label> <span class="required">*</span>
                    <input type="text" name="street" id="street" placeholder="Street Address" class="form-control"
                           value="{{old('street')}}">
                    @if ($errors->has('street'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                    @endif
                </div>


                <!-- City Form Input -->
                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }} col-md-4">
                    <label for="city">City:</label> <span class="required">*</span>
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
                    <label for="country">Country:</label> <span class="required">*</span>
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
                    <label for="state">State:</label> <span class="required">*</span>

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
                    <label for="zip">Zip:</label> <span class="required">*</span>
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

                <!-- Price Form Input -->
                <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} col-md-4">
                    <label for="price">Price:</label> <span class="required">*</span>
                    <input type="price" name="price" id="price" placeholder="Price" class="form-control"
                           value="{{old('price')}}">
                    @if ($errors->has('price'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- Description Form Input -->
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} col-md-12">
                    <label for="description">Description:</label>

                    <textarea  name="description" placeholder="Put a brief description about the house here..." rows="15"
                           id="description" class="form-control" value="{{old('description')}}">
                        </textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <span class="col-md-12 caption pull-left">Asterisk(*) are required fields.</span>
            </div>
            <div class="row">
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Create a flyer</button>

                </div>

            </div>

        </form>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop