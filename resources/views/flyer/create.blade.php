@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('layouts.layout')
@section('page-title','Create a new flyer')
@section('content')

    <div class="row margin-top-20">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Flyer</div>
                <div class="panel-body">


        <form action="/flyers" method="POST">

            {!! csrf_field()!!}

            <div class="col-md-6">
                <!-- Street Form Input -->
                <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
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
                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }} ">
                    <label for="city">City:</label> <span class="required">*</span>
                    <input type="text" name="city" id="city" placeholder="City" class="form-control"
                           value="{{old('city')}}">
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Country Form Input -->
                <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
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
                <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                    <label for="state">State:</label> <span class="required">*</span>

                    <select name="state"
                            id="state"

                            class="form-control">
                        <option value="">Choose State</option>
                        @foreach($states::all() as $code=>$state)
                            <option value="{{$code}}">{{$state}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Zip/Postal code Form Input -->
                <div class="form-group {{ $errors->has('zip') ? ' has-error' : '' }}">
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
            <div class="col-md-6">

                <!-- Price Form Input -->
                <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">

                    <label for="price">Price:</label> <span class="required">*</span>

                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" name="price" id="price" placeholder="Price" class="form-control"
                               value="{{old('price')}}" aria-label="Amount (to the nearest dollar)">
                    </div>

                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Description Form Input -->
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} ">
                    <label for="description">Description:</label>

                    <textarea name="description" placeholder="Put a brief description about the house here..." rows="11"
                              id="description" class="form-control" >{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12 text-center text-muted">
                <span class="caption">Asterisk(*) are required fields.</span>
            </div>
            <div class="col-md-12">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Create a flyer</button>
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